<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes</title>
    <script>
        function validarCliente() {
            let nombre = document.getElementById('nombre_cliente').value;
            let email = document.getElementById('email').value;
            if (nombre === '' || email === '') {
                alert('Por favor, completa todos los campos.');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Formulario de Clientes</h2>
    <form action="procesar_cliente.php" method="post" onsubmit="return validarCliente();">
        <label for="nombre_cliente">Nombre:</label>
        <input type="text" id="nombre_cliente" name="nombre" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="direccion">Dirección:</label>
        <textarea id="direccion" name="direccion"></textarea><br>
        <input type="submit" value="Guardar Cliente">
    </form>
</body>
</html>
