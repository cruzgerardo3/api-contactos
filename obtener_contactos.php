<?php
include 'db.php';

// Obtén la página actual y los elementos por página desde la solicitud
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;  // Página por defecto es 1
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;  // Límite por defecto es 10

// Calcula el desplazamiento (offset)
$offset = ($page - 1) * $limit;

// Modifica la consulta SQL para incluir limit y offset
$sql = "SELECT * FROM contactos ORDER BY nombre ASC LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

$contactos = [];

// Recorre los resultados y agrega los contactos a un arreglo
while($row = $result->fetch_assoc()) {
    $contactos[] = $row;
}

// Devuelve los contactos en formato JSON
echo json_encode($contactos);

// Cierra la conexión
$conn->close();
?>
