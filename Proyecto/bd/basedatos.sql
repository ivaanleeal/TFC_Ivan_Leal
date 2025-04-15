-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS tpcsi;
USE if0_38148262_tpcsi;

-- Tabla Clientes
CREATE TABLE Clientes (
    telefono VARCHAR(9) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    Whatsap BOOLEAN,
    Llamar BOOLEAN    
);

-- Tabla Empleados 
CREATE TABLE Empleados (
    DNI VARCHAR(9) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL
);

-- Tabla Equipos
CREATE TABLE Equipos (
    id_equipo INT PRIMARY KEY AUTO_INCREMENT,
    marca VARCHAR(30) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    SO VARCHAR(50) NOT NULL,
    cliente_telefono VARCHAR(9) NOT NULL,
    FOREIGN KEY (cliente_telefono) REFERENCES Clientes(telefono)
);

-- Tabla Partes
CREATE TABLE Partes (
    numero_parte INT PRIMARY KEY AUTO_INCREMENT,
    fecha DATE NOT NULL,
    notas TEXT NOT NULL,

    cliente_telefono VARCHAR(9) NOT NULL,
    FOREIGN KEY (cliente_telefono) REFERENCES Clientes(telefono),

    id_equipo INT NOT NULL,
    FOREIGN KEY (id_equipo) REFERENCES Equipos(id_equipo),

    empleado_dni VARCHAR(9) NOT NULL,
    FOREIGN KEY (empleado_dni) REFERENCES Empleados(DNI)
);

-- Tabla Tareas
CREATE TABLE Tareas (
    numero_parte INT NOT NULL,
    id_tarea INT AUTO_INCREMENT,
    PRIMARY KEY (numero_parte, id_tarea),
    descripcion TEXT NOT NULL,
    estado VARCHAR(30) NOT NULL,
    tiempo INT,
    imagen VARCHAR(255),

    empleado_dni VARCHAR(9) NOT NULL,
    FOREIGN KEY (empleado_dni) REFERENCES Empleados(DNI)
);

-- Tabla Piezas
CREATE TABLE Piezas (
    codigo_pieza VARCHAR(100) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL  
);

-- Tabla intermedia para la relación entre Tareas y Piezas
CREATE TABLE Reparacion_Parte (
    parte INT NOT NULL,
    tarea INT NOT NULL,
    pieza VARCHAR(100) NOT NULL,

    PRIMARY KEY (parte, tarea, pieza),
    FOREIGN KEY (parte, tarea) REFERENCES Tareas(numero_parte, id_tarea),
    FOREIGN KEY (pieza) REFERENCES Piezas(codigo_pieza)
);
