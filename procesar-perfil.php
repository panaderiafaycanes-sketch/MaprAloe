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
    'name' => 'Valerio',
    'email' => 'valerio@example.com',
    'password_hash' => password_hash('password123', PASSWORD_DEFAULT) // Contraseña simulada
];

$new_name = $_POST['name'] ?? '';
$new_email = $_POST['email'] ?? '';
$current_password = $_POST['current_password_email'] ?? '';

// Validar que los campos no estén vacíos
if (empty($new_name) || empty($new_email) || empty($current_password)) {
    echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
    exit();
}

// Verificar la contraseña actual antes de guardar
if (!password_verify($current_password, $user['password_hash'])) {
    echo json_encode(['success' => false, 'message' => 'Contraseña actual incorrecta.']);
    exit();
}

// Aquí iría la lógica para actualizar los datos en la base de datos
// Ejemplo:
// $db_connection = new PDO(...);
// $stmt = $db_connection->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
// $stmt->execute([$new_name, $new_email, $user['id']]);

// Si todo es correcto
$user['name'] = $new_name;
$user['email'] = $new_email;

echo json_encode(['success' => true, 'message' => 'Cambios guardados correctamente.', 'name' => $user['name'], 'email' => $user['email']]);

?>