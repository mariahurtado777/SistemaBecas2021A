DROP DATABASE IF EXISTS asistenciaBecarios;
CREATE DATABASE IF NOT EXISTS asistenciaBecarios;
USE asistenciaBecarios;

create table universidad
(
idUniversidad int  AUTO_INCREMENT PRIMARY KEY,
nombre varchar (50) not null
) ENGINE = InnoDB;

create table facultad
(
idFacultad int  AUTO_INCREMENT PRIMARY KEY,
nombre varchar (50) not null,
idUniversidad int ,
foreign key (idUniversidad) references universidad(idUniversidad) on update cascade on delete cascade 
) ENGINE = InnoDB;

create table carrera
(
idCarrera int  AUTO_INCREMENT PRIMARY KEY,
nombre varchar (50) not null,
idFacultad int ,
activo bool,
foreign key (idFacultad) references facultad(idFacultad)
) ENGINE = InnoDB;

create table rol
(
idRol int  AUTO_INCREMENT PRIMARY KEY,
nombre varchar (50) not null
) ENGINE = InnoDB;

create table estudiante
(
idEstudiante int  AUTO_INCREMENT PRIMARY KEY,
idCarrera int ,
idRol int ,
codigoEstudiante int (10),
ci varchar(20),
primerNombre varchar (50) not null,
segundoNombre varchar (50) not null,
apellidoPaterno varchar (50) not null,
apellidoMaterno varchar (50) not null,
genero Enum('masculino','femenino'),
fechaNacimiento varchar (20),
usuario varchar (20),
contrasenia varchar (100),
activo bool ,
foreign key (idCarrera) references carrera(idCarrera) on update cascade on delete cascade,
foreign key (idRol) references rol(idRol) on update cascade on delete cascade
) ENGINE = InnoDB;

create table tipoBeca
(
idTipoBeca int   AUTO_INCREMENT PRIMARY KEY,
nombre varchar (50) not null,
esInstitucional bool
) ENGINE = InnoDB;

create table departamento
(
idDepartamento int  AUTO_INCREMENT PRIMARY KEY,
nombre varchar (50) not null
) ENGINE = InnoDB;



create table dia
(
idDia int  AUTO_INCREMENT PRIMARY KEY,
dia varchar(10)
) ENGINE = InnoDB;

create table precio
(
idPrecio int  AUTO_INCREMENT PRIMARY KEY,
precio int (10)
) ENGINE = InnoDB;

create table gestion
(
idgestion int  AUTO_INCREMENT PRIMARY KEY,
nombre varchar (20),
activo bool
) ENGINE = InnoDB;

create table hora
(
idHora int  AUTO_INCREMENT PRIMARY KEY,
hora varchar (10)
) ENGINE = InnoDB;

create table descuento
(
idDescuento int   AUTO_INCREMENT PRIMARY KEY,
porcentaje varchar (10)
) ENGINE = InnoDB;

create table area
(
idArea int   AUTO_INCREMENT PRIMARY KEY,
idDepartamento int ,
nombre varchar (20),
activo bool,
foreign key (idDepartamento) references departamento(idDepartamento) on update cascade on delete cascade
) ENGINE = InnoDB;

create table becaInstitucional
(
idBecaInstitucional int  AUTO_INCREMENT PRIMARY KEY,
idgestion int ,
idArea int ,
idPrecio int ,
foreign key (idgestion) references gestion(idgestion) ,
foreign key (idArea) references area(idArea) ,
foreign key (idPrecio) references precio(idPrecio) 
) ENGINE = InnoDB;



create table horarioTrabajo
(
idBecaInstitucional int ,
idDia int ,
idHoraInicio int (10),
idHoraFin int (10),
foreign key (idBecaInstitucional) references BecaInstitucional(idBecaInstitucional) on update cascade on delete cascade,
foreign key (idDia) references dia(idDia)on update cascade on delete cascade
) ENGINE = InnoDB;

create table personal
(
idPersonal int  AUTO_INCREMENT PRIMARY KEY,
idRol int ,
primerNombre varchar (20) not null, 
segundoNombre varchar (20) not null,
apellidoPaterno varchar (20) not null,
apellidoMaterno varchar (20) not null,
ci varchar (30),
usuario varchar (20),
contrasenia varchar (100),
activo bool,
foreign key (idRol) references rol(idRol) on update cascade on delete cascade
) ENGINE = InnoDB;

create table personalDepartamento
(
idDepartamento int ,
idPersonal int ,
idgestion int ,
foreign key (idDepartamento) references departamento(idDepartamento) on update cascade on delete cascade,
foreign key (idPersonal) references personal(idPersonal) on update cascade on delete cascade,
foreign key (idgestion) references gestion(idgestion) on update cascade on delete cascade
) ENGINE = InnoDB;

create table BecaNoInstitucional
(
idBecaNoInstitucional int   AUTO_INCREMENT PRIMARY KEY,
idDescuento int ,
idgestion int ,
idTipoBeca int ,
idEstudiante int ,
descripcion varchar (50),
foreign key (idDescuento) references descuento(idDescuento) on update cascade on delete cascade,
foreign key (idgestion) references gestion(idgestion) on update cascade on delete cascade,
foreign key (idTipoBeca) references tipoBeca(idTipoBeca) on update cascade on delete cascade,
foreign key (idEstudiante) references estudiante(idEstudiante) on update cascade on delete cascade
) ENGINE = InnoDB;


CREATE table asignacionBecaInstitucional(
idAsignacionBecaInstitucional INT PRIMARY KEY AUTO_INCREMENT,
idBecaInstitucional INT,
idEstudiante INT ,
foreign key (idBecaInstitucional) references BecaInstitucional(idBecaInstitucional),
foreign KEY (idEstudiante) references estudiante(idEstudiante)
)ENGINE=InnoDB;

create table registroEntradaSalida(
idAsignacionBecaInstitucional INT,
fecha date,
horaInicio varchar(15),
HoraFin varchar(15),
totalHora INT(15),
foreign KEY (idAsignacionBecaInstitucional) references asignacionBecaInstitucional(idAsignacionBecaInstitucional) 
)ENGINE=InnoDB;