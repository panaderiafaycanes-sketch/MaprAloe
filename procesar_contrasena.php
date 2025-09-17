<?php
header('Content-Type: application/json');

// Simular una sesión de usuario
session_start();
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Acceso no autorizado.']);
    exit();
}

// Suponiendo que el usuario actual tiene ID 1 y sus datos son estos (reemplaza con tu lógica de DB)
$user = [
    'id' => 1,
    'password_hash' => password_hash('password123', PASSWORD_DEFAULT) // Contraseña simulada
];

$current_password = $_POST['current_password'] ?? '';
$new_password = $_POST['new_password'] ?? '';
$confirm_new_password = $_POST['confirm_new_password'] ?? '';

// Validar campos
if (empty($current_password) || empty($new_password) || empty($confirm_new_password)) {
    echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
    exit();
}

if ($new_password !== $confirm_new_password) {
    echo json_encode(['success' => false, 'message' => 'Las nuevas contraseñas no coinciden.']);
    exit();
}

// Verificar la contraseña actual
if (!password_verify($current_password, $user['password_hash'])) {
    echo json_encode(['success' => false, 'message' => 'Contraseña actual incorrecta.']);
    exit();
}

// Aquí iría la lógica para actualizar la contraseña en la base de datos
// Por ejemplo:
// $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
// $stmt = $db_connection->prepare("UPDATE users SET password = ? WHERE id = ?");
// $stmt->execute([$new_password_hash, $user['id']]);

echo json_encode(['success' => true, 'message' => 'Contraseña cambiada con éxito.']);
?>