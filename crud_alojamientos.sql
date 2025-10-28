CREATE DATABASE IF NOT EXISTS crud_alojamientos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE crud_alojamientos;

-- Tabla de usuarios
DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    tipo ENUM('usuario', 'administrador') DEFAULT 'usuario',
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de alojamientos
DROP TABLE IF EXISTS alojamientos;
CREATE TABLE alojamientos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT,
    ubicacion VARCHAR(150),
    precio DECIMAL(10,2),
    imagen VARCHAR(255),
    creado_por INT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (creado_por) REFERENCES usuarios(id) ON DELETE SET NULL
);

-- Tabla de reservas
CREATE TABLE IF NOT EXISTS reservas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  alojamiento_id INT NOT NULL,
  creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY uniq_user_aloj (usuario_id, alojamiento_id),
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
  FOREIGN KEY (alojamiento_id) REFERENCES alojamientos(id) ON DELETE CASCADE
);


-- Datos de ejemplo para la landing --
INSERT INTO alojamientos (nombre, descripcion, ubicacion, precio, imagen)
VALUES 
('Casa del Sol', 'Alojamiento frente a la playa, ideal para ver el atardecer.', 'El Tunco, La Libertad', 95.00, 'casa_sol.jpg'),
('Cabaña del Volcán', 'Cabaña rústica con vista al volcán de Santa Ana y chimenea.', 'Cerro Verde, Santa Ana', 110.00, 'cabana_volcan.jpg'),
('Hotel Lago Azul', 'Habitaciones con vista al lago y restaurante con comida típica.', 'Lago de Coatepeque, Santa Ana', 130.00, 'lago_azul.jpg'),
('Hostal Colonial', 'Alojamiento acogedor en el centro histórico, cerca del parque.', 'Suchitoto, Cuscatlán', 65.00, 'hostal_colonial.jpg'),
('Villa San Blas', 'Espacio moderno con piscina privada y jardín tropical.', 'San Blas, La Libertad', 140.00, 'villa_san_blas.jpg');

