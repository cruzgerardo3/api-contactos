<?php
$host = "localhost";
$user = "root"; // Cambia esto si tienes otro usuario
$pass = "";     // Cambia esto si tu contraseña no está vacía
$dbname = "agenda";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
