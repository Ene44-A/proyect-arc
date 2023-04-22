CREATE TABLE tbl_usuario(
    ID_usuario int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    correo_usuario varchar(50),
    contrasena varchar(11),
    nombre_usuario varchar(50)
);
CREATE TABLE tbl_pasajero (
    ID_pasajero int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombre_pasajero varchar(255) NOT NULL,
    telefono int,
    fecha_nacimiento DATE,
    correo_pasajero varchar(255)
);
CREATE TABLE tbl_aerolinea (
    ID_aerolinea int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_aerolinea varchar(255)
);
CREATE TABLE tbl_avion (
    matricula_avion varchar(8) NOT NULL PRIMARY KEY,
    numero_asientos int NOT NULL,
    ID_aerolinea int,
    FOREIGN KEY (ID_aerolinea) REFERENCES tbl_aerolinea(ID_aerolinea)
);
CREATE TABLE tbl_rutas (
    ID_rutas int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    descripcion varchar(100)
);
CREATE TABLE tbl_vuelo (
    COD_vuelo int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    matricula_avion varchar(8),
    FOREIGN KEY (matricula_avion) REFERENCES tbl_avion(matricula_avion),
    ID_rutas int,
    FOREIGN KEY (ID_rutas) REFERENCES tbl_rutas(ID_rutas),
    fecha_salida DATE,
    fecha_llegada DATE,
    estado varchar(15),
    asientos_disponibles int(3),
    precio float
);
CREATE TABLE tbl_reserva (
    COD_reserva int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    estado varchar(50),
    fecha_reserva DATE,
    ID_usuario int,
    FOREIGN KEY (ID_usuario) REFERENCES tbl_usuario(ID_usuario),
    precio_total float
);
CREATE TABLE tbl_detalle_reserva (
    ID_detalle_reserva int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    COD_reserva int,
    FOREIGN KEY (COD_reserva) REFERENCES tbl_reserva(COD_reserva),
    COD_vuelo int,
    FOREIGN KEY (COD_vuelo) REFERENCES tbl_vuelo(COD_vuelo),
    ID_pasajero int,
    FOREIGN KEY (ID_pasajero) REFERENCES tbl_pasajero(ID_pasajero),
    estado varchar(100)
);
CREATE TABLE tbl_tiquete (
    COD_tiquete int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    COD_reserva int,
    FOREIGN KEY (COD_reserva) REFERENCES tbl_reserva(COD_reserva),
    ID_detalle_reserva int,
    FOREIGN KEY (ID_detalle_reserva) REFERENCES tbl_detalle_reserva(ID_detalle_reserva)
);

