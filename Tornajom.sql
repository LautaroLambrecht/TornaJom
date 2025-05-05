-- Crear la base de datos
CREATE DATABASE tornallom;
USE tornallom;


CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    movil VARCHAR(20),
    direccion VARCHAR(255),
    creditos DECIMAL(10,2) DEFAULT 0.00
);


CREATE TABLE tipodetrabajo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(255) NOT NULL
);

CREATE TABLE trabajo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    estado ENUM('pendiente', 'en_proceso', 'completado', 'cancelado') DEFAULT 'pendiente',
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    id_publicacion INT,
    id_realizacion INT,
    zona VARCHAR(100),
    especialidad VARCHAR(100),
    FOREIGN KEY (id_publicacion) REFERENCES usuario(id),
    FOREIGN KEY (id_realizacion) REFERENCES usuario(id)
);

CREATE TABLE resena (
    id INT AUTO_INCREMENT PRIMARY KEY,
    estrellas INT CHECK (estrellas BETWEEN 1 AND 5),
    descripcion TEXT,
    id_usuario INT,
    tipo ENUM('trabajador', 'demandante'),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);


INSERT INTO usuario (nombre, apellido, movil, direccion, creditos) VALUES
('Ana', 'Pérez', '612345678', 'Calle Falsa 123, Valencia', 100.50),
('Luis', 'García', '634567890', 'Av. Central 45, Madrid', 50.00),
('Marta', 'López', '678901234', 'C/ Mayor 12, Barcelona', 200.00);

INSERT INTO tipodetrabajo (descripcion) VALUES
('Pintura'),
('Electricidad'),
('Fontanería'),
('Jardinería');

INSERT INTO trabajo (estado, titulo, descripcion, id_publicacion, id_realizacion, zona, especialidad) VALUES
('pendiente', 'Pintar habitación', 'Se necesita pintar una habitación de 20m2', 1, NULL, 'Valencia', 'Pintura'),
('completado', 'Reparar enchufe', 'Revisión y reparación de enchufe quemado', 2, 3, 'Madrid', 'Electricidad');

INSERT INTO resena (estrellas, descripcion, id_usuario, tipo) VALUES
(5, 'Muy buen trabajo, puntual y limpio.', 3, 'trabajador'),
(4, 'Buena comunicación, aunque se retrasó un poco.', 2, 'demandante');