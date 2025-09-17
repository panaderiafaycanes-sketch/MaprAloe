document.addEventListener('DOMContentLoaded', function() {
    const changePhotoBtn = document.getElementById('change-photo-btn');
    const photoUploadInput = document.getElementById('photo-upload-input');
    const profilePicture = document.getElementById('profile-picture');
    const sections = document.querySelectorAll('.profile-section-content');
    const menuItems = document.querySelectorAll('.profile-menu a');

    // Cambia de sección al hacer clic en el menú
    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const sectionId = this.getAttribute('data-section');
            
            // Eliminar 'active' de todos los elementos del menú y secciones
            menuItems.forEach(i => i.classList.remove('active'));
            sections.forEach(s => s.classList.remove('active'));

            // Añadir 'active' al elemento del menú y sección correctos
            this.classList.add('active');
            document.getElementById(sectionId).classList.add('active');
        });
    });

    // Activar el input de subida de fotos al hacer clic en el botón
    changePhotoBtn.addEventListener('click', function() {
        photoUploadInput.click();
    });

    // Subir la foto cuando se selecciona un archivo
    photoUploadInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const formData = new FormData();
            formData.append('profile_image', file);

            // Subir el archivo usando AJAX
            fetch('upload_profile_image.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Actualizar la imagen en la página si la subida fue exitosa
                    profilePicture.src = data.image_url + '?' + new Date().getTime(); // Se añade un timestamp para evitar caché
                    alert(data.message);
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al conectar con el servidor.');
            });
        }
    });

    // Lógica para el modal de la foto de perfil (si la tienes)
    const modal = document.getElementById('photo-modal');
    const modalImg = document.getElementById("modal-image");
    const span = document.getElementsByClassName("close-btn")[0];

    profilePicture.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
    }

    span.onclick = function() {
      modal.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  
  	// Lógica para el formulario de cambio de contraseña
    const changePasswordForm = document.getElementById('change-password-form');
    if (changePasswordForm) {
        changePasswordForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('change_password.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.success) {
                    // Limpiar el formulario si la actualización fue exitosa
                    this.reset();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al conectar con el servidor.');
            });
        });
    }

    // Lógica para el formulario de edición de perfil
    const editProfileForm = document.getElementById('edit-profile-form');
    if (editProfileForm) {
        editProfileForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('edit_profile.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.success) {
                    // Actualizar los datos del perfil en la página sin recargar
                    document.getElementById('user-name-display').textContent = formData.get('name');
                    document.getElementById('card-name').textContent = formData.get('name');
                    document.getElementById('card-email').textContent = formData.get('email');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al conectar con el servidor.');
            });
        });
    }
});