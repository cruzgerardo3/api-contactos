<?php
include 'db.php';

// Obtener el ID del contacto desde la URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id) {
    $stmt = $conn->prepare("DELETE FROM contactos WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Contacto eliminado correctamente"]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(["success" => false, "error" => "ID no proporcionado"]);
}

$conn->close();
?>
