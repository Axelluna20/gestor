<?php
session_start();

// Desactivar el caché para evitar volver a páginas anteriores sin iniciar sesión
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}

include 'conexionVM.php';  // Incluir la conexión a la base de datos

// Obtener todos los prospectos
$sql = "SELECT * FROM nuevo_prospecto";
$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta SQL: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prospectos Mensuales</title>
    <link rel="stylesheet" type="text/css" href="css/ventas mensuales.css">
</head>
<body>
    <div id="header">
        <a><img src="images/Grupo_Almatodo_sin_fondo.png" width="150" alt="Logo"></a>
    </div>

    <div id="body">
        <div>
            <ul id="navigation">
                <li>
                    <a href="nuevos prosp.php" class="link2">Registrar Nuevo Prospecto</a>
                </li>
                <li class="current">
                    <a href="ventas mensuales.php" class="link1">Ventas Mensuales</a>
                </li>
                <li>
                    <a href="prospectos mensuales.php" class="link2">Prospectos Mensuales</a>
                </li>
                <li>
                    <a href="contacto.php" class="link1">Contactos</a>
                </li>
                <li>
                    <a href="logout.php" class="link2">Cerrar Sesión</a>
                </li>
            </ul>
        </div>

        <div id="content">
            <h1>Historial De Venta</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Producto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["ID_Prospecto"] . "</td>";
                            echo "<td>" . $row["nombre"] . "</td>";
                            echo "<td>" . $row["empresa"] . "</td>";
                            echo "<td>" . $row["producto"] . "</td>";
                            echo "<td>
                                <a href='actualizar.php?id=" . $row["ID_Prospecto"] . "'>Actualizar</a> | 
                                <a href='borrar.php?id=" . $row["ID_Prospecto"] . "'>Borrar</a>
                              </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No hay prospectos disponibles.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="footer">
        <b href="http://freewebsitetemplates.com/go/facebook/" id="facebook" target="_blank">Facebook</b>
        <b href="http://freewebsitetemplates.com/go/twitter/" id="tiktok" target="_blank">Twitter</b>
        <b href="http://freewebsitetemplates.com/go/googleplus/" id="instagram" target="_blank">Google&#43;</b>
        <b href="https://www.handwaremarket.com/" id="handware" target="_blank">Handware Market</b>
    </div>
</body>
</html>

<?php
$conn->close();  // Cerrar la conexión a la base de datos al final
?>
