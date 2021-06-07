-- 1.- Dada una gestión, listar la cantidad de estudiantes que hay por becas.

select  g.nombre as gestion,count(e.idEstudiante) as cantEstudiantes
from estudiante e inner join becaNoInstitucional bni
on bni.idEstudiante= e.idEstudiante
inner join gestion g
on g.idGestion=bni.idGestion
AND g.idGestion=1
inner join tipoBeca tb
on tb.idTipoBeca=bni.idTipoBeca
group by g.nombre;

-- 2. Dada una gestion y un tipo de beca, listar aquellas carreras que tienen 
-- mayor o igual a 20 estudiantes del tipo de beca seleccionado. 

			SELECT  g.nombre as gestion  ,tb.nombre as tipoBeca ,count(e.idEstudiante)   as  estudiante 
			from carrera c inner join estudiante e 
			on e.idCarrera =c.idCarrera
			inner JOIN  becaNoInstitucional bni 
			on e.idEstudiante=bni.idEstudiante
			inner join gestion g
			on g.idGestion =bni.idGestion
			AND g.idGestion=2
			inner join tipoBeca tb
			on tb.idTipoBeca=bni.idTipoBeca
			group by  g.idGestion
			having count(e.idEstudiante)>=2;


--  Dada una gestion, listar por departamento la cantidad de solicitudes.

	select  d.nombre,count(e.idEstudiante) as estudiante
	from departamento d inner join personalDepartamento dp
	on dp.idDepartamento=d.idDepartamento
	inner join  asistenciaBecaInstitucional sbi
	on sbi.idPersonalDepartamento=dp.idPersonalDepartamento
	inner join estudiante e 
	on sbi.idEstudiante=e.idEstudiante
	inner join personal p
	on sbi.idPersonal=p.idPersonal
	group by d.nombre;
















-- 1.- Dada una gestión, listar la cantidad de estudiantes que hay por becas.


SELECT  g.idGestion ,count(e.idEstudiante)  
from gestion g  inner JOIN  estudiante e
on g.idGestion=e.idGesion
inner join beca b
on e.idEstudiante=b.idEstudiante
where g.gestion=2020A
group by e.idEstudiante;

select  g.nombre,count(e.idEstudiante)
from estudiante e inner join becaInstitucional bi
on bi.idEstudiante= e.idEstudiante
inner join gestion g
on g.idGestion=bi.idGestion
inner join tipoBeca tb
on tb.idBecaInstitucional=bi.idBecaInstitucional
group by e.idEstudiante;

-- 2. Dada una gestion y un tipo de beca, listar aquellas carreras que tienen 
-- mayor o igual a 20 estudiantes del tipo de beca seleccionado. 

SELECT  g.idGestion ,tb.idTipoBeca ,count(c.idCarrera)
from gestion g  inner JOIN  tipoBeca tb 
on g.idGestion=tb.idGestion
inner join carrera c
on tb.idTipoBeca=c.idTipoBeca
inner join estudiante e
on c.idCarrera=e.idCarrera
group by c.idCarrera
having count(e.idEstudiante)>=20;


--  Dada una gestion, listar por departamento la cantidad de solicitudes.

SELECT  g.idGestion ,d.nombreDepartamento,count(s.idSolicitudes)  
from gestion g  inner JOIN  Departamento d
on g.idGestion=g.idDepartamento
inner join solicitud s 
on d.idDepartamento=s.idDepartamento
group by d.idDepartamento;