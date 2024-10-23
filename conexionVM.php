<?php
$servername = "localhost";
$username = "root"; // Cambia esto por tu usuario
$password = ""; // Cambia esto por tu contraseña
$dbname = "gestor";  // Nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
