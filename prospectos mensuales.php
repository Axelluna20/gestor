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
include 'conexionNP.php';  // Incluir la conexión a la base de datos

// Obtener todos los prospectos del mes actual
$sql = "SELECT * FROM nuevo_prospecto";
$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta SQL: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Prospectos Mensuales</title>
    <link rel="stylesheet" type="text/css" href="css/prosp mensual.css">
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
                <li>
                    <a href="ventas mensuales.php" class="link1">Ventas Mensuales</a>
                </li>
                <li class="current">
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
            <h1>Lista de Prospectos del Mes</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID_Prospecto</th>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Producto</th>
                        <th>Características</th>
                        <th>Proveedor</th>
                        <th>Correo</th>
                        <th>Vendedor</th>
                        <th>Número</th>
                        <th>Dirección</th>
                        <th>RFC</th>
                        <th>Acciones</th> <!-- Columna para acciones -->
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
                            echo "<td>" . $row["caracteristicas"] . "</td>";
                            echo "<td>" . $row["proveedor"] . "</td>";
                            echo "<td>" . $row["correo"] . "</td>";
                            echo "<td>" . $row["vendedor"] . "</td>"; // Corregido para mostrar el vendedor
                            echo "<td>" . $row["numero"] . "</td>";
                            echo "<td>" . $row["direccion"] . "</td>";
                            echo "<td>" . $row["constancia"] . "</td>";
                            echo "<td>
                                    <a href='edit prosp.php?id=" . $row["ID_Prospecto"] . "'>Editar</a> | 
                                    <form action='borrar.php' method='post' style='display:inline;'>
                                        <input type='hidden' name='id' value='" . $row["ID_Prospecto"] . "'>
                                        <button type='submit' onclick='return confirm(\"¿Está seguro de que desea borrar este prospecto?\");'>Borrar</button>
                                    </form>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='12'>No hay prospectos disponibles para este mes.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="footer">
        <b><a href="http://freewebsitetemplates.com/go/facebook/" target="_blank">Facebook</a></b>
        <b><a href="http://freewebsitetemplates.com/go/twitter/" target="_blank">Twitter</a></b>
        <b><a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank">Google+</a></b>
        <b><a href="https://www.handwaremarket.com/" target="_blank">Handware Market</a></b>
    </div>
</body>
</html>

<?php
$conn->close();  // Cerrar la conexión a la base de datos al final
?>
