# 🏡 CRUD de Alojamientos – Proyecto PHP + MySQL
Aplicación web desarrollada en PHP y MySQL que permite gestionar alojamientos turísticos con autenticación de usuarios, roles (administrador/usuario) y sistema de reservas. Incluye diseño moderno, base de datos lista para importar y ejemplos de lugares de El Salvador 🇸🇻.

## 🚀 Características
- Registro e inicio de sesión con contraseñas encriptadas (bcrypt)
- Rol Usuario: puede ver y reservar alojamientos
- Rol Administrador: puede crear, editar y eliminar alojamientos
- CRUD completo (Create, Read, Update, Delete)
- Sistema de reservas funcional
- Interfaz moderna con colores suaves (Oldlace, Navy, Lightblue)
- Base de datos lista para importar

## 🛠️ Requisitos
- PHP 8.1 o superior
- MySQL / MariaDB
- Servidor local como XAMPP (https://www.apachefriends.org/es/index.html)

## ⚙️ Instalación paso a paso
1. Clonar o descargar el proyecto:
   git clone https://github.com/tu-usuario/crud-alojamientos.git
2. Mover la carpeta del proyecto a:
   C:\xampp\htdocs\
3. Iniciar Apache y MySQL desde el panel de XAMPP.
4. Crear la base de datos:
   - Abrir http://localhost/phpmyadmin
   - Crear una base de datos llamada crud_alojamientos
   - Importar el archivo crud_alojamientos.sql

## 👑 Usuario Administrador
El proyecto incluye un usuario administrador por defecto.
Email: admin@demo.com  
Contraseña: admin123

Si por alguna razón el administrador no se crea automáticamente, puedes hacerlo ejecutando en tu navegador:
http://localhost/crud-alojamientos/crear_admin.php  
Esto generará el usuario administrador. Luego elimina el archivo crear_admin.php por seguridad.

## 📁 Estructura del proyecto
crud-alojamientos/
├── alojamientos/
│   ├── create.php
│   ├── edit.php
│   └── delete.php
├── auth/
│   ├── login.php
│   ├── logout.php
│   └── register.php
├── includes/
│   ├── admin_only.php
│   ├── auth.php
│   ├── config.php
│   ├── db.php
│   └── header.php
├── reservas/
│   ├── add.php
│   └── mis_reservas.php
├── cuenta.php
├── index.php
├── crear_admin.php
└── crud_alojamientos.sql

## 🧩 Base de datos
La base incluye tres tablas principales: usuarios, alojamientos y reservas.
Ejemplo de alojamientos precargados:
INSERT INTO alojamientos (nombre, descripcion, ubicacion, precio, imagen)
VALUES 
('Casa del Sol', 'Alojamiento frente a la playa, ideal para ver el atardecer.', 'El Tunco, La Libertad', 95.00, 'casa_sol.jpg'),
('Cabaña del Volcán', 'Cabaña rústica con vista al volcán de Santa Ana y chimenea.', 'Cerro Verde, Santa Ana', 110.00, 'cabana_volcan.jpg'),
('Hotel Lago Azul', 'Habitaciones con vista al lago y restaurante con comida típica.', 'Lago de Coatepeque, Santa Ana', 130.00, 'lago_azul.jpg'),
('Hostal Colonial', 'Alojamiento acogedor en el centro histórico, cerca del parque.', 'Suchitoto, Cuscatlán', 65.00, 'hostal_colonial.jpg'),
('Villa San Blas', 'Espacio moderno con piscina privada y jardín tropical.', 'San Blas, La Libertad', 140.00, 'villa_san_blas.jpg');

## 🧠 Detalles técnicos
- Contraseñas seguras con password_hash() y verificación con password_verify().
- Control de roles mediante auth.php y admin_only.php.
- Configuración centralizada en includes/config.php:
  define('DB_HOST', 'localhost');
  define('DB_NAME', 'crud_alojamientos');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('BASE_URL', '/crud-alojamientos');
- Diseño y estilos definidos en includes/header.php.

## 🎨 Paleta de colores
| Elemento | Color | HEX |
|-----------|--------|------|
| Fondo principal | Oldlace | #FDF5E6 |
| Encabezado / botones | Navy | #000080 |
| Detalles / hover | Lightblue | #ADD8E6 |

## 🧾 Licencia
Este proyecto se distribuye bajo la licencia MIT. Eres libre de usarlo, modificarlo y adaptarlo para fines personales o educativos.

## 👨‍💻 Autor
**Cristian Arturo Hernández Flores**  
Proyecto académico – Universidad Don Bosco 🇸🇻  
Correo: cristianhernandez@spectrumvoip.com
