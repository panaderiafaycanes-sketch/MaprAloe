<?php
session_start();
include 'includes/db.php'; 

$response = ['success' => false, 'message' => ''];

if (!isset($_SESSION['user_id'])) {
    $response['message'] = 'Usuario no autenticado.';
    echo json_encode($response);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_new_password = $_POST['confirm_new_password'] ?? '';

    // Validar que las contraseñas nuevas coincidan
    if ($new_password !== $confirm_new_password) {
        $response['message'] = 'Las nuevas contraseñas no coinciden.';
        echo json_encode($response);
        exit();
    }
    
    // Obtener la contraseña actual de la base de datos
    $stmt = $conn->prepare("SELECT password_hash FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $stored_password_hash = $user['password_hash'];

        // Verificar que la contraseña actual sea correcta
        if (password_verify($current_password, $stored_password_hash)) {
            // Generar un nuevo hash para la nueva contraseña
            $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

            // Actualizar la contraseña en la base de datos
            $update_stmt = $conn->prepare("UPDATE users SET password_hash = ? WHERE id = ?");
            $update_stmt->bind_param("si", $new_password_hash, $user_id);

            if ($update_stmt->execute()) {
                $response['success'] = true;
                $response['message'] = 'Contraseña actualizada correctamente.';
            } else {
                $response['message'] = 'Error al actualizar la contraseña: ' . $update_stmt->error;
            }
            $update_stmt->close();

        } else {
            $response['message'] = 'La contraseña actual es incorrecta.';
        }
    } else {
        $response['message'] = 'Usuario no encontrado.';
    }

    $stmt->close();
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($response);
?>