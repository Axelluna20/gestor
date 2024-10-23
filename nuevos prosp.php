<?php
session_start();

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>nuevos_prospectos</title>
    <link rel="stylesheet" type="text/css" href="css/nuevos prosp.css">
</head>
<body>

<div id="header">
    <a href="index.html"><img src="images/Grupo_Almatodo_sin_fondo.png" width="150" alt="Logo"></a>

    <ul id="navigation">
        <li class="current">
            <a href="nuevos prosp.php" class="link2">Registrar Prospecto</a>
        </li>
        <li>
            <a href="ventas mensuales.php" class="link1">Ventas Mensuales</a>
        </li>
        <li>
            <a href="prospectos mensuales.html" class="link2">Prospectos Mensuales</a>
        </li>
        <li>
            <a href="contacto.html" class="link1">Contactos</a>
        </li>
        <li>
            <a href="login.html" class="link2">Cerrar Sesión</a>
        </li>
    </ul>
</div>

<div id="body">
    <div>
        <form action="conexionNP.php" method="POST">
            <h3>REGISTRO DE NUEVO PROSPECTO</h3>
            <label for="NOMBRE">NOMBRE:
                <input type="text" id="nombre" name="nombre" required>
            </label><br>

            <label for="EMPRESA">EMPRESA:
                <input type="text" id="empresa" name="empresa" required>
            </label><br>

            <label for="PRODUCTO">PRODUCTO:
                <input type="text" id="producto" name="producto" required>
            </label><br>

            <label for="CARACTERISTICAS ESPECIFICAS">CARACTERISTICAS ESPECIFICAS:
                <input type="text" id="caracteristicas" name="caracteristicas" required>
            </label><br>

            <label for="PROVEEDOR">PROVEEDOR (MAZIONE, HM):
                <input type="text" id="proveedor" name="proveedor" required>
            </label><br>

            <label for="CORREO">CORREO ELECTRONICO:
                <input type="email" id="correo" name="correo">
            </label><br>

            <label for="NUMERO">NUMERO DE CONTACTO:
                <input type="text" id="numero" name="numero" required>
            </label><br>

            <label for="DIRECCION">DIRECCION FISICA:</label>
            <textarea id="DIRECCION" name="direccion" class="auto-adjust" oninput="autoResize(this)" required></textarea><br>

            <label for="CONSTANCIA FISCAL">CONSTANCIA FISCAL:
                <input type="text" id="constancia" name="constancia">
            </label><br>

            <input type="submit" value="Registrar Nuevo Prospecto">
            <input type="submit" class="EDITAR" value="EDITAR PROSPECTO">
            <input type="submit" class="ACTUALIZAR" value="ACTUALIZAR PROSPECTO">
            <input type="submit" class="ELIMINAR" value="ELIMINAR PROSPECTO">
        </form>
    </div>
</div>

<div id="footer">
    <div>
        <div id="connect">
            <h3>Social</h3>
            <a href="http://freewebsitetemplates.com/go/facebook/" id="facebook" target="_blank">Facebook</a>
            <a href="http://freewebsitetemplates.com/go/twitter/" id="twitter" target="_blank">Twitter</a>
            <a href="http://freewebsitetemplates.com/go/googleplus/" id="instagram" target="_blank">Google+</a>
            <a href="https://www.handwaremarket.com/" id="handware" target="_blank">handwaremarket</a>
        </div>
    </div>
    <p>&copy; Copyright 2023. All rights reserved.</p>
</div>

</body>
</html>

    <!-- Cierra el elemento raíz del documento HTML -->
