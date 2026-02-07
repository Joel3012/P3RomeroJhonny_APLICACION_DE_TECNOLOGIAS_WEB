-- Script de creación de base de datos para MySQL (XAMPP)
-- Ejecuta este script en phpMyAdmin

CREATE DATABASE IF NOT EXISTS atw_enlaces CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE atw_enlaces;

-- Tabla de enlaces
CREATE TABLE IF NOT EXISTS links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    url TEXT NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de posts (si es necesaria)
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Datos de ejemplo
INSERT INTO links (title, url, description) VALUES
('Google', 'https://www.google.com', 'Buscador de Google'),
('GitHub', 'https://github.com', 'Plataforma de desarrollo'),
('Stack Overflow', 'https://stackoverflow.com', 'Comunidad de programadores');

