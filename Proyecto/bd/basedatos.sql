-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS tpcsi;
USE tpcsi;

-- Tabla clientes
CREATE TABLE clientes (
  telefono VARCHAR(9) NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  usuario CHAR(50) NOT NULL,
  contrasena CHAR(191) NOT NULL,
  privilegio INT NOT NULL,
  Whatsap TINYINT(1) DEFAULT NULL,
  Llamar TINYINT(1) DEFAULT NULL,
  PRIMARY KEY (telefono)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla empleados
CREATE TABLE empleados (
  DNI VARCHAR(9) NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  PRIMARY KEY (DNI)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla equipos
CREATE TABLE equipos (
  id_equipo INT NOT NULL AUTO_INCREMENT,
  marca VARCHAR(30) NOT NULL,
  modelo VARCHAR(50) NOT NULL,
  SO VARCHAR(50) NOT NULL,
  cliente_telefono VARCHAR(9) NOT NULL,
  PRIMARY KEY (id_equipo),
  CONSTRAINT fk_equipos_clientes FOREIGN KEY (cliente_telefono) 
    REFERENCES clientes(telefono) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla mensajes
CREATE TABLE mensajes (
  id INT NOT NULL AUTO_INCREMENT,
  Nombre CHAR(50) NOT NULL DEFAULT '0',
  Apellidos CHAR(100) NOT NULL DEFAULT '0',
  Correo CHAR(100) NOT NULL DEFAULT '0',
  Mensaje TEXT NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla piezas
CREATE TABLE piezas (
  codigo_pieza VARCHAR(100) NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  marca VARCHAR(50) NOT NULL,
  modelo VARCHAR(50) NOT NULL,
  PRIMARY KEY (codigo_pieza)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla partes
CREATE TABLE partes (
  numero_parte INT NOT NULL AUTO_INCREMENT,
  fecha DATE NOT NULL,
  notas TEXT NOT NULL,
  cliente_telefono VARCHAR(9) NOT NULL,
  id_equipo INT NOT NULL,
  empleado_dni VARCHAR(9) NOT NULL,
  PRIMARY KEY (numero_parte),
  CONSTRAINT fk_partes_clientes FOREIGN KEY (cliente_telefono) 
    REFERENCES clientes(telefono) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_partes_equipos FOREIGN KEY (id_equipo) 
    REFERENCES equipos(id_equipo) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_partes_empleados FOREIGN KEY (empleado_dni) 
    REFERENCES empleados(DNI) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla tareas
CREATE TABLE tareas (
  numero_parte INT NOT NULL,
  id_tarea INT NOT NULL AUTO_INCREMENT,
  descripcion TEXT NOT NULL,
  estado VARCHAR(30) NOT NULL,
  tiempo INT DEFAULT NULL,
  imagen VARCHAR(255) DEFAULT NULL,
  empleado_dni VARCHAR(9) NOT NULL,
  PRIMARY KEY (numero_parte, id_tarea),
  KEY id_tarea (id_tarea),
  CONSTRAINT fk_tareas_partes FOREIGN KEY (numero_parte) 
    REFERENCES partes(numero_parte) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_tareas_empleados FOREIGN KEY (empleado_dni) 
    REFERENCES empleados(DNI) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla reparacion_parte
CREATE TABLE reparacion_parte (
  parte INT NOT NULL,
  tarea INT NOT NULL,
  pieza VARCHAR(100) NOT NULL,
  PRIMARY KEY (parte, tarea, pieza),
  CONSTRAINT fk_reparacion_tareas FOREIGN KEY (parte, tarea) 
    REFERENCES tareas(numero_parte, id_tarea) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_reparacion_piezas FOREIGN KEY (pieza) 
    REFERENCES piezas(codigo_pieza) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insertar datos en la tabla clientes
INSERT INTO clientes (telefono, nombre, apellido, usuario, contrasena, privilegio, Whatsap, Llamar) VALUES
('600123456', 'Juan', 'Pérez', 'juancito', '$2a$12$zhclWgnrq1gK9Jug0kDfQeMC4RsBqvNHgNX/c8LrmSQCN1gA512zy', 0, 1, 0),
('600987654', 'Ana', 'García', 'anita', '12345', 0, 0, 1),
('600555333', 'Luis', 'Martínez', 'luisito', '12345', 0, 1, 1);

-- Insertar datos en la tabla empleados
INSERT INTO empleados (DNI, nombre, apellido) VALUES
('12345678A', 'Carlos', 'Sánchez'),
('87654321B', 'María', 'López'),
('56789012C', 'Elena', 'González');

-- Insertar datos en la tabla equipos
INSERT INTO equipos (id_equipo, marca, modelo, SO, cliente_telefono) VALUES
(1, 'Apple', 'iPhone 13', 'iOS', '600123456'),
(2, 'Samsung', 'Galaxy S22', 'Android', '600987654'),
(3, 'Xiaomi', 'Mi 11', 'Android', '600555333');

-- Insertar datos en la tabla piezas
INSERT INTO piezas (codigo_pieza, nombre, marca, modelo) VALUES
('BAT001', 'Batería', 'Apple', 'iPhone 13'),
('CAM002', 'Cámara', 'Xiaomi', 'Mi 11'),
('PCB003', 'Placa Base', 'Samsung', 'Galaxy S22');

-- Insertar datos en la tabla partes
INSERT INTO partes (numero_parte, fecha, notas, cliente_telefono, id_equipo, empleado_dni) VALUES
(1, '2025-01-20', 'El cliente reportó un problema de batería.', '600123456', 1, '12345678A'),
(2, '2025-01-21', 'El dispositivo no enciende.', '600987654', 2, '87654321B'),
(3, '2025-01-22', 'Problemas con la cámara trasera.', '600555333', 3, '56789012C');

-- Insertar datos en la tabla tareas
INSERT INTO tareas (numero_parte, id_tarea, descripcion, estado, tiempo, imagen, empleado_dni) VALUES
(1, 1, 'Reemplazar batería', 'En progreso', 120, '/imagenes/bateria.png', '12345678A'),
(2, 2, 'Diagnóstico de placa Base', 'Completado', 240, '/imagenes/placa.png', '87654321B'),
(3, 3, 'Reparar cámara trasera', 'Pendiente', NULL, '/imagenes/camara.png', '56789012C');

-- Insertar datos en la tabla reparacion_parte
INSERT INTO reparacion_parte (parte, tarea, pieza) VALUES
(1, 1, 'BAT001'),
(2, 2, 'PCB003'),
(3, 3, 'CAM002');