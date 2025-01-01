# App E-commerce

Una aplicación de comercio electrónico simple desarrollada en PHP con SQLite.

## Descripción

Este proyecto es una aplicación de comercio electrónico básica que permite gestionar productos, clientes y compras. Utiliza PHP como lenguaje de backend y SQLite como base de datos.

## Características

- Gestión de productos (crear, leer, actualizar, eliminar)
- Gestión de clientes (crear, leer, actualizar, eliminar)
- Sistema de compras
- Validación de formularios
- Base de datos SQLite

## Estructura de la Base de Datos

La aplicación utiliza las siguientes tablas:

- **PRODUCTO**: Almacena información de productos (ID, nombre, descripción, precio, stock)
- **CLIENTE**: Gestiona datos de clientes (ID, nombre, email, dirección)
- **COMPRA**: Registra las transacciones (ID, cantidad, total, fecha, ID_producto, ID_cliente)

## Requisitos Previos e Instalación

### 1. Instalación de PHP
#### Windows
1. Descarga PHP desde [windows.php.net/download](https://windows.php.net/download/)
   - Selecciona la versión Thread Safe x64
   - Descarga el archivo ZIP

2. Configura PHP:
   - Crea una carpeta en C:\php
   - Extrae el contenido del ZIP en C:\php
   - Copia php.ini-development a php.ini
   - Edita php.ini y descomenta la línea: extension=sqlite3
   - Agrega C:\php a las variables de entorno PATH

#### Linux (Ubuntu/Debian)
```bash
sudo apt update
sudo apt install php php-sqlite3
```

#### macOS
```bash
# Usando Homebrew
brew install php
```

### 2. Verificación de la Instalación
```bash
# Verifica la versión de PHP
php -v

# Verifica que SQLite3 esté habilitado
php -m | grep sqlite
```

### 3. Instalación del Proyecto
1. Clona el repositorio:
```bash
git clone https://github.com/tu-usuario/app-ecommerce.git
cd app-ecommerce
```

2. Crea la base de datos:
```bash
php crear_db.php
```

### 4. Ejecución del Proyecto

#### Usando el Servidor Integrado de PHP
1. Inicia el servidor:
```bash
php -S localhost:8000
```

2. Accede a través del navegador:
   - http://localhost:8000/form_producto.php (Gestión de Productos)
   - http://localhost:8000/form_cliente.php (Gestión de Clientes)

#### Usando XAMPP
1. Instala XAMPP:
   - Descarga desde [apachefriends.org](https://www.apachefriends.org/)
   - Sigue el asistente de instalación

2. Configura el proyecto:
   - Copia los archivos del proyecto a C:\xampp\htdocs\app-ecommerce
   - Inicia XAMPP Control Panel
   - Activa el módulo Apache

3. Accede a través del navegador:
   - http://localhost/app-ecommerce/form_producto.php
   - http://localhost/app-ecommerce/form_cliente.php

#### Usando WAMP
1. Instala WAMP:
   - Descarga desde [wampserver.com](https://www.wampserver.com/)
   - Sigue el asistente de instalación

2. Configura el proyecto:
   - Copia los archivos del proyecto a C:\wamp64\www\app-ecommerce
   - Inicia WampServer
   - Espera que el ícono se ponga verde

3. Accede a través del navegador:
   - http://localhost/app-ecommerce/form_producto.php
   - http://localhost/app-ecommerce/form_cliente.php

## Solución de Problemas Comunes

### Error de Permisos en SQLite
Si encuentras errores al crear o acceder a la base de datos:
```bash
# En Linux/macOS
chmod 777 tienda.db
chmod 777 .
```

### Error "sqlite3 module not found"
Verifica que la extensión esté habilitada:
1. Localiza tu php.ini
2. Asegúrate que la línea `extension=sqlite3` esté descomentada
3. Reinicia el servidor

## Uso

1. Para gestionar productos:
   - Acceda a `form_producto.php` para agregar nuevos productos
   - Los productos se procesan en `procesar_producto.php`

2. Para gestionar clientes:
   - Acceda a `form_cliente.php` para registrar nuevos clientes
   - Los clientes se procesan en `procesar_cliente.php`

## Tecnologías Utilizadas

- PHP
- SQLite3
- HTML
- JavaScript (validación de formularios)
