DROP DATABASE IF EXISTS becas;
CREATE DATABASE IF NOT EXISTS becas;
USE becas;

create table universidad
(
idUniversidad int  AUTO_INCREMENT PRIMARY KEY,
nombre varchar (50) not null
) ENGINE = InnoDB;

create table facultad
(
idFacultad int  AUTO_INCREMENT PRIMARY KEY,
idUniversidad int not null,
nombre varchar (100) not null,
foreign key (idUniversidad) references universidad(idUniversidad) 
) ENGINE = InnoDB;

create table carrera
(
idCarrera int  AUTO_INCREMENT PRIMARY KEY,
idFacultad int not null,
nombre varchar (80) not null,
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
idCarrera int not null,
idRol int not null,
codigoEstudiante int (10),
ci varchar(20),
primerNombre varchar (50) not null,
segundoNombre varchar (50),
apellidoPaterno varchar (50) not null,
apellidoMaterno varchar (50) ,
fechaNacimiento date not null,
genero Enum('Masculino','Femenino'),
usuario varchar (30),
contrasenia varchar (30),
activo bool not null,
foreign key (idCarrera) references carrera(idCarrera),
foreign key (idRol) references rol(idRol)
) ENGINE = InnoDB;

create table tipoBeca
(
idTipoBeca int AUTO_INCREMENT PRIMARY KEY,
nombre varchar (60) not null,
esInstitucional bool not null
) ENGINE = InnoDB;

create table departamento
(
idDepartamento int  AUTO_INCREMENT PRIMARY KEY,
nombre varchar (50) not null
) ENGINE = InnoDB;



create table dia
(
idDia int  AUTO_INCREMENT PRIMARY KEY,
dia varchar(10) NOT NULL
) ENGINE = InnoDB;

create table hora
(
idHora int  AUTO_INCREMENT PRIMARY KEY,
hora TIME NOT NULL
) ENGINE = InnoDB;

create table precio
(
idPrecio int  AUTO_INCREMENT PRIMARY KEY,
precio int (10)
) ENGINE = InnoDB;

create table gestion
(
idGestion int  AUTO_INCREMENT PRIMARY KEY,
nombre varchar (15) NOT NULL,
activo bool NOT NULL
) ENGINE = InnoDB;


create table descuento
(
idDescuento int   AUTO_INCREMENT PRIMARY KEY,
porcentaje int not null UNIQUE
) ENGINE = InnoDB;

create table area
(
idArea int   AUTO_INCREMENT PRIMARY KEY,
idDepartamento int NOT NULL,
nombre varchar (80) NOT NULL UNIQUE,
activo bool NOT NULL,
foreign key (idDepartamento) references departamento(idDepartamento)
) ENGINE = InnoDB;

-- becaNoInstitucional- Son aquellos que obtienen una beca con algun descuento
create table becaNoInstitucional
(
idBecaNoInstitucional int AUTO_INCREMENT PRIMARY KEY,
idGestion int NOT NULL,
idEstudiante int NOT NULL,
idTipoBeca int NOT NULL,
idDescuento int NOT NULL,
descripcion varchar (50),
foreign key (idEstudiante) references estudiante(idEstudiante), 
foreign key (idTipoBeca) references tipoBeca(idTipoBeca),
foreign key (idDescuento) references descuento(idDescuento),
foreign key (idGestion) references gestion(idGestion)
) ENGINE = InnoDB;

-- Son aquellas becas, donde los estudiantes postulan a solicitar una Beca TRABAJO
-- aqui pueden trabajar en un departamento y area.
create table solicitudBecaInstitucional
(
idSolicitudBecaInstitucional int  AUTO_INCREMENT PRIMARY KEY,
idGestion int NOT NULL,
idArea int NOT NULL,
idPrecio int NOT NULL,
foreign key (idGestion) references gestion(idgestion),
foreign key (idArea) references area(idArea),
foreign key (idPrecio) references precio(idPrecio) 
) ENGINE = InnoDB;

CREATE table asignacionBecaInstitucional(
idAsignacionBecaInstitucional INT PRIMARY KEY AUTO_INCREMENT,
idSolicitudBecaInstitucional INT NOT NULL,
idEstudiante INT NOT NULL,
foreign key (idSolicitudBecaInstitucional) references solicitudBecaInstitucional(idSolicitudBecaInstitucional),
foreign KEY (idEstudiante) references estudiante(idEstudiante)
)ENGINE=InnoDB;

create table horarioTrabajo
(
idSolicitudBecaInstitucional int NOT NULL,
idDia int NOT NULL,
idHoraInicio int NOT NULL,
idHoraFin int NOT NULL,
foreign key (idSolicitudBecaInstitucional) references solicitudBecaInstitucional(idSolicitudBecaInstitucional),
foreign key (idDia) references dia(idDia),
foreign key (idHoraInicio) references hora(idHora), 
foreign key (idHoraFin) references hora(idHora)
) ENGINE = InnoDB;

create table registroEntradaSalida(
idAsignacionBecaInstitucional INT NOT NULL,
fecha DATE NOT NULL,
horaInicio TIME,
HoraFin TIME,
totalHora double,
foreign KEY (idAsignacionBecaInstitucional) references asignacionBecaInstitucional(idAsignacionBecaInstitucional) 
)ENGINE=InnoDB;


create table personal
(
idPersonal int AUTO_INCREMENT PRIMARY KEY,
idRol int NOT NULL,
ci varchar (30) NOT NULL,
primerNombre varchar (20) not null, 
segundoNombre varchar (20),
apellidoPaterno varchar (20) not null,
apellidoMaterno varchar (20),
usuario varchar (20) NOT NULL,
contrasenia varchar (50) NOT NULL,
activo bool NOT NULL,
foreign key (idRol) references rol(idRol)
) ENGINE = InnoDB;

create table personalDepartamento
(
idGestion int NOT NULL,
idDepartamento int NOT NULL,
idPersonal int NOT NULL,
foreign key (idGestion) references gestion(idGestion),
foreign key (idDepartamento) references departamento(idDepartamento),
foreign key (idPersonal) references personal(idPersonal)
) ENGINE = InnoDB;





