<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Web</title>
    <style>
        #popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <h1>Usuarios</h1>

    <?php
    include("conexion.php");

    $query = "SELECT * FROM contacto";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<table border='1' id='tablaUsuarios'>
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

    $conn->close();
    ?>

    <button onclick="mostrarVentana()">Agregar Usuario</button>

    <div id="popup">
        <h2>Agregar Nuevo Usuario</h2>
        <form id="formulario">
            <label for="fecha">Fecha:</label>
            <input type="text" id="fecha" name="fecha" required><br>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="correo">Correo:</label>
            <input type="text" id="correo" name="correo" required><br>

            <label for="mensaje">Mensaje:</label>
            <input type="text" id="mensaje" name="mensaje" required><br>

            <button type="button" onclick="agregarUsuario()">Aceptar</button>
        </form>
    </div>

    <script>
        function mostrarVentana() {
            document.getElementById("popup").style.display = "block";
        }

        function agregarUsuario() {
            var fecha = document.getElementById("fecha").value;
            var nombre = document.getElementById("nombre").value;
            var correo = document.getElementById("correo").value;
            var mensaje = document.getElementById("mensaje").value;

            if (fecha.trim() === "" || correo.trim() === "") {
                alert("Por favor, completa todos los campos.");
                return;
            }

            // Envía los datos al servidor mediante AJAX para realizar la inserción en la base de datos
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "agregar_usuario.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Maneja la respuesta del servidor (puedes implementar lógica adicional aquí)
                    console.log(xhr.responseText);

                    // Ejemplo de actualización de la tabla (puedes adaptar según tu lógica)
                    var tablaUsuarios = document.getElementById("tablaUsuarios");
                    var newRow = tablaUsuarios.insertRow(-1);

                    var cell1 = newRow.insertCell(0);
                    var cell2 = newRow.insertCell(1);
                    var cell3 = newRow.insertCell(2);

                    cell1.innerHTML = xhr.responseText;  // El ID real generado por la base de datos
                    cell2.innerHTML = nombre;
                    cell3.innerHTML = correo;

                    // Cierra la ventana emergente después de agregar el usuario (puedes ajustar esto según tu lógica)
                    document.getElementById("popup").style.display = "none";
                }
            };

            // Construye los datos a enviar
            var data = "nombre=" + encodeURIComponent(nombre) + "&correo=" + encodeURIComponent(correo);
            xhr.send(data);
        }
    </script>
</body>
</html>