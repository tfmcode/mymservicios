<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Web</title>
</head>
<body>
    <h1>Usuarios</h1>

    <?php
    // Incluye el archivo de conexión a la base de datos
    include("conexion.php");

    // Consulta para obtener todos los registros de la tabla "usuarios"
    $query = "SELECT * FROM contacto";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Muestra los datos en una tabla
        echo "<table border='1'>
                <tr>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Mensaje</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["fecha"] . "</td>
                    <td>" . $row["nombre"] . "</td>
                    <td>" . $row["correo"] . "</td>
                    <td>" . $row["mensaje"] . "</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No hay registros en la tabla.";
    }

    // Cierra la conexión al final de la página
    $conn->close();
    ?>
</body>
</html>
