# Proyect-Arc-Soft

##Base de datos SQL

CREATE DATABASE db_name;

CREATE TABLE tbl_pasajero (
    ID int NOT NULL PRIMARY KEY,
    nombre varchar(255) NOT NULL,
    telefono int,
    fecha_nacimiento DATE,
    correo varchar(255)
);


-- AEROLINEA
CREATE TABLE tbl_aerolinea (
    ID int NOT NULL PRIMARY KEY,
    nombre varchar(255)
);
CREATE TABLE tbl_avion (
    matricula varchar(8) NOT NULL PRIMARY KEY,
    numero_asientos int NOT NULL,
    aerolineaID int FOREIGN KEY REFERENCES tbl_aerolinea(ID)
);


-- RUTAS
CREATE TABLE tbl_rutas (
    ID int NOT NULL PRIMARY KEY,
    descripcion varchar(100)
);

CREATE TABLE tbl_vuelo (
    COD int NOT NULL PRIMARY KEY,
    -- PersonID int FOREIGN KEY REFERENCES Persons(PersonID)
    -- PersonID int FOREIGN KEY REFERENCES Persons(PersonID)
    fecha_salida DATE,
    fecha_llegada DATE,
    estado varchar(15),
    asientos_disponibles int(3),
    precio float
);


-- RESERVAS
CREATE TABLE tbl_reserva (
    COD int NOT NULL PRIMARY KEY,
    estado varchar(50),
    fecha_reserva DATE,
    -- PersonID int FOREIGN KEY REFERENCES Persons(PersonID)
    precio_total float
);

CREATE TABLE tbl_detalle_reserva (
    ID int NOT NULL PRIMARY KEY,
    -- PersonID int FOREIGN KEY REFERENCES Persons(PersonID)
    -- PersonID int FOREIGN KEY REFERENCES Persons(PersonID)
    -- PersonID int FOREIGN KEY REFERENCES Persons(PersonID)
    estado varchas(100)
);

CREATE TABLE tbl_tiquete (
    COD int NOT NULL PRIMARY KEY,
    -- PersonID int FOREIGN KEY REFERENCES Persons(PersonID)
    -- PersonID int FOREIGN KEY REFERENCES Persons(PersonID)
);
