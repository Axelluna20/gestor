<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "gestor");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Inicializar variables
$id = $nombre = $empresa = $producto = "";
$actualizado = false; // Variable para verificar si se actualizó correctamente

// Verificar si se ha enviado el ID por GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obtener los datos del prospecto
    $sql = "SELECT nombre, empresa, producto FROM nuevo_prospecto WHERE ID_Prospecto=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($nombre, $empresa, $producto);
    
    // Obtener el resultado
    if (!$stmt->fetch()) {
        echo "No se encontró el registro con el ID: $id";
        exit();
    }

    // Cerrar la declaración
    $stmt->close();
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $empresa = $_POST['empresa'];
    $producto = $_POST['producto'];

    // Consulta para actualizar los datos en la tabla nuevo_prospecto
    $sql = "UPDATE nuevo_prospecto SET nombre=?, empresa=?, producto=? WHERE ID_Prospecto=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssi", $nombre, $empresa, $producto, $id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        $actualizado = true; // Marcar como actualizado
    } else {
        echo "Error al actualizar el registro: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Prospecto</title>
    <link rel="stylesheet" type="text/css" href="css/actualizar.css">
    <script>
        // Función para mostrar la alerta y redirigir
        function mostrarAlerta() {
            alert("Registro actualizado correctamente.");
            window.location.href = "ventas mensuales.php"; // Redirigir a ventas_mensuales.php
        }
    </script>
</head>
<body>
    <h1 style="color: white; text-align: center;">Actualizar Prospecto</h1>
    <div>
        <form method="POST" action="actualizar.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Cambiado aquí -->
            <label for="nombre" style="color: #02164d;">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required> <!-- Cambiado aquí -->
            <br>
            <label for="empresa" style="color: #02164d;">Empresa:</label>
            <input type="text" name="empresa" value="<?php echo htmlspecialchars($empresa); ?>" required> <!-- Cambiado aquí -->
            <br>
            <label for="producto" style="color: #02164d;">Producto:</label>
            <input type="text" name="producto" value="<?php echo htmlspecialchars($producto); ?>" required> <!-- Cambiado aquí -->
            <br>

            <input type="submit" value="Actualizar">
        </form>
    <?php if ($actualizado): ?>
        <script>
            mostrarAlerta(); // Llamar a la función para mostrar la alerta
        </script>
    <?php endif; ?>
    </div>
</body>
</html>
