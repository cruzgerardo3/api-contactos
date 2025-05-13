<?php
include 'db.php';

$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT * FROM contactos WHERE nombre LIKE ? OR telefono LIKE ?";
$stmt = $conn->prepare($sql);
$param = "%$query%";
$stmt->bind_param("ss", $param, $param);
$stmt->execute();

$result = $stmt->get_result();
$contactos = [];

while($row = $result->fetch_assoc()) {
    $contactos[] = $row;
}

echo json_encode($contactos);
$conn->close();
?>
