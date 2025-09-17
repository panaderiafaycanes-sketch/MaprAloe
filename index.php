<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapr Aloe | Productos Naturales</title>
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
                  <li><a href="index.php" class="active">Inicio</a></li>
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
        <section id="home" class="hero">
            <div class="hero-content">
                <h1>Aloe Vera Puro para tu Piel</h1>
                <p>Descubre el poder de la naturaleza en cada uno de nuestros productos.</p>
                <a href="productos.php" class="btn">Ver Productos</a>
            </div>
        </section>

        <section id="ingredients" class="ingredients-section">
            <div class="container">
                <h2>Descubre el poder de nuestros ingredientes</h2>
                <div class="ingredient-grid">
                    <div class="ingredient-card">
                        <img src="assets/images/aloe-leaf.jpg" alt="Hoja de aloe vera" class="ingredient-image">
                        <div class="ingredient-text">
                            <h3>Aloe Vera Orgánico</h3>
                            <p>Nuestro ingrediente estrella, cultivado de forma sostenible para garantizar la máxima pureza y efectividad. Hidrata, calma y repara la piel de forma natural.</p>
                        </div>
                    </div>
                    <div class="ingredient-card">
                        <img src="assets/images/mint-leaves.jpg" alt="Hojas de menta" class="ingredient-image">
                        <div class="ingredient-text">
                            <h3>Menta Pura</h3>
                            <p>Un refrescante complemento que revitaliza la piel y los sentidos. Ideal para productos corporales que buscan una sensación de frescura duradera.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="testimonials" class="testimonials">
            <div class="container">
                <h2>Lo que dicen nuestros clientes</h2>
                <div class="testimonial-grid">
                    </div>
            </div>
        </section>

    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Mapr Aloe. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src="assets/js/script.js"></script>
</body>
</html>