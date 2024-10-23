<?php
include 'conexionVM.php';  // Incluir la conexión a la base de datos

$id = $_GET['id'];  // Obtener el ID del prospecto

// Eliminar el prospecto de la base de datos
$sql = "DELETE FROM nuevo_prospecto WHERE ID_Prospecto=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro eliminado correctamente.";
} else {
    echo "Error eliminando el registro: " . $conn->error;
}

$conn->close();  // Cerrar la conexión a la base de datos

// Redirigir de vuelta a la página principal
header("Location: ventas mensuales.php");
exit;
?>
