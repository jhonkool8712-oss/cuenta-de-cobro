CREATE DATABASE IF NOT EXISTS cuentacobro CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE cuentacobro;

CREATE TABLE IF NOT EXISTS trabajos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    dependencia VARCHAR(50) NOT NULL,
    zona ENUM('urbana', 'rural') NOT NULL,
    tipo_dia ENUM('normal', 'dominical') NOT NULL DEFAULT 'normal',
    horas INT UNSIGNED NOT NULL,
    precio_hora INT UNSIGNED NOT NULL,
    total INT UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
