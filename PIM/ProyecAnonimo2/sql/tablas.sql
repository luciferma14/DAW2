CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nickname VARCHAR(30),
    password VARCHAR(255),
    codigo VARCHAR(20) UNIQUE
);

CREATE TABLE mensajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(20),
    usuario VARCHAR(30),
    mensaje TEXT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);