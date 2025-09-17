<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros | Mapr Aloe</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
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

    <main class="about-page">
        <div class="container">
            <h2 class="section-title">Sobre Nosotros</h2>
            <div class="about-content">
                <p class="justified-text">En Mapr Aloe, nuestra historia comenzó con una simple idea: aprovechar el poder puro y natural del aloe vera para crear productos de cuidado de la piel que realmente funcionen. Creemos firmemente que la belleza no debe comprometer la naturaleza, por eso todos nuestros productos son elaborados con ingredientes de la más alta calidad, cultivados de manera sostenible y respetuosa con el medio ambiente.</p>
                <p class="justified-text">Cada una de nuestras fórmulas es el resultado de una cuidadosa investigación para asegurar que obtengas los máximos beneficios del aloe vera. Desde cremas hidratantes hasta geles calmantes, nuestra misión es ofrecerte productos que nutran tu piel, la protejan y la dejen radiante.</p>
            </div>
            <div class="mission-content">
                <img src="assets/images/our-mission.jpg" alt="Manos sosteniendo una planta de aloe vera" class="mission-image">
                <div class="mission-text">
                    <h3>Nuestra Misión</h3>
                    <p class="justified-text">Nuestra misión es empoderar a las personas para que cuiden su piel de forma natural, ofreciendo productos de alta calidad que sean efectivos y sostenibles. Nos comprometemos a mantener un estándar de excelencia en cada paso del proceso, desde el cultivo hasta el empaque, asegurando que cada producto que llega a tus manos sea un reflejo de nuestra pasión por el bienestar y el respeto por el planeta.</p>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Mapr Aloe. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>