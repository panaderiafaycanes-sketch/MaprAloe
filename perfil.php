<?php
session_start();

// Incluye el archivo de conexión a la base de datos
include 'includes/db.php'; 

// Lógica para obtener los datos del usuario
$user_data = null;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    // Consulta SQL para incluir la columna 'created_at' y 'profile_image_url'
    $sql = "SELECT username, email, profile_image_url, created_at FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Verificación de errores en la preparación de la consulta
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
    } else {
        header("Location: login.php");
        exit();
    }
    $stmt->close();
} else {
    header("Location: login.php");
    exit();
}

// Lógica para determinar la URL de la imagen de perfil
$profile_image = $user_data['profile_image_url'];
if (empty($profile_image)) {
    // Si no hay URL de imagen, usa la inicial del nombre de usuario
    $first_letter = strtoupper(substr($user_data['username'], 0, 1));
    $profile_image = "https://ui-avatars.com/api/?name=" . $first_letter . "&background=008080&color=fff&size=120&bold=true";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil | Mapr Aloe</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/perfil-styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="profile-page-v2">

    <header class="header">
        <div class="container">
            <a href="index.php" class="logo">
                <img src="assets/images/logo.jpg" alt="Logo de Mapr Aloe" class="logo-img">
                Mapr Aloe
            </a>
            <nav class="nav">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="nosotros.php">Nosotros</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                </ul>
            </nav>
            <div class="profile-icon">
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="login.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
                    </a>
                <?php else: ?>
                    <a href="perfil.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main>
        <div class="container profile-container">
            <aside class="profile-sidebar">
                <div class="profile-avatar-box">
                    <img src="<?php echo htmlspecialchars($profile_image); ?>" alt="Foto de perfil" class="profile-avatar" id="profile-picture">
                    <p class="profile-username">Hola, <span id="user-name-display"><?php echo htmlspecialchars($user_data['username']); ?></span></p>
                    <button class="btn-profile-action" id="change-photo-btn"><i class="fas fa-camera"></i> Cambiar foto</button>
                    <input type="file" id="photo-upload-input" style="display: none;">
                </div>
                
                <ul class="profile-menu">
                    <li><a href="#" data-section="dashboard" class="active"><i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="#" data-section="edit-profile"><i class="fas fa-user-edit"></i> Editar perfil</a></li>
                    <li><a href="#" data-section="change-password"><i class="fas fa-lock"></i> Cambiar contraseña</a></li>
                </ul>
                
                <a href="logout.php" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                </a>
            </aside>

            <section class="profile-content">
                
                <div id="dashboard" class="profile-section-content active">
                    <h2>Inicio</h2>
                    <p>Bienvenido de nuevo a tu perfil. Aquí tienes un resumen de tu cuenta.</p>
                    <div class="dashboard-info-cards">
                        <div class="info-card">
                            <h3>Información de tu cuenta</h3>
                            <p><strong>Nombre de usuario:</strong> <span id="card-name"><?php echo htmlspecialchars($user_data['username']); ?></span></p>
                            <p><strong>Correo electrónico:</strong> <span id="card-email"><?php echo htmlspecialchars($user_data['email']); ?></span></p>
                            <p><strong>Miembro desde:</strong> <?php echo date("d/m/Y", strtotime($user_data['created_at'])); ?></p>
                        </div>
                    </div>
                </div>

                <div id="edit-profile" class="profile-section-content">
                    <h2>Editar perfil</h2>
                    <div class="edit-form-container">
                        <form id="edit-profile-form">
                            <div class="form-group">
                                <label for="name">Nombre de usuario</label>
                                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user_data['username']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user_data['email']); ?>" required>
                                <p class="form-help-text">Si cambias tu correo, deberás confirmar tu contraseña actual.</p>
                            </div>
                            <div class="form-group password-field">
                                <label for="current-password-email">Contraseña actual</label>
                                <input type="password" id="current-password-email" name="current_password_email" placeholder="Introduce tu contraseña" required>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="change-password" class="profile-section-content">
                    <h2>Cambiar contraseña</h2>
                    <div class="edit-form-container">
                        <form id="change-password-form">
                            <div class="form-group">
                                <label for="current-password">Contraseña actual</label>
                                <input type="password" id="current-password" name="current_password" required>
                            </div>
                            <div class="form-group">
                                <label for="new-password">Nueva contraseña</label>
                                <input type="password" id="new-password" name="new_password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm-new-password">Confirmar nueva contraseña</label>
                                <input type="password" id="confirm-new-password" name="confirm_new_password" required>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn">Cambiar contraseña</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <div id="photo-modal" class="modal">
        <span class="close-btn">&times;</span>
        <img class="modal-content" id="modal-image">
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Mapr Aloe. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="assets/js/perfil.js"></script>
</body>
</html>