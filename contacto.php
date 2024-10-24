<?php
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contactos</title>
    <link rel="stylesheet" type="text/css" href="css/contactos.css">
    <style>
        /* Estilo de los enlaces de navegación (link1) */
        #navigation li a.link1 {
            background: #02164d; /* Fondo del enlace */
            color: #fff; /* Color del texto */
            padding: 10px 15px; /* Espaciado interno */
            text-decoration: none; /* Sin subrayado */
            border-radius: 5px; /* Bordes redondeados */
            display: inline-block; /* Para permitir padding y margenes */
        }

        /* Estilo de los enlaces de navegación (link2) */
        #navigation li a.link2 {
            background: #001f64; /* Fondo del enlace */
            color: #fff; /* Color del texto */
            padding: 10px 15px; /* Espaciado interno */
            text-decoration: none; /* Sin subrayado */
            border-radius: 5px; /* Bordes redondeados */
            display: inline-block; /* Para permitir padding y margenes */
        }

        /* Estilo para el enlace de navegación actual */
        #navigation li.current a {
            background: #d4d1d1; /* Fondo del enlace activo */
            color: #02164d; /* Color del texto activo */
        }
    </style>
</head>
<body>
    <div id="header">
        <a><img src="images/Grupo_Almatodo_sin_fondo.png" width="150" alt="Logo"></a>
    </div>

    <!-- Menú de navegación -->
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

    <div id="body">
        <div>
            <div id="contact">
                <h2>REGISTRO DE CONTACTOS</h2>
                <div>
                    <div>
                        <h3>CONTACTOS DE GRUPO ALMATODO</h3>
                        <ul>
                            <li>
                                <span>DIRECCION</span>
                                <p>
                                    CALLE 21 MARZO  #26 COLONIA ZOQUIAPAN C.P.56530, IXTAPALUCA, EDO. DE MEXICO
                                </p>
                            </li>
                            <li>
                                <span>CORREO ELECTRONICO</span>
                                <p>
                                    <a href="mailto:marketing@grupoalmatodo.com">marketing@grupoalmatodo.com</a>
                                </p>
                            </li>
                            <li>
                                <span>TELEFONOS DE CONTACTO GRUPO ALMATODO</span>
                                <p>
                                    UNO: 123 456 789 123
                                </p>
                                <p>
                                    DOS: 123 456 789 123 
                                </p>
                                <p>
                                    TRES: 123 456 789 123
                                </p>
                            </li>
                        </ul>
                    </div>
                    <form action="conexionCon.php" method="POST">
                        <h3>REGISTRO DE NUEVO CONTACTO</h3>
                        <label for="NOMBRE">NOMBRE:
                            <input type="text" id="NOMBRE" name="nombre" required>
                        </label>

                        <label for="CORREO">CORREO ELECTRONICO:
                            <input type="email" id="CORREO" name="correo" required>
                        </label>

                        <label for="NUMERO">NUMERO DE CONTACTO:
                            <input type="tel" id="NUMERO" name="numero" required>
                        </label>

                        <label for="DIRECCION">DIRECCION FISICA:</label>
                        <textarea id="DIRECCION" name="direccion" class="auto-adjust" required></textarea>

                        <input type="submit" class="send" value="GUARDAR CONTACTO">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        <div>
            <div id="connect">
                <h3>Social</h3>
                <a href="https://www.facebook.com/HandwareMarket?mibextid=ZbWKwL" id="facebook" target="_blank">Facebook</a>
                <a href="https://www.tiktok.com/@handwaremarket?_t=8qDHt5Iai74&_r=1" id="tik tok" target="_blank">Tik tok</a>
                <a href="https://www.instagram.com/handwaremarket?igsh=Zzk5ZWxydGExOGJz" id="instagram" target="_blank">instagram&#43;</a>
                <a href="https://www.handwaremarket.com/" id="handware" target="_blank">Handware Market</a>
            </div>
        </div>
        <p>
            &copy; GRUPO ALMATODO S.A.S. DE C.V.
        </p>
    </div>
</body>
</html>
