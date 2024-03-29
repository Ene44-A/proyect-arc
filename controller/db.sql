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

INSERT INTO tbl_avion (matricula_avion, numero_asientos, ID_aerolinea)
VALUES ('N-749AV', '100', '3'), ('HK-5350', '70', '1'), ('HK-5351', '70', '1'), ('HK-649V', '90', '4'), ('HK-651V', '90', '4');

INSERT INTO tbl_vuelo (matricula_avion, ID_rutas, fecha_salida, fecha_llegada, hora_salida, hora_llegada, estado, asientos_disponibles, precio)
VALUES ('HK-4558',1,'2023-05-20', '2023-04-24', '08:30:00', '09:05:00', 'Disponible', 15, 190000),
('HK-4558',1,'2023-05-24', '2023-05-24', '12:40:00', '13:15:00', 'Disponible', 2, 190000),
('HK-4558',1,'2023-05-24', '2023-05-24', '17:30:00', '18:05:00', 'Disponible', 4, 190000),
('HK-4558',1,'2023-05-25', '2023-05-25', '08:30:00', '09:05:00', 'Disponible', 6, 190000),
('HK-4558',1,'2023-05-25', '2023-05-25', '12:40:00', '13:15:00', 'Disponible', 8, 190000),
('HK-4558',1,'2023-05-25', '2023-05-25', '17:30:00', '18:05:00', 'Disponible', 5, 190000),
('HK-4558',1,'2023-05-26', '2023-05-26', '08:30:00', '09:05:00', 'Disponible', 10, 190000),
('HK-4558',1,'2023-05-26', '2023-05-26', '12:40:00', '13:15:00', 'Disponible', 12, 190000),
('HK-4558',1,'2023-05-26', '2023-05-26', '17:30:00', '18:05:00', 'Disponible', 3, 190000),
('HK-4558',1,'2023-05-27', '2023-05-27', '08:30:00', '09:05:00', 'Disponible', 5, 190000),
('HK-4558',1,'2023-05-27', '2023-05-27', '12:40:00', '13:15:00', 'Disponible', 9, 190000),
('HK-4558',1,'2023-05-27', '2023-05-27', '17:30:00', '18:05:00', 'Disponible', 11, 190000),
('HK-4558',1,'2023-05-28', '2023-05-28', '08:30:00', '09:05:00', 'Disponible', 6, 190000),
('HK-4558',1,'2023-05-28', '2023-05-28', '12:40:00', '13:15:00', 'Disponible', 10, 190000),
('HK-4558',1,'2023-05-28', '2023-05-28', '17:30:00', '18:05:00', 'Disponible', 14, 190000),
('HK-4558',1,'2023-05-29', '2023-05-29', '08:30:00', '09:05:00', 'Disponible', 15, 190000),
('HK-4558',1,'2023-05-29', '2023-05-29', '12:40:00', '13:15:00', 'Disponible', 12, 190000),
('HK-4558',1,'2023-05-29', '2023-05-29', '17:30:00', '18:05:00', 'Disponible', 10, 190000),
('HK-4558',1,'2023-05-30', '2023-05-30', '08:30:00', '09:05:00', 'Disponible', 5, 190000),
('HK-4558',1,'2023-05-30', '2023-05-30', '12:40:00', '13:15:00', 'Disponible', 12, 190000),
('HK-4558',1,'2023-05-30', '2023-05-30', '17:30:00', '18:05:00', 'Disponible', 10, 190000),
('HK-4558',1,'2023-05-31', '2023-05-31', '08:30:00', '09:05:00', 'Disponible', 15, 190000),
('HK-4558',1,'2023-05-31', '2023-05-31', '12:40:00', '13:15:00', 'Disponible', 12, 190000),
('HK-4558',1,'2023-05-31', '2023-05-31', '17:30:00', '18:05:00', 'Disponible', 11, 190000),
('HK-4558',1,'2023-06-01', '2023-06-01', '08:30:00', '09:05:00', 'Disponible', 7, 190000),
('HK-4558',1,'2023-06-01', '2023-06-01', '12:40:00', '13:15:00', 'Disponible', 12, 190000),
('HK-4558',1,'2023-06-01', '2023-06-01', '17:30:00', '18:05:00', 'Disponible', 10, 190000),
('HK-4558',1,'2023-06-02', '2023-06-02', '08:30:00', '09:05:00', 'Disponible', 15, 190000),
('HK-4558',1,'2023-06-02', '2023-06-02', '12:40:00', '13:15:00', 'Disponible', 8, 190000),
('HK-4558',1,'2023-06-02', '2023-06-02', '17:30:00', '18:05:00', 'Disponible', 15, 190000),
('HK-4558',1,'2023-06-03', '2023-06-03', '08:30:00', '09:05:00', 'Disponible', 18, 190000),
('HK-4558',1,'2023-06-03', '2023-06-03', '12:40:00', '13:15:00', 'Disponible', 12, 190000),
('HK-4558',1,'2023-06-03', '2023-06-03', '17:30:00', '18:05:00', 'Disponible', 17, 190000),
('HK-4558',1,'2023-06-04', '2023-06-04', '08:30:00', '09:05:00', 'Disponible', 19, 190000),
('HK-4558',1,'2023-06-04', '2023-06-04', '12:40:00', '13:15:00', 'Disponible', 12, 190000),
('HK-4558',1,'2023-06-04', '2023-06-04', '17:30:00', '18:05:00', 'Disponible', 20, 190000),
('HK-5348',2,'2023-05-24', '2023-05-24', '09:00:00', '09:40:00', 'Disponible', 3, 240000),
('HK-5348',2,'2023-05-24', '2023-05-24', '13:00:00', '13:40:00', 'Disponible', 6, 240000),
('HK-5348',2,'2023-05-24', '2023-05-24', '18:00:00', '18:40:00', 'Disponible', 10, 240000),
('HK-5348',2,'2023-05-25', '2023-05-25', '09:00:00', '09:40:00', 'Disponible', 3, 240000),
('HK-5348',2,'2023-05-25', '2023-05-25', '13:00:00', '13:40:00', 'Disponible', 6, 240000),
('HK-5348',2,'2023-05-25', '2023-05-25', '18:00:00', '18:40:00', 'Disponible', 10, 240000),
('HK-5348',2,'2023-05-26', '2023-05-26', '09:00:00', '09:40:00', 'Disponible', 8, 240000),
('HK-5348',2,'2023-05-26', '2023-05-26', '13:00:00', '13:40:00', 'Disponible', 6, 240000),
('HK-5348',2,'2023-05-26', '2023-05-26', '18:00:00', '18:40:00', 'Disponible', 10, 240000),
('HK-5348',2,'2023-05-27', '2023-05-27', '09:00:00', '09:40:00', 'Disponible', 10, 240000),
('HK-5348',2,'2023-05-27', '2023-05-27', '13:00:00', '13:40:00', 'Disponible', 9, 240000),
('HK-5348',2,'2023-05-27', '2023-05-27', '18:00:00', '18:40:00', 'Disponible', 13, 240000),
('HK-5348',2,'2023-05-28', '2023-05-28', '09:00:00', '09:40:00', 'Disponible', 13, 240000),
('HK-5348',2,'2023-05-28', '2023-05-28', '13:00:00', '13:40:00', 'Disponible', 7, 240000),
('HK-5348',2,'2023-05-28', '2023-05-28', '18:00:00', '18:40:00', 'Disponible', 10, 240000),
('HK-5348',2,'2023-05-29', '2023-05-29', '09:00:00', '09:40:00', 'Disponible', 15, 240000),
('HK-5348',2,'2023-05-29', '2023-05-29', '13:00:00', '13:40:00', 'Disponible', 8, 240000),
('HK-5348',2,'2023-05-29', '2023-05-29', '18:00:00', '18:40:00', 'Disponible', 10, 240000),
('HK-5348',2,'2023-05-30', '2023-05-30', '09:00:00', '09:40:00', 'Disponible', 7, 240000),
('HK-5348',2,'2023-05-30', '2023-05-30', '13:00:00', '13:40:00', 'Disponible', 6, 240000),
('HK-5348',2,'2023-05-30', '2023-05-30', '18:00:00', '18:40:00', 'Disponible', 9, 240000),
('HK-5348',2,'2023-05-31', '2023-05-31', '09:00:00', '09:40:00', 'Disponible', 11, 240000),
('HK-5348',2,'2023-05-31', '2023-05-31', '13:00:00', '13:40:00', 'Disponible', 6, 240000),
('HK-5348',2,'2023-05-31', '2023-05-31', '18:00:00', '18:40:00', 'Disponible', 10, 240000),
('HK-5348',2,'2023-06-01', '2023-06-01', '09:00:00', '09:40:00', 'Disponible', 10, 240000),
('HK-5348',2,'2023-06-01', '2023-06-01', '13:00:00', '13:40:00', 'Disponible', 16, 240000),
('HK-5348',2,'2023-06-01', '2023-06-01', '18:00:00', '18:40:00', 'Disponible', 11, 240000),
('HK-5348',2,'2023-06-02', '2023-06-02', '09:00:00', '09:40:00', 'Disponible', 13, 240000),
('HK-5348',2,'2023-06-02', '2023-06-02', '13:00:00', '13:40:00', 'Disponible', 16, 240000),
('HK-5348',2,'2023-06-02', '2023-06-02', '18:00:00', '18:40:00', 'Disponible', 10, 240000),
('HK-5348',2,'2023-06-03', '2023-06-03', '09:00:00', '09:40:00', 'Disponible', 19, 240000),
('HK-5348',2,'2023-06-03', '2023-06-03', '13:00:00', '13:40:00', 'Disponible', 13, 240000),
('HK-5348',2,'2023-06-03', '2023-06-03', '18:00:00', '18:40:00', 'Disponible', 10, 240000),
('HK-5348',2,'2023-06-04', '2023-06-04', '09:00:00', '09:40:00', 'Disponible', 10, 240000),
('HK-5348',2,'2023-06-04', '2023-06-04', '13:00:00', '13:40:00', 'Disponible', 13, 240000),
('HK-5348',2,'2023-06-04', '2023-06-04', '18:00:00', '18:40:00', 'Disponible', 16, 240000),
('HK-652V',3,'2023-05-24', '2023-05-24', '07:20:00', '08:20:00', 'Disponible', 5, 200000),
('HK-652V',3,'2023-05-24', '2023-05-24', '12:00:00', '13:00:00', 'Disponible', 7, 200000),
('HK-652V',3,'2023-05-24', '2023-05-24', '18:00:00', '19:00:00', 'Disponible', 10, 200000),
('HK-652V',3,'2023-05-25', '2023-05-25', '07:20:00', '08:20:00', 'Disponible', 12, 200000),
('HK-652V',3,'2023-05-25', '2023-05-25', '12:00:00', '13:00:00', 'Disponible', 7, 200000),
('HK-652V',3,'2023-05-25', '2023-05-25', '18:00:00', '19:00:00', 'Disponible', 10, 200000),
('HK-652V',3,'2023-05-26', '2023-05-26', '07:20:00', '08:20:00', 'Disponible', 12, 200000),
('HK-652V',3,'2023-05-26', '2023-05-26', '12:00:00', '13:00:00', 'Disponible', 13, 200000),
('HK-652V',3,'2023-05-26', '2023-05-26', '18:00:00', '19:00:00', 'Disponible', 10, 200000),
('HK-652V',3,'2023-05-27', '2023-05-27', '07:20:00', '08:20:00', 'Disponible', 5, 200000),
('HK-652V',3,'2023-05-27', '2023-05-27', '12:00:00', '13:00:00', 'Disponible', 7, 200000),
('HK-652V',3,'2023-05-27', '2023-05-27', '18:00:00', '19:00:00', 'Disponible', 10, 200000),
('HK-652V',3,'2023-05-28', '2023-05-28', '07:20:00', '08:20:00', 'Disponible', 5, 200000),
('HK-652V',3,'2023-05-28', '2023-05-28', '12:00:00', '13:00:00', 'Disponible', 17, 200000),
('HK-652V',3,'2023-05-28', '2023-05-28', '18:00:00', '19:00:00', 'Disponible', 14, 200000),
('HK-652V',3,'2023-05-29', '2023-05-29', '07:20:00', '08:20:00', 'Disponible', 15, 200000),
('HK-652V',3,'2023-05-29', '2023-05-29', '12:00:00', '13:00:00', 'Disponible', 16, 200000),
('HK-652V',3,'2023-05-29', '2023-05-29', '18:00:00', '19:00:00', 'Disponible', 10, 200000),
('HK-652V',3,'2023-05-30', '2023-05-30', '07:20:00', '08:20:00', 'Disponible', 5, 200000),
('HK-652V',3,'2023-05-30', '2023-05-30', '12:00:00', '13:00:00', 'Disponible', 15, 200000),
('HK-652V',3,'2023-05-30', '2023-05-30', '18:00:00', '19:00:00', 'Disponible', 10, 200000),
('HK-652V',3,'2023-05-31', '2023-05-31', '07:20:00', '08:20:00', 'Disponible', 21, 200000),
('HK-652V',3,'2023-05-31', '2023-05-31', '12:00:00', '13:00:00', 'Disponible', 17, 200000),
('HK-652V',3,'2023-05-31', '2023-05-31', '18:00:00', '19:00:00', 'Disponible', 10, 200000),
('HK-652V',3,'2023-06-01', '2023-06-01', '07:20:00', '08:20:00', 'Disponible', 15, 200000),
('HK-652V',3,'2023-06-01', '2023-06-01', '12:00:00', '13:00:00', 'Disponible', 7, 200000),
('HK-652V',3,'2023-06-01', '2023-06-01', '18:00:00', '19:00:00', 'Disponible', 10, 200000),
('HK-652V',3,'2023-06-02', '2023-06-02', '07:20:00', '08:20:00', 'Disponible', 11, 200000),
('HK-652V',3,'2023-06-02', '2023-06-02', '12:00:00', '13:00:00', 'Disponible', 17, 200000),
('HK-652V',3,'2023-06-02', '2023-06-02', '18:00:00', '19:00:00', 'Disponible', 12, 200000),
('HK-652V',3,'2023-06-03', '2023-06-03', '07:20:00', '08:20:00', 'Disponible', 14, 200000),
('HK-652V',3,'2023-06-03', '2023-06-03', '12:00:00', '13:00:00', 'Disponible', 17, 200000),
('HK-652V',3,'2023-06-03', '2023-06-03', '18:00:00', '19:00:00', 'Disponible', 12, 200000),
('HK-652V',3,'2023-06-04', '2023-06-04', '07:20:00', '08:20:00', 'Disponible', 15, 200000),
('HK-652V',3,'2023-06-04', '2023-06-04', '12:00:00', '13:00:00', 'Disponible', 17, 200000),
('HK-652V',3,'2023-06-04', '2023-06-04', '18:00:00', '19:00:00', 'Disponible', 19, 200000),
('N-747AV',4,'2023-05-24', '2023-05-24', '07:00:00', '17:00:00', 'Disponible', 20, 3240000),
('N-742AV',4,'2023-05-24', '2023-05-24', '12:30:00', '22:30:00', 'Disponible', 24, 3240000),
('N-749AV',4,'2023-05-24', '2023-05-25', '18:30:00', '04:30:00', 'Disponible', 18, 3240000),
('N-747AV',4,'2023-05-25', '2023-05-25', '07:00:00', '17:00:00', 'Disponible', 20, 3240000),
('N-742AV',4,'2023-05-25', '2023-05-25', '12:30:00', '22:30:00', 'Disponible', 24, 3240000),
('N-749AV',4,'2023-05-25', '2023-05-26', '18:30:00', '04:30:00', 'Disponible', 18, 3240000),
('N-747AV',4,'2023-05-26', '2023-05-26', '07:00:00', '17:00:00', 'Disponible', 20, 3240000),
('N-742AV',4,'2023-05-26', '2023-05-26', '12:30:00', '22:30:00', 'Disponible', 24, 3240000),
('N-749AV',4,'2023-05-26', '2023-05-27', '18:30:00', '04:30:00', 'Disponible', 18, 3240000),
('N-747AV',4,'2023-05-27', '2023-05-27', '07:00:00', '17:00:00', 'Disponible', 20, 3240000),
('N-742AV',4,'2023-05-27', '2023-05-27', '12:30:00', '22:30:00', 'Disponible', 24, 3240000),
('N-749AV',4,'2023-05-27', '2023-05-28', '18:30:00', '04:30:00', 'Disponible', 18, 3240000),
('N-747AV',4,'2023-05-28', '2023-05-28', '07:00:00', '17:00:00', 'Disponible', 20, 3240000),
('N-742AV',4,'2023-05-28', '2023-05-28', '12:30:00', '22:30:00', 'Disponible', 24, 3240000),
('N-749AV',4,'2023-05-28', '2023-05-29', '18:30:00', '04:30:00', 'Disponible', 18, 3240000),
('N-747AV',4,'2023-05-29', '2023-05-29', '07:00:00', '17:00:00', 'Disponible', 20, 3240000),
('N-742AV',4,'2023-05-29', '2023-05-29', '12:30:00', '22:30:00', 'Disponible', 24, 3240000),
('N-749AV',4,'2023-05-29', '2023-05-30', '18:30:00', '04:30:00', 'Disponible', 18, 3240000),
('N-747AV',4,'2023-05-30', '2023-05-30', '07:00:00', '17:00:00', 'Disponible', 20, 3240000),
('N-742AV',4,'2023-05-30', '2023-05-30', '12:30:00', '22:30:00', 'Disponible', 24, 3240000),
('N-749AV',4,'2023-05-30', '2023-05-31', '18:30:00', '04:30:00', 'Disponible', 18, 3240000),
('N-747AV',4,'2023-05-31', '2023-05-31', '07:00:00', '17:00:00', 'Disponible', 20, 3240000),
('N-742AV',4,'2023-05-31', '2023-05-31', '12:30:00', '22:30:00', 'Disponible', 24, 3240000),
('N-749AV',4,'2023-05-31', '2023-06-01', '18:30:00', '04:30:00', 'Disponible', 18, 3240000),
('N-747AV',4,'2023-06-01', '2023-06-01', '07:00:00', '17:00:00', 'Disponible', 20, 3240000),
('N-742AV',4,'2023-06-01', '2023-06-01', '12:30:00', '22:30:00', 'Disponible', 24, 3240000),
('N-749AV',4,'2023-06-01', '2023-06-02', '18:30:00', '04:30:00', 'Disponible', 18, 3240000),
('N-747AV',4,'2023-06-02', '2023-06-02', '07:00:00', '17:00:00', 'Disponible', 20, 3240000),
('N-742AV',4,'2023-06-02', '2023-06-02', '12:30:00', '22:30:00', 'Disponible', 24, 3240000),
('N-749AV',4,'2023-06-02', '2023-06-03', '18:30:00', '04:30:00', 'Disponible', 18, 3240000),
('N-747AV',4,'2023-06-03', '2023-06-03', '07:00:00', '17:00:00', 'Disponible', 20, 3240000),
('N-742AV',4,'2023-06-03', '2023-06-03', '12:30:00', '22:30:00', 'Disponible', 24, 3240000),
('N-749AV',4,'2023-06-03', '2023-06-04', '18:30:00', '04:30:00', 'Disponible', 18, 3240000),
('N-747AV',4,'2023-06-04', '2023-06-04', '07:00:00', '17:00:00', 'Disponible', 20, 3240000),
('N-742AV',4,'2023-06-04', '2023-06-04', '12:30:00', '22:30:00', 'Disponible', 24, 3240000),
('N-749AV',4,'2023-06-04', '2023-06-05', '18:30:00', '04:30:00', 'Disponible', 18, 3240000),
('HK-5348',5,'2023-05-24', '2023-05-25', '05:00:00', '06:00:00', 'Disponible', 10, 9180000),
('HK-5350',5,'2023-05-24', '2023-05-25', '12:00:00', '13:00:00', 'Disponible', 20, 9180000),
('HK-5351',5,'2023-05-24', '2023-05-25', '18:00:00', '19:00:00', 'Disponible', 22, 9180000),
('HK-5348',5,'2023-05-25', '2023-05-26', '05:00:00', '06:00:00', 'Disponible', 10, 9180000),
('HK-5350',5,'2023-05-25', '2023-05-26', '12:00:00', '13:00:00', 'Disponible', 20, 9180000),
('HK-5351',5,'2023-05-25', '2023-05-26', '18:00:00', '19:00:00', 'Disponible', 22, 9180000),
('HK-5348',5,'2023-05-26', '2023-05-27', '05:00:00', '06:00:00', 'Disponible', 10, 9180000),
('HK-5350',5,'2023-05-26', '2023-05-27', '12:00:00', '13:00:00', 'Disponible', 20, 9180000),
('HK-5351',5,'2023-05-26', '2023-05-27', '18:00:00', '19:00:00', 'Disponible', 22, 9180000),
('HK-5348',5,'2023-05-27', '2023-05-28', '05:00:00', '06:00:00', 'Disponible', 10, 9180000),
('HK-5350',5,'2023-05-27', '2023-05-28', '12:00:00', '13:00:00', 'Disponible', 20, 9180000),
('HK-5351',5,'2023-05-27', '2023-05-28', '18:00:00', '19:00:00', 'Disponible', 22, 9180000),
('HK-5348',5,'2023-05-28', '2023-05-29', '05:00:00', '06:00:00', 'Disponible', 10, 9180000),
('HK-5350',5,'2023-05-28', '2023-05-29', '12:00:00', '13:00:00', 'Disponible', 20, 9180000),
('HK-5351',5,'2023-05-28', '2023-05-29', '18:00:00', '19:00:00', 'Disponible', 22, 9180000),
('HK-5348',5,'2023-05-29', '2023-05-30', '05:00:00', '06:00:00', 'Disponible', 10, 9180000),
('HK-5350',5,'2023-05-29', '2023-05-30', '12:00:00', '13:00:00', 'Disponible', 20, 9180000),
('HK-5351',5,'2023-05-29', '2023-05-30', '18:00:00', '19:00:00', 'Disponible', 22, 9180000),
('HK-5348',5,'2023-05-30', '2023-05-31', '05:00:00', '06:00:00', 'Disponible', 10, 9180000),
('HK-5350',5,'2023-05-30', '2023-05-31', '12:00:00', '13:00:00', 'Disponible', 20, 9180000),
('HK-5351',5,'2023-05-30', '2023-05-31', '18:00:00', '19:00:00', 'Disponible', 22, 9180000),
('HK-5348',5,'2023-05-31', '2023-06-01', '05:00:00', '06:00:00', 'Disponible', 10, 9180000),
('HK-5350',5,'2023-05-31', '2023-06-01', '12:00:00', '13:00:00', 'Disponible', 20, 9180000),
('HK-5351',5,'2023-05-31', '2023-06-01', '18:00:00', '19:00:00', 'Disponible', 22, 9180000),
('HK-5348',5,'2023-06-01', '2023-06-02', '05:00:00', '06:00:00', 'Disponible', 10, 9180000),
('HK-5350',5,'2023-06-01', '2023-06-02', '12:00:00', '13:00:00', 'Disponible', 20, 9180000),
('HK-5351',5,'2023-06-01', '2023-06-02', '18:00:00', '19:00:00', 'Disponible', 22, 9180000),
('HK-5348',5,'2023-06-02', '2023-06-03', '05:00:00', '06:00:00', 'Disponible', 10, 9180000),
('HK-5350',5,'2023-06-02', '2023-06-03', '12:00:00', '13:00:00', 'Disponible', 20, 9180000),
('HK-5351',5,'2023-06-02', '2023-06-03', '18:00:00', '19:00:00', 'Disponible', 22, 9180000),
('HK-5348',5,'2023-06-03', '2023-06-04', '05:00:00', '06:00:00', 'Disponible', 10, 9180000),
('HK-5350',5,'2023-06-03', '2023-06-04', '12:00:00', '13:00:00', 'Disponible', 20, 9180000),
('HK-5351',5,'2023-06-03', '2023-06-04', '18:00:00', '19:00:00', 'Disponible', 22, 9180000),
('HK-5348',5,'2023-06-04', '2023-06-05', '05:00:00', '06:00:00', 'Disponible', 10, 9180000),
('HK-5350',5,'2023-06-04', '2023-06-05', '12:00:00', '13:00:00', 'Disponible', 20, 9180000),
('HK-5351',5,'2023-06-04', '2023-06-05', '18:00:00', '19:00:00', 'Disponible', 22, 9180000),
('HK-647V',6,'2023-05-24', '2023-05-24', '07:30:00', '13:40:00', 'Disponible', 3, 785000),
('HK-649V',6,'2023-05-24', '2023-05-24', '12:00:00', '18:10:00', 'Disponible', 7, 785000),
('HK-651V',6,'2023-05-24', '2023-05-24', '17:20:00', '23:30:00', 'Disponible', 4, 785000),
('HK-647V',6,'2023-05-25', '2023-05-25', '07:30:00', '13:40:00', 'Disponible', 5, 785000),
('HK-649V',6,'2023-05-25', '2023-05-25', '12:00:00', '18:10:00', 'Disponible', 7, 785000),
('HK-651V',6,'2023-05-25', '2023-05-25', '17:20:00', '23:30:00', 'Disponible', 6, 785000),
('HK-647V',6,'2023-05-26', '2023-05-26', '07:30:00', '13:40:00', 'Disponible', 10, 785000),
('HK-649V',6,'2023-05-26', '2023-05-26', '12:00:00', '18:10:00', 'Disponible', 8, 785000),
('HK-651V',6,'2023-05-26', '2023-05-26', '17:20:00', '23:30:00', 'Disponible', 9, 785000),
('HK-647V',6,'2023-05-27', '2023-05-27', '07:30:00', '13:40:00', 'Disponible', 8, 785000),
('HK-649V',6,'2023-05-27', '2023-05-27', '12:00:00', '18:10:00', 'Disponible', 9, 785000),
('HK-651V',6,'2023-05-27', '2023-05-27', '17:20:00', '23:30:00', 'Disponible', 10, 785000),
('HK-647V',6,'2023-05-28', '2023-05-28', '07:30:00', '13:40:00', 'Disponible', 12, 785000),
('HK-649V',6,'2023-05-28', '2023-05-28', '12:00:00', '18:10:00', 'Disponible', 10, 785000),
('HK-651V',6,'2023-05-28', '2023-05-28', '17:20:00', '23:30:00', 'Disponible', 11, 785000),
('HK-647V',6,'2023-05-29', '2023-05-29', '07:30:00', '13:40:00', 'Disponible', 13, 785000),
('HK-649V',6,'2023-05-29', '2023-05-29', '12:00:00', '18:10:00', 'Disponible', 17, 785000),
('HK-651V',6,'2023-05-29', '2023-05-29', '17:20:00', '23:30:00', 'Disponible', 11, 785000),
('HK-647V',6,'2023-05-30', '2023-05-30', '07:30:00', '13:40:00', 'Disponible', 13, 785000),
('HK-649V',6,'2023-05-30', '2023-05-30', '12:00:00', '18:10:00', 'Disponible', 17, 785000),
('HK-651V',6,'2023-05-30', '2023-05-30', '17:20:00', '23:30:00', 'Disponible', 16, 785000),
('HK-647V',6,'2023-05-31', '2023-05-31', '07:30:00', '13:40:00', 'Disponible', 19, 785000),
('HK-649V',6,'2023-05-31', '2023-05-31', '12:00:00', '18:10:00', 'Disponible', 17, 785000),
('HK-651V',6,'2023-05-31', '2023-05-31', '17:20:00', '23:30:00', 'Disponible', 22, 785000),
('HK-647V',6,'2023-06-01', '2023-06-01', '07:30:00', '13:40:00', 'Disponible', 23, 785000),
('HK-649V',6,'2023-06-01', '2023-06-01', '12:00:00', '18:10:00', 'Disponible', 20, 785000),
('HK-651V',6,'2023-06-01', '2023-06-01', '17:20:00', '23:30:00', 'Disponible', 15, 785000),
('HK-647V',6,'2023-06-02', '2023-06-02', '07:30:00', '13:40:00', 'Disponible', 17, 785000),
('HK-649V',6,'2023-06-02', '2023-06-02', '12:00:00', '18:10:00', 'Disponible', 18, 785000),
('HK-651V',6,'2023-06-02', '2023-06-02', '17:20:00', '23:30:00', 'Disponible', 16, 785000),
('HK-647V',6,'2023-06-03', '2023-06-03', '07:30:00', '13:40:00', 'Disponible', 18, 785000),
('HK-649V',6,'2023-06-03', '2023-06-03', '12:00:00', '18:10:00', 'Disponible', 20, 785000),
('HK-651V',6,'2023-06-03', '2023-06-03', '17:20:00', '23:30:00', 'Disponible', 19, 785000),
('HK-647V',6,'2023-06-04', '2023-06-04', '07:30:00', '13:40:00', 'Disponible', 18, 785000),
('HK-649V',6,'2023-06-04', '2023-06-04', '12:00:00', '18:10:00', 'Disponible', 20, 785000),
('HK-651V',6,'2023-06-04', '2023-06-04', '17:20:00', '23:30:00', 'Disponible', 23, 785000);