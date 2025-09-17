<?php
session_start();
include('includes/db.php');

$error = '';
$message = '';
$token = $_GET['token'] ?? '';
$user_id = null;

if (empty($token)) {
    $error = "Token de reseteo no válido o no proporcionado.";
} else {
    // Buscar el token en la base de datos
    $sql = "SELECT id FROM users WHERE reset_token = ? AND reset_token_expires_at > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];
    } else {
        $error = "El enlace de reseteo ha caducado o no es válido.";
    }
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $user_id) {
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        $error = "Las contraseñas no coinciden.";
    } elseif (strlen($new_password) < 8) {
        $error = "La contraseña debe tener al menos 8 caracteres.";
    } else {
        // Hashear la nueva contraseña y actualizar la base de datos
        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
        
        $sql_update = "UPDATE users SET password_hash = ?, reset_token = NULL, reset_token_expires_at = NULL WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("si", $password_hash, $user_id);
        
        if ($stmt_update->execute()) {
            $message = "Tu contraseña ha sido restablecida con éxito. Puedes <a href='login.php'>iniciar sesión</a> ahora.";
        } else {
            $error = "Error al actualizar la contraseña.";
        }
        $stmt_update->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
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
            <h2 class="form-title">Restablecer Contraseña</h2>
            <?php if ($error): ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php endif; ?>

            <?php if ($message): ?>
                <p class="success-message"><?php echo $message; ?></p>
            <?php elseif ($user_id): ?>
                <form action="reset-password.php?token=<?php echo htmlspecialchars($token); ?>" method="post">
                    <div class="form-group">
                        <label for="password">Nueva Contraseña:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirmar Contraseña:</label>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn">Restablecer Contraseña</button>
                </form>
            <?php endif; ?>
        </div>
    </main>

    <footer class="footer auth-footer">
        <div class="container">
            <p>&copy; 2025 Mapr Aloe. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>