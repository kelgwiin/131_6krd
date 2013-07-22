-- Insercion de Usuario 
insert into usuario (id_usuario, clave, nombre, apellido, correo, sexo, cedula, fecha_nac,
 num_tarjeta,tipo_cuenta, nacionalidad, rif) values 
('kelgwiin','123456','Kelwin','Gamez', 'kelgwiin@gmail.com','m','20542093','1992-02-02',
'21221543131','corriente','venezolano','v-20542093-9');


-- Inserción de una reserva del usuario -> kelgwiin
insert into reserva_ocupa (id_usuario,fecha_ini,fecha_fin,categoria_habitacion,tipo_habitacion)
values ('kelgwiin','2013-02-02','2013-02-14','B','2');

-- Inserciones de campos en CONSUMIBLE ALMACEN
insert into consumible_almacen(nombre,precio,categoria,cantidad,marca) values
('cerveza',5,'N',1000,'Polar Light') ,
('cerveza',10,'B',500,'Solera') , 
('cerveza',15,'A',300,'Polar Xtreme'),
('vino',10,'N',100,'San Andrés'),
('vino',11,'B',230,'Caminos de San Joaquín'),
('vino',12,'A',250,'Uvas del Cochinal'),
('alcohol',25,'N',100, 'Vokda Glacial'),
('alcohol',35,'B',150,'Santa Teresa'),
('alcohol',75,'A',200,'Droché 80 años - Edición Especial'),

('agua',5,'N',500,'Minalba Pura de Manatial, eso dice la etiqueta'),
('refresco',3,'N',900,'Pepsi-Cola');

-- Precios de servicios del hotel que tambien se encuentran registrados en la misma tabla
insert into consumible_almacen(nombre,precio,categoria) values
('llamada_internacional',5,'N'),
('llamada_nacional',1,'N'),
('cama_niño',10,'N'),
('habitacion_individual',40,'N'),
('habitacion_doble',70,'N'),
('alojamiento',1,'N'),
('alojamiento',1.3,'B'),
('alojamiento',2.0,'A');


-- Habitaciones: 120 
-- de cada categoría son 40, y de cada tipo son 20 . lo que daría un total de 120
insert into habitacion (tipo, categoria) values 
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(1, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(2, 'N') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(1, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(2, 'B') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(1, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ,
(2, 'A') ;
