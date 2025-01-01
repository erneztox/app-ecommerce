<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <script>
        function validarProducto() {
            let nombre = document.getElementById('nombre_producto').value;
            let precio = document.getElementById('precio').value;
            let stock = document.getElementById('stock').value;
            if (nombre === '' || precio === '' || stock === '') {
                alert('Por favor, completa todos los campos.');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Formulario de Productos</h2>
    <form action="procesar_producto.php" method="post" onsubmit="return validarProducto();">
        <label for="nombre_producto">Nombre:</label>
        <input type="text" id="nombre_producto" name="nombre" required><br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"></textarea><br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required><br>
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required><br>
        <input type="submit" value="Guardar Producto">
    </form>
</body>
</html>
