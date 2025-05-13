<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

$nombre = $data->nombre ?? '';
$telefono = $data->telefono ?? '';

if ($nombre && $telefono) {
    $stmt = $conn->prepare("INSERT INTO contactos (nombre, telefono) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $telefono);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "id" => $stmt->insert_id]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(["success" => false, "error" => "Faltan datos"]);
}

$conn->close();
?>
