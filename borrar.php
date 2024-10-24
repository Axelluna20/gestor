<?php
// conexiónNP.php

// Iniciar la conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'gestor');

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Comprobar si se envía el ID
if (isset($_POST['id'])) {
    $id = (int)$_POST['id'];

    // Consultar la base de datos para verificar el registro
    $sql = "SELECT nombre, empresa, producto, caracteristicas, proveedor, correo, vendedor, numero, direccion, constancia FROM nuevo_prospecto WHERE ID_Prospecto = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener los datos del registro
        $row = $result->fetch_assoc();
        // Aquí puedes trabajar con $row['nombre'], $row['empresa'], etc.

        // Eliminar el prospecto de la base de datos
        $deleteSql = "DELETE FROM nuevo_prospecto WHERE ID_Prospecto = $id";

        if ($conn->query($deleteSql) === TRUE) {
            // Redirigir con mensaje de éxito
            header("Location: prospectos mensuales.php?status=success");
            exit(); // Asegurarse de que no se ejecute más código
        } else {
            header("Location: prospectos mensuales.php?status=error");
            exit(); // Asegurarse de que no se ejecute más código
        }
    } else {
        header("Location: prospectos mensuales.php?status=not_found");
        exit(); // Asegurarse de que no se ejecute más código
    }
} else {
    header("Location: prospectos mensuales.php?status=invalid_id");
    exit(); // Asegurarse de que no se ejecute más código
}

$conn->close();  // Cerrar la conexión a la base de datos
?>
