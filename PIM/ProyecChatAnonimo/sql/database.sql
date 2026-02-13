CREATE DATABASE IF NOT EXISTS chatdenuncias;
USE chatdenuncias;

CREATE TABLE conversaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    estado VARCHAR(50) DEFAULT 'abierta',
    created_at DATETIME
);

CREATE TABLE mensajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    conversation_code VARCHAR(50),
    content TEXT,
    file VARCHAR(255),
    created_at DATETIME,
    FOREIGN KEY (conversation_code) REFERENCES conversaciones(code)
);
