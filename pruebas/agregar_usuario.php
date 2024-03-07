<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST["fecha"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $mensaje = $_POST["mensaje"];

    echo $fecha;

    // Realiza la inserción en la base de datos
    $insertQuery = "INSERT INTO contacto (fecha, nombre, correo, mensaje) VALUES ('$fecha', '$nombre', '$correo', '$mensaje')";
    if ($conn->query($insertQuery) === TRUE) {
        // Devuelve el ID del nuevo registro
        echo $conn->insert_id;
    } else {
        echo "Error al agregar usuario: " . $conn->error;
    }

    $conn->close();
}
?>