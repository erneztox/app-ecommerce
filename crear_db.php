<?php
$db = new SQLite3('tienda.db');

$db->exec('
CREATE TABLE IF NOT EXISTS PRODUCTO (
    id_producto INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL,
    descripcion TEXT,
    precio REAL NOT NULL,
    stock INTEGER NOT NULL
);
CREATE TABLE IF NOT EXISTS CLIENTE (
    id_cliente INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL,
    email TEXT NOT NULL,
    direccion TEXT
);
CREATE TABLE IF NOT EXISTS COMPRA (
    id_compra INTEGER PRIMARY KEY AUTOINCREMENT,
    cantidad INTEGER NOT NULL,
    total REAL NOT NULL,
    fecha TEXT NOT NULL,
    id_producto INTEGER,
    id_cliente INTEGER,
    FOREIGN KEY (id_producto) REFERENCES PRODUCTO (id_producto),
    FOREIGN KEY (id_cliente) REFERENCES CLIENTE (id_cliente)
);
');
echo "Base de datos y tablas creadas exitosamente.";
?>
