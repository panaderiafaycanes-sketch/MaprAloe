<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas Frecuentes | Mapr Aloe</title>
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
                    <li><a href="faq.php" class="active">FAQ</a></li>
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

    <main class="faq-page">
        <div class="container">
            <h2>Preguntas Frecuentes</h2>
            <div class="faq-accordion">
                <div class="faq-item">
                    <button class="accordion-button">¿Qué beneficios tiene el aloe vera para la piel?</button>
                    <div class="accordion-content">
                        <p>El aloe vera es conocido por sus propiedades hidratantes, antiinflamatorias y cicatrizantes. Ayuda a calmar la piel irritada, a hidratarla profundamente y a promover la regeneración celular.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="accordion-button">¿Son sus productos aptos para pieles sensibles?</button>
                    <div class="accordion-content">
                        <p>Sí, todos nuestros productos están formulados para ser suaves y son aptos para todo tipo de pieles, incluyendo las más sensibles.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="accordion-button">¿De dónde provienen sus ingredientes?</button>
                    <div class="accordion-content">
                        <p>Nuestros ingredientes provienen de cultivos sostenibles y orgánicos. Nos aseguramos de que cada planta sea tratada con el máximo cuidado para garantizar la pureza y la calidad de nuestros productos finales.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="accordion-button">¿Realizan envíos internacionales?</button>
                    <div class="accordion-content">
                        <p>Actualmente solo realizamos envíos dentro de España, pero estamos trabajando para expandirnos a otros países.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="accordion-button">¿Cómo puedo hacer un seguimiento de mi pedido?</button>
                    <div class="accordion-content">
                        <p>Una vez que tu pedido sea enviado, recibirás un correo electrónico de confirmación con un número de seguimiento y un enlace para rastrear el estado de tu paquete.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="accordion-button">¿Cuál es la política de devoluciones?</button>
                    <div class="accordion-content">
                        <p>Aceptamos devoluciones de productos sin abrir dentro de los 30 días posteriores a la compra. Por favor, contáctanos a través de la página de contacto para iniciar el proceso de devolución.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="accordion-button">¿Sus productos son veganos y libres de crueldad animal?</button>
                    <div class="accordion-content">
                        <p>Sí, estamos orgullosos de que todos nuestros productos son 100% veganos y nunca han sido probados en animales.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Mapr Aloe. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src="assets/js/script.js"></script>
</body>
</html>