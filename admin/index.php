<?php
session_start();

// Verifica si el usuario no ha iniciado sesión o no es un administrador
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] != 1 && $_SESSION['role'] != 2)) {
    header('Location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración | Mapr Aloe</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container" style="text-align: center; margin-top: 5rem;">
        <h2>¡Bienvenido al Panel de Administración, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>Tu rol es: <?php echo $_SESSION['role'] == 1 ? 'Administrador' : 'Superadministrador'; ?></p>
        <p>Esto es solo el inicio. Aquí tendrás acceso a todas las herramientas de gestión.</p>
        <p><a href="logout.php">Cerrar sesión</a></p>
    </div>
</body>
</html>