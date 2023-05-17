Nem db_aerolinea

CREATE TABLE tbl_usuario(
    ID_usuario int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    correo_usuario varchar(50),
    contrasena varchar(255),
    nombre_usuario varchar(50)
);
CREATE TABLE tbl_pasajero (
    ID_pasajero int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombre_pasajero varchar(255) NOT NULL,
    telefono int,
    fecha_nacimiento DATE,
    correo_pasajero varchar(255),
    asientos_reservados int(99)
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
    fecha_salida DATE NOT NULL,
    fecha_llegada DATE NOT NULL,
    hora_salida TIME(0) NOT NULL,
    hora_llegada TIME(0) NOT NULL,
    estado varchar(15),
    asientos_disponibles int(3),
    precio float
);

ALTER TABLE `tbl_vuelo` DROP FOREIGN KEY `tbl_vuelo_ibfk_1`;
ALTER TABLE `tbl_vuelo` ADD CONSTRAINT `tbl_vuelo_ibfk_1`
FOREIGN KEY (`matricula_avion`) REFERENCES `tbl_avion`(`matricula_avion`)
ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `tbl_vuelo` DROP FOREIGN KEY `tbl_vuelo_ibfk_2`;
ALTER TABLE `tbl_vuelo` ADD CONSTRAINT `tbl_vuelo_ibfk_2`
FOREIGN KEY (`ID_rutas`) REFERENCES `tbl_rutas`(`ID_rutas`)
ON DELETE RESTRICT ON UPDATE CASCADE;

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

INSERT INTO tbl_usuario (correo_usuario, contrasena, nombre_usuario)
VALUES ('michael.ayalatr@amigo.edu.co', 1029384765, 'Michael Ayala'),
('LeoMessi@hotmail.com', 1010101030, 'Leo Messi'),
('CristianoRonaldo@hotmail.com', 7777171709, 'Cristiano Ronaldo'),
('JhDelacruz@hotmail.com', 777666, 'Jh Delacruz'),
('SergioRamos@hotmail.com', 0404105, 'Sergio Ramos'),
('Dibumartinez@hotmail.com', 1013080, 'Dibu Martinez');

INSERT INTO tbl_pasajero (ID_pasajero, nombre_pasajero, telefono, fecha_nacimiento, correo_pasajero, asientos_reservados)
VALUES ('1', 'Michael Ayala', 310712318, '2001-08-07', 'michael.ayalatr@amigo.edu.co', '1'),
('2', 'Leo Messi', 101930711, '1987-06-24', 'LeoMessi@hotmail.com', '2'),
('3', 'Cristiano Ronaldo', 717101199, '1985-02-05', 'CristianoRonaldo@hotmail.com', '2'),
('4', 'Jh Delacruz', 311817459, '1995-04-14', 'JhDelacruz@hotmail.com', '1'),
('5', 'Sergio Ramos', 010471071, '1986-03-30', 'SergioRamos@hotmail.com', '3'),
('6', 'Dibu Martinez', 010897823, '1992-09-02', 'Dibumartinez@hotmail.com', '1');

INSERT INTO tbl_aerolinea (nombre_aerolinea)
VALUES ('HardFly'),
('Setana'),
('Avienco'),
('Vivo');

INSERT INTO tbl_avion (matricula_avion, numero_asientos, ID_aerolinea)
VALUES ('HK-5348', 70, 1), ('HK-5352', 70,1),
('HK-4853', 48, 2),('HK-4558', 48, 2),
('N-742AV', 100, 3),('N-747AV', 100, 3),
('HK-652V', 90, 4),('HK-647V', 90, 4),
('N-741AV', 100, 3),('HK-5148', 70, 1),
('HK-5452', 70,1),('N-757AV', 100, 3);

INSERT INTO tbl_rutas (descripcion)
VALUES ('RIONEGRO - SAN ANDRES ISLAS - COLOMBIA'),
('MEDELLIN - APARTADO - COLOMBIA'),
('CALI - BARRANQUILLA - COLOMBIA'),
('BOGOTA-COLOMBIA - MADRID-ESPAÑA'),
('BOGOTA-COLOMBIA - CANBERRA-AUSTRALIA'),
('BOGOTA-COLOMBIA - BUENOS AIRES-ARGENTINA');

INSERT INTO tbl_vuelo (matricula_avion, ID_rutas, fecha_salida, fecha_llegada, hora_salida, hora_llegada, estado, asientos_disponibles, precio)
VALUES ('HK-4558',1,'2023-04-20', '2023-04-20', '08:30:00', '09:05:00', 'Disponible', 15, 190000),
('HK-5348',2,'2023-04-21', '2023-04-21', '10:00:00', '10:40:00', 'Disponible', 10, 240000),
('HK-652V',3,'2023-04-24', '2023-04-24', '14:00:00', '15:00:00', 'Disponible', 5, 200000),
('N-757AV',4,'2023-04-25', '2023-04-26', '17:30:00', '03:20:00', 'Disponible', 48, 3240000),
('HK-5148',5,'2023-04-27', '2023-04-29', '15:00:00', '00:20:00', 'Disponible', 20, 9180000),
('HK-647V',6,'2023-05-01', '2023-05-02', '07:30:00', '13:40:00', 'Disponible', 13, 785000);

INSERT INTO tbl_reserva (estado, fecha_reserva, ID_usuario, precio_total)
VALUES ('Confirmado', '2023-04-18', 4, 190000),
('En espera', '2023-04-23', 2, 6480000),
('Confirmado', '2023-04-25', 3, 18360000),
('Confirmado', '2023-04-30', 1, 785000),
('En espera', '2023-04-29', 6, 185000),
('Confirmado', '2023-04-22', 5, 600000);

INSERT INTO tbl_detalle_reserva (COD_reserva, COD_vuelo, ID_pasajero, estado)
VALUES (1, 1, 4, 'Confirmado'),
(2, 4, 2, 'En espera'),
(3, 5, 3, 'Confirmado'),
(4, 6,1, 'Confirmado'),
(2, 3,1, 'Confirmado'),
(5, 3, 5, 'Confirmado');

INSERT INTO tbl_tiquete (COD_reserva, ID_detalle_reserva)
VALUES (1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);