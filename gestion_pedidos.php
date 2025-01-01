<?php
try {
    // Conexión a la base de datos
    $db = new SQLite3('tienda.db');
    
    // Recepción de datos del formulario
    $cliente_id = $_POST['cliente_id'];
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];

    // Validación de entradas del usuario
    if (!is_numeric($cantidad) || $cantidad <= 0) {
        die("Error: La cantidad debe ser un número positivo.");
    }

    if (empty($cliente_id) || empty($producto_id)) {
        die("Error: El ID del cliente y del producto son obligatorios.");
    }

    // Validar existencia de cliente
    $clienteCheck = $db->querySingle("SELECT COUNT(*) FROM CLIENTE WHERE id = $cliente_id");
    if ($clienteCheck == 0) {
        die("Error: Cliente no encontrado.");
    }

    // Validar existencia del producto y verificar stock
    $productoCheck = $db->querySingle("SELECT stock FROM PRODUCTO WHERE id = $producto_id");
    if ($productoCheck === null) {
        die("Error: Producto no encontrado.");
    } elseif ($productoCheck < $cantidad) {
        die("Error: Stock insuficiente.");
    }

    // Preparar e insertar el pedido
    $stmt = $db->prepare('INSERT INTO PEDIDO (cliente_id, producto_id, cantidad) VALUES (:cliente_id, :producto_id, :cantidad)');
    $stmt->bindValue(':cliente_id', $cliente_id, SQLITE3_INTEGER);
    $stmt->bindValue(':producto_id', $producto_id, SQLITE3_INTEGER);
    $stmt->bindValue(':cantidad', $cantidad, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        // Actualizar el stock del producto
        $updateStock = $db->prepare('UPDATE PRODUCTO SET stock = stock - :cantidad WHERE id = :producto_id');
        $updateStock->bindValue(':cantidad', $cantidad, SQLITE3_INTEGER);
        $updateStock->bindValue(':producto_id', $producto_id, SQLITE3_INTEGER);
        $updateStock->execute();

        echo "Pedido registrado exitosamente.";
    } else {
        echo "Error al registrar el pedido.";
    }

} catch (Exception $e) {
    // Manejo de errores en la conexión o ejecución
    echo "Error en el sistema: " . $e->getMessage();
}
?>
