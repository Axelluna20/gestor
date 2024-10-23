<?php
include 'conexionVM.php';  // Incluir la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $empresa = $_POST['empresa'];
    $producto = $_POST['producto'];

    // Actualizar el prospecto en la base de datos
    $sql = "UPDATE nuevo_prospecto SET nombre='$nombre', empresa='$empresa', producto='$producto' WHERE ID_Prospecto=$id";

    if ($conn->query($sql) === TRUE) {
        // Si la actualización es exitosa, mostrar el mensaje y el botón
        echo "<h3 style='color: #02164d;'>Registro actualizado correctamente.</h3>"; // Cambia el color del mensaje aquí
        echo "<a href='ventas mensuales.php'><button style='background-color: #02164d; color: white;'>Regresar a Ventas Mensuales</button></a>";
    } else {
        echo "<p style='color: red;'>Error actualizando el registro: " . $conn->error . "</p>"; // Mensaje de error
    }
} else {
    $id = $_GET['id'];  // Obtener el ID del prospecto
    $sql = "SELECT * FROM nuevo_prospecto WHERE ID_Prospecto=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Prospecto</title>
    <link rel="stylesheet" type="text/css" href="css/actualizar.css">
</head>
<body>
<h1 style="color: white; text-align: center;">Actualizar Prospecto</h1> <!-- Cambia el color del encabezado aquí -->
    <div>
        <form method="POST" action="actualizar.php">
            <input type="hidden" name="id" value="<?php echo $row['ID_Prospecto']; ?>">
            <label for="nombre" style="color: #02164d;">Nombre:</label> <!-- Cambia el color del texto aquí -->
            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>
            <br>
            <label for="empresa" style="color: #02164d;">Empresa:</label> <!-- Cambia el color del texto aquí -->
            <input type="text" name="empresa" value="<?php echo $row['empresa']; ?>" required>
            <br>
            <label for="producto" style="color: #02164d;">Producto:</label> <!-- Cambia el color del texto aquí -->
            <input type="text" name="producto" value="<?php echo $row['producto']; ?>" required>
            <br>
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>

<?php
}
$conn->close();  // Cerrar la conexión a la base de datos al final
?>
