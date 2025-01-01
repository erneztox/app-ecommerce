<?php
$db = new SQLite3('tienda.db');

// Capturar datos enviados desde el formulario
$cliente_id = $_POST['cliente_id'];
$producto_id = $_POST['producto_id'];
$cantidad = $_POST['cantidad'];
$fecha_pedido = date('Y-m-d H:i:s'); // Fecha actual del pedido

// Validar existencia de cliente y producto
$clienteCheck = $db->querySingle("SELECT COUNT(*) as count FROM CLIENTE WHERE id = $cliente_id");
$productoCheck = $db->querySingle("SELECT COUNT(*) as count FROM PRODUCTO WHERE id = $producto_id");

if ($clienteCheck == 0) {
    die("Error: El cliente no existe.");
}

if ($productoCheck == 0) {
    die("Error: El producto no existe.");
}

// Verificar stock disponible
$stockActual = $db->querySingle("SELECT stock FROM PRODUCTO WHERE id = $producto_id");
if ($cantidad > $stockActual) {
    die("Error: Stock insuficiente para el producto seleccionado.");
}

// Insertar el pedido en la base de datos
$stmt = $db->prepare('INSERT INTO PEDIDO (cliente_id, producto_id, cantidad, fecha_pedido) VALUES (:cliente_id, :producto_id, :cantidad, :fecha_pedido)');
$stmt->bindValue(':cliente_id', $cliente_id, SQLITE3_INTEGER);
$stmt->bindValue(':producto_id', $producto_id, SQLITE3_INTEGER);
$stmt->bindValue(':cantidad', $cantidad, SQLITE3_INTEGER);
$stmt->bindValue(':fecha_pedido', $fecha_pedido, SQLITE3_TEXT);

if ($stmt->execute()) {
    // Reducir el stock del producto
    $nuevoStock = $stockActual - $cantidad;
    $db->exec("UPDATE PRODUCTO SET stock = $nuevoStock WHERE id = $producto_id");

    echo "Pedido registrado exitosamente.";
} else {
    echo "Error al registrar el pedido.";
}
?>
