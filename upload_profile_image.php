<?php
session_start();
include 'includes/db.php'; // Asegúrate de que esta ruta es correcta

if (!isset($_SESSION['user_id'])) {
    // Si no hay sesión, devuelve un error
    echo json_encode(['success' => false, 'message' => 'Usuario no autenticado.']);
    exit();
}

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_image'])) {
    $user_id = $_SESSION['user_id'];
    $target_dir = "assets/images/profiles/";
    $file_extension = pathinfo($_FILES["profile_image"]["name"], PATHINFO_EXTENSION);
    $new_file_name = $user_id . '_' . uniqid() . '.' . $file_extension;
    $target_file = $target_dir . $new_file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validar el archivo
    $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
    if ($check === false) {
        $response['message'] = "El archivo no es una imagen.";
        $uploadOk = 0;
    }

    if ($_FILES["profile_image"]["size"] > 5000000) { // 5MB
        $response['message'] = "El archivo es demasiado grande.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $response['message'] = "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $uploadOk = 0;
    }

    // Si la validación es correcta, intentar subir el archivo
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            // Actualizar la URL de la imagen en la base de datos
            $stmt = $conn->prepare("UPDATE users SET profile_image_url = ? WHERE id = ?");
            $stmt->bind_param("si", $target_file, $user_id);

            if ($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = "La foto de perfil se ha actualizado correctamente.";
                $response['image_url'] = $target_file;
            } else {
                $response['message'] = "Error al actualizar la base de datos: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $response['message'] = "Error al subir el archivo.";
        }
    }
} else {
    $response['message'] = "Solicitud inválida.";
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($response);
?>