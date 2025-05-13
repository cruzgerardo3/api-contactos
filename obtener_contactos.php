<?php
include 'db.php';


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;  
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;  


$offset = ($page - 1) * $limit;


$sql = "SELECT * FROM contactos ORDER BY nombre ASC LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

$contactos = [];


while($row = $result->fetch_assoc()) {
    $contactos[] = $row;
}


echo json_encode($contactos);


$conn->close();
?>
