<?php
$db = new SQLite3('tienda.db');

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

$stmt = $db->prepare('INSERT INTO PRODUCTO (nombre, descripcion, precio, stock) VALUES (:nombre, :descripcion, :precio, :stock)');
$stmt->bindValue(':nombre', $nombre, SQLITE3_TEXT);
$stmt->bindValue(':descripcion', $descripcion, SQLITE3_TEXT);
$stmt->bindValue(':precio', $precio, SQLITE3_FLOAT);
$stmt->bindValue(':stock', $stock, SQLITE3_INTEGER);

if ($stmt->execute()) {
    echo "Producto guardado exitosamente.";
} else {
    echo "Error al guardar el producto.";
}
?>
