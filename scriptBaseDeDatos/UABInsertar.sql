-- Universidad
INSERT INTO universidad VALUES (null,'Universidad Adventista de Bolivia');
-- facultad
INSERT INTO facultad VALUES (null,'Ingenieria',1);
INSERT INTO facultad VALUES (null,'Salud',1);
INSERT INTO facultad VALUES (null,'Humanidades',1);
INSERT INTO facultad VALUES (null,'FCEA',1);
INSERT INTO facultad VALUES (null,'Teologia',1);
-- carrera
INSERT INTO carrera VALUES (null,'sistemas',1,1);
INSERT INTO carrera VALUES (null,'telecom',1,1);
INSERT INTO carrera VALUES (null,'nutricion',2,1);
INSERT INTO carrera VALUES (null,'Fisio',2,1);
INSERT INTO carrera VALUES (null,'actividad FIsica',3,1);
INSERT INTO carrera VALUES (null,'psicologia',3,1);
INSERT INTO carrera VALUES (null,'Contaduria',4,1);
INSERT INTO carrera VALUES (null,'administracion',4,1);
INSERT INTO carrera VALUES (null,'teologia',5,1);
-- rol
INSERT INTO rol VALUES (null,'Jefe de Gestión de Talento Humano');
INSERT INTO rol VALUES (null,'Jefe de Departamento');
INSERT INTO rol VALUES (null,'Estudiante');
INSERT INTO rol VALUES (null,'Encargado de Finanzas');
-- Estudiante
INSERT INTO estudiante 
VALUES (null,1,3,10,'123', 'angel', 'andy', 'bravo', 'sayales', 'Masculino', '26/03/2000','asayales','12345', 1 );
INSERT INTO estudiante  
VALUES (null,2,3,11,'456', 'carolina', 'andrea', 'duran', 'galarza', 'femenino', '18/05/1999','cduran','12345',1 );
INSERT INTO estudiante 
VALUES (null,3,3,12,'789', 'Patricia', 'Monica', 'Mamani', 'Ortiz', 'femenino','6/01/1999','pmamani','12345',1 );
INSERT INTO estudiante 
VALUES (null,4,3,13,'234', 'Pedro', 'Mateo', 'Valdes', 'Flores', 'Masculino', '9/02/1987','pflores','12345', 1 );
INSERT INTO estudiante 
VALUES (null,5,3,14,'459', 'Misael', 'Jared', 'Cachi', 'Navarro', 'Masculino', '2/03/1998','mnavarro','12345', 1 );
INSERT INTO estudiante 
VALUES (null,3,3,15,'723', 'Jared', 'Yeny', 'Chura', 'Mamani', 'femenino', '4/04/2001','jchura','12345',1 );
INSERT INTO estudiante  
VALUES (null,2,3,16,'093', 'Mauricio', 'Bernal', 'Ortiz', 'Brabo', 'Masculino', '12/05/2002','mortiz','12345', 1 );
INSERT INTO estudiante 
VALUES (null,5,3,17,'104', 'Eddy', 'Omar', 'Baldez','Flores', 'Masculino', '18/06/2003','ebaldez','12345',1);
-- tipoBeca
INSERT INTO tipoBeca (idTipoBeca,nombre,esInstitucional) VALUES ('1','Beca Asociado','1');
INSERT INTO tipoBeca (idTipoBeca,nombre,esInstitucional) VALUES ('2','Beca Excelencia Academica','2');
INSERT INTO tipoBeca (idTipoBeca,nombre,esInstitucional) VALUES ('3','Beca Colportaje','3');
INSERT INTO tipoBeca (idTipoBeca,nombre,esInstitucional) VALUES ('4','Beca Traspaso','4');
INSERT INTO tipoBeca (idTipoBeca,nombre,esInstitucional) VALUES ('5','Beca Social','5');
INSERT INTO tipoBeca (idTipoBeca,nombre,esInstitucional) VALUES ('6','Beca Industrial','4');
INSERT INTO tipoBeca (idTipoBeca,nombre,esInstitucional) VALUES ('7','Beca Convenio Institucional','3');
-- departa,emtp
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'limpieza' );
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Cocina' );
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'TI' );
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Jardineria' );
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Biblioteca' );
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Seguridad' );
INSERT INTO departamento (idDepartamento, nombre) VALUES (null,'Piscina' );
-- dia
INSERT INTO dia VALUES (null,'Lunes');
INSERT INTO dia VALUES (null,'Martes');
INSERT INTO dia VALUES (null,'Miercoles');
INSERT INTO dia VALUES (null,'Jueves');
INSERT INTO dia VALUES (null,'Viernes');
INSERT INTO dia VALUES (null,'Domingo');
-- precio
INSERT INTO precio VALUES (null,8);
INSERT INTO precio VALUES (null,6);
INSERT INTO precio VALUES (null,4);
INSERT INTO precio VALUES (null,9);
INSERT INTO precio VALUES (null,5);
-- gestiom
INSERT INTO gestion (idgestion,nombre, activo) VALUES ('1','2019-A', 0);
INSERT INTO gestion (idgestion,nombre, activo) VALUES ('2','2019-B', 0);
INSERT INTO gestion (idgestion,nombre, activo) VALUES ('3','2020-A', 0);
INSERT INTO gestion (idgestion,nombre, activo) VALUES ('5','2020-B', 0);
INSERT INTO gestion (idgestion,nombre, activo) VALUES ('6','2021-A', 1);
INSERT INTO gestion (idgestion,nombre, activo) VALUES ('7','2021-B', 0);
INSERT INTO gestion (idgestion,nombre, activo) VALUES ('8','2022-A', 0);
-- hora
INSERT INTO hora VALUES (null,8);
INSERT INTO hora VALUES (null,6);
INSERT INTO hora VALUES (null,4);
-- descuento
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'10%');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'20%');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'30%');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'40%');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'50%');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'60%');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'70%');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'80%');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'90%');
INSERT INTO descuento (idDescuento,porcentaje) VALUES(null,'100%');
-- area
INSERT INTO area VALUES (null,1,'Contabilidad',1);
INSERT INTO area VALUES (null,1,'Caja',1);
INSERT INTO area VALUES (null,1,'Finanzas',1);
INSERT INTO area VALUES (null,2,'sopas',1);
INSERT INTO area VALUES (null,2,'atencion',1);
INSERT INTO area VALUES (null,3,'Hadware',1);
INSERT INTO area VALUES (null,3,'Servidores',1);
INSERT INTO area VALUES (null,4,'plaza',1);
INSERT INTO area VALUES (null,4,'vivero',1);
INSERT INTO area VALUES (null,5,'atencionPrincipal',1);
INSERT INTO area VALUES (null,5,'atencionPabellon',1);
INSERT INTO area VALUES (null,6,'garita',1);
INSERT INTO area VALUES (null,6,'puerta sur',1);
INSERT INTO area VALUES (null,7,'atencionPrincipal',1);
INSERT INTO area VALUES (null,7,'maquinas',1);
-- beca institucional
INSERT INTO becaInstitucional VALUES (null,6,1,2);
INSERT INTO becaInstitucional VALUES (null,6,2,2);
INSERT INTO becaInstitucional VALUES (null,6,3,3);
INSERT INTO becaInstitucional VALUES (null,6,4,2);
-- horario trabajo
INSERT INTO horarioTrabajo VALUES (1,1,'07:30','12:30');
INSERT INTO horarioTrabajo VALUES (1,3,'04:30','11:30');
INSERT INTO horarioTrabajo VALUES (1,5,'08:00','13:30');
INSERT INTO horarioTrabajo VALUES (2,2,'09:30','13:30');
INSERT INTO horarioTrabajo VALUES (2,3,'12:30','16:30');
INSERT INTO horarioTrabajo VALUES (3,1,'07:30','12:30');
INSERT INTO horarioTrabajo VALUES (3,2,'04:30','11:30');
INSERT INTO horarioTrabajo VALUES (3,3,'08:00','13:30');
INSERT INTO horarioTrabajo VALUES (4,4,'09:30','13:30');
INSERT INTO horarioTrabajo VALUES (4,1,'12:30','16:30');
-- personal
INSERT INTO personal 
VALUES(null,1,'Juan','Ronal','Mamani','Flores','1234','jmamani','12345',1);
INSERT INTO personal 
VALUES(null,2,'David','Mauricio','Cachi','Mamani','1232','dcachi','43535',1);
INSERT INTO personal 
VALUES(null,2,'Samuel','Deymar','Zambrana','Mamani','4546','szambrana','76432',1);
INSERT INTO personal 
VALUES(null,4,'Josue','ariel','Panuni','Morales','1234','jpanuni','12345',1);
-- personalDepartamento 
INSERT INTO personalDepartamento VALUES (6,2,2);
INSERT INTO personalDepartamento VALUES (6,1,2);
INSERT INTO personalDepartamento VALUES (6,3,2);
INSERT INTO personalDepartamento VALUES (6,1,2);
INSERT INTO personalDepartamento VALUES (6,2,2);
-- noInstituciuonal
INSERT INTO BecaNoInstitucional VALUES (null,1,2,4,1,'situacion critica');
INSERT INTO BecaNoInstitucional VALUES (null,2,1,4,2,'situacion critica');
INSERT INTO BecaNoInstitucional VALUES (null,3,2,4,3,'situacion critica');
INSERT INTO BecaNoInstitucional VALUES (null,4,1,3,4,'situacion critica');
INSERT INTO BecaNoInstitucional VALUES (null,5,1,3,5,'situacion critica');
INSERT INTO BecaNoInstitucional VALUES (null,6,2,3,6,'situacion critica');
INSERT INTO BecaNoInstitucional VALUES (null,7,1,2,7,'situacion critica');
INSERT INTO BecaNoInstitucional VALUES (null,8,2,2,8,'situacion critica');
INSERT INTO BecaNoInstitucional VALUES (null,5,3,3,3,'situacion critica');
INSERT INTO BecaNoInstitucional VALUES (null,6,3,3,2,'situacion critica');
INSERT INTO BecaNoInstitucional VALUES (null,1,1,4,1,'situacion critica');
INSERT INTO BecaNoInstitucional VALUES (null,2,3,4,2,'situacion critica');
INSERT INTO BecaNoInstitucional VALUES (null,7,2,2,7,'situacion critica');
INSERT INTO BecaNoInstitucional VALUES (null,8,1,2,8,'situacion critica');
-- asignacionBecaInstitucional
INSERT INTO asignacionBecaInstitucional VALUES(null,1,1);
INSERT INTO asignacionBecaInstitucional VALUES(null,2,2);
INSERT INTO asignacionBecaInstitucional VALUES(null,3,1);
INSERT INTO asignacionBecaInstitucional VALUES(null,4,2);
INSERT INTO asignacionBecaInstitucional VALUES(null,1,3);
INSERT INTO asignacionBecaInstitucional VALUES(null,2,3);
INSERT INTO asignacionBecaInstitucional VALUES(null,3,4);
INSERT INTO asignacionBecaInstitucional VALUES(null,3,4);
-- registroEntradaSalida
INSERT INTO registroEntradaSalida VALUES(1,'10/06/2021','7:30','10:30',3);
INSERT INTO registroEntradaSalida VALUES(2,'11/07/2021','9:30','14:30',5);
INSERT INTO registroEntradaSalida VALUES(3,'12/08/2021','6:30','15:30',9);
INSERT INTO registroEntradaSalida VALUES(4,'13/09/2021','9:00','11:00',2);
INSERT INTO registroEntradaSalida VALUES(5,'14/10/2021','14:30','17:30',3);
INSERT INTO registroEntradaSalida VALUES(1,'15/11/2021','7:30','19:30',2);
INSERT INTO registroEntradaSalida VALUES(2,'16/01/2021','7:30','08:30',1);
INSERT INTO registroEntradaSalida VALUES(3,'17/02/2021','8:30','10:30',2);
INSERT INTO registroEntradaSalida VALUES(4,'18/03/2021','10:30','12:30',2);
INSERT INTO registroEntradaSalida VALUES(5,'01/06/2021','03:25',' ',' ');