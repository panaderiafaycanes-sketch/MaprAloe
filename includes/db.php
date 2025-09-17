<?php
// includes/db.php - Archivo de conexión a la base de datos

// Configuración de la base de datos (reemplaza con tus datos de Ionos)
$servername = "db5018436668.hosting-data.io";
$username = "dbu1397970";
$password = 'K}\'XH?2f<ANle47.[p,';
$dbname = "dbs14658979"; // Nombre correcto de la base de datos

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        throw new Exception("Conexión fallida: " . $conn->connect_error);
    }
    
    // Opcional: Establecer el conjunto de caracteres
    $conn->set_charset("utf8mb4");

} catch (Exception $e) {
    // Manejar el error de conexión.
    error_log($e->getMessage());
    die("Error de conexión a la base de datos.");
}
?>