<?php
$servername = "localhost";
$username = "c2371379_pruebas";
$password = "Asdf8569";
$database = "c2371379_pruebas";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Si llegas a este punto, la conexión fue exitosa
?>
