<?php
session_start();
include('includes/db.php');

// Incluir los archivos de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'libs/PHPMailer/src/Exception.php';
require 'libs/PHPMailer/src/PHPMailer.php';
require 'libs/PHPMailer/src/SMTP.php';

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];

    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];

        // Generar un token único y seguro
        $token = bin2hex(random_bytes(32));
        $expires_at = date("Y-m-d H:i:s", time() + 3600); // Token válido por 1 hora

        // Almacenar el token en la base de datos
        $sql_token = "UPDATE users SET reset_token = ?, reset_token_expires_at = ? WHERE id = ?";
        $stmt_token = $conn->prepare($sql_token);
        $stmt_token->bind_param("ssi", $token, $expires_at, $user_id);
        $stmt_token->execute();
        $stmt_token->close();

        // Enviar el email con el enlace de reseteo usando PHPMailer
        $reset_link = "http://mapraloe.es/reset-password.php?token=" . $token;

        $mail = new PHPMailer(true);
        try {
            // Configuración del servidor de correo (SMTP)
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Servidor de Gmail
            $mail->SMTPAuth   = true;
            $mail->Username   = 'panaderiafaycanes@gmail.com'; // <--- Reemplaza con tu email de Gmail
            $mail->Password   = 'wexm ldpx kauo gvki'; // <--- Reemplaza con tu contraseña de aplicación
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Remitente y destinatario
            $mail->setFrom('panaderiafaycanes@gmail.com', 'Mapr Aloe'); // <--- Reemplaza con tu email de Gmail
            $mail->addAddress($email);

            // Contenido del email
            $mail->isHTML(false);
            $mail->Subject = "Restablecer tu contraseña de Mapr Aloe";
            $mail->Body    = "Hola,\n\nPara restablecer tu contraseña, haz clic en el siguiente enlace:\n" . $reset_link . "\n\nSi no solicitaste un cambio de contraseña, ignora este mensaje.\n\nGracias,\nEl equipo de Mapr Aloe";

            $mail->send();
            $message = "Se ha enviado un correo con instrucciones para restablecer tu contraseña.";
        } catch (Exception $e) {
            $error = "No se pudo enviar el correo de restablecimiento. Por favor, inténtalo de nuevo más tarde. Error de PHPMailer: {$mail->ErrorInfo}";
        }
    } else {
        $message = "Si la dirección de correo electrónico está registrada, se ha enviado un correo con instrucciones.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="auth-page">
    <header class="header auth-header">
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
                <a href="login.php" class="active">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
                </a>
            </div>
        </div>
    </header>
    
    <main class="auth-main">
        <div class="auth-form-container">
            <h2 class="form-title">Recuperar Contraseña</h2>
            <?php if ($message): ?>
                <p class="success-message"><?php echo $message; ?></p>
            <?php elseif ($error): ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php endif; ?>
            <p>Introduce tu email para recibir un enlace para restablecer tu contraseña.</p>
            <form action="forgot-password.php" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <button type="submit" class="btn">Enviar Enlace</button>
            </form>
            <p class="link-to-register">Volver a <a href="login.php">Iniciar Sesión</a></p>
        </div>
    </main>

    <footer class="footer auth-footer">
        <div class="container">
            <p>&copy; 2025 Mapr Aloe. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>