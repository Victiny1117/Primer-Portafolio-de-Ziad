<?php
require_once '../database/connect.php';

$nombre = $_POST['nombreyapellido'] ?? '';
$email = $_POST['email'] ?? '';
$nota = $_POST['nota'] ?? '';
$fecha = date("Y-m-d");

$sql = "INSERT INTO comentarios (nombreyapellido, email, nota, fechanota) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nombre, $email, $nota, $fecha);

if ($stmt->execute()) {
    header("Location: ../index.php#comments");
    exit();
} else {
    echo "Error al guardar el comentario: " . $stmt->error;
}
?>