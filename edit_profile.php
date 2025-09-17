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
    $new_username = $_POST['name'] ?? '';
    $new_email = $_POST['email'] ?? '';
    $current_password = $_POST['current_password_email'] ?? '';

    // Obtener el hash de la contraseña actual de la base de datos
    $stmt = $conn->prepare("SELECT password_hash FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $stored_password_hash = $user['password_hash'];

        // Verificar que la contraseña actual sea correcta
        if (password_verify($current_password, $stored_password_hash)) {
            // Actualizar el nombre de usuario y el email en la base de datos
            $update_stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
            $update_stmt->bind_param("ssi", $new_username, $new_email, $user_id);

            if ($update_stmt->execute()) {
                $response['success'] = true;
                $response['message'] = 'Perfil actualizado correctamente.';
            } else {
                $response['message'] = 'Error al actualizar el perfil: ' . $update_stmt->error;
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