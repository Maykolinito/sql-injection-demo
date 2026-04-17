-- Crear base de datos (si no existe)
CREATE DATABASE IF NOT EXISTS testdb;
USE testdb;

-- Crear tabla users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

-- Insertar algunos usuarios de prueba
INSERT INTO users (username, password) VALUES 
('admin', 'admin123'),
('usuario1', 'pass1'),
('invitado', '1234');

-- Mostrar los datos insertados
SELECT * FROM users;
