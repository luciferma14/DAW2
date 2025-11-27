-- Crear base de datos
CREATE DATABASE IF NOT EXISTS chatAnonimo;
USE chatAnonimo;


CREATE TABLE chats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(20) NOT NULL,
    nickname VARCHAR(30) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- CREATE TABLE conversaciones (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   codigo VARCHAR(50) UNIQUE,
--   nickname VARCHAR(50)
-- );

-- CREATE TABLE mensajes (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   conversacion_id INT,
--   mensaje TEXT,
--   fecha DATETIME DEFAULT CURRENT_TIMESTAMP
-- );