<?php
include 'db.php';


$data = json_decode(file_get_contents("php://input"));

$id = $data->id ?? '';
$nombre = $data->nombre ?? '';
$telefono = $data->telefono ?? '';

if ($id && $nombre && $telefono) {
    $stmt = $conn->prepare("UPDATE contactos SET nombre = ?, telefono = ? WHERE id = ?");
    $stmt->bind_param("ssi", $nombre, $telefono, $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Contacto actualizado correctamente"]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(["success" => false, "error" => "Faltan datos"]);
}

$conn->close();
?>
