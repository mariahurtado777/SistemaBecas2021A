--- 1. Dada una gestion y estudiante mostrar en que departamento y area trabaja asi como tambien 
 ---  los horarios en el cual trabaja.
select d.nombre as departamento ,a.nombre as area ,e.primerNombre as estudiante,g.nombre as gestion,h.hora
from gestion g INNER JOIN becaInstitucional bi  
on g.idGestion = bi.idGestion
inner join estudiante e 
on bi.idEstudiante= e.idEstudiante
inner join area a 
on bi.idArea= a.idArea
inner join departamento d  
on a.idDepartamento= d.idDepartamento 
inner join horarioTrabajo ht 
on bi.idBecaInstitucional=ht.idBecaInstitucional 
inner join hora h 
on ht.idHora= h.idHora;

-- 2. Dada una gestion, estudiante, dos fechas (inicio y final). 
-- Mostrar un reporte donde muestre en que departamento y area trabaja, quien es su encargado,
-- su total de horas trabajadas por cada fecha y el total de horas 
-- que realizo dadas esas fechas asi como el total que se le pagara por el total de horas que trabajo. 


--3. Dada una gestion y estudiante mostrar un reporte donde liste por mes, la cantidad de horas que trabajo en cada mes como asi 
--   los montos que realizo cada mes.
  select e.primerNombre as estudiante,g.nombre as gestion,sum(h.hora) as hora,p.precio
from gestion g INNER JOIN becaInstitucional bi  
on g.idGestion = bi.idGestion
inner join precio p 
on p.idPrecio=bi.idPrecio
inner join estudiante e 
on bi.idEstudiante= e.idEstudiante
inner join horarioTrabajo ht 
on bi.idBecaInstitucional=ht.idBecaInstitucional 
inner join hora h 
on ht.idHora= h.idHora
group by e.idEstudiante;


-- 4. Dada una gestion, estudiante y mes: mostrar un reporte donde liste por semana las horas totales que 
-- trabajo, cantidad que realizo por semana.
  select e.primerNombre as estudiante,g.nombre as gestion,count(h.hora) as hora,p.precio
from gestion g INNER JOIN becaInstitucional bi  
on g.idGestion = bi.idGestion
inner join precio p 
on p.idPrecio=bi.idPrecio
inner join estudiante e 
on bi.idEstudiante= e.idEstudiante
inner join horarioTrabajo ht 
on bi.idBecaInstitucional=ht.idBecaInstitucional 
inner join hora h 
on ht.idHora= h.idHora;

----listar estudiantes por ci-----

select concat (primerNombre,' ', segundoNombre,' ', apellidoPaterno,' ', apellidoMaterno) as nombre 
from estudiante
where ci=123;

-----ver si hay un ingreso-----
select horaInicio
from registroEntradaSalida
where fecha= '06/05/2021' ;

---ver entradas y salidas en un dia-----
select horaInicio, horaFin 
from registroEntradaSalida
where fecha="06/05/2021";
----2 fechas----
select * 
from registroEntradaSalida
where fecha 
between "18/03/2021" and "06/05/2021";


----segunda opcion-----
select * 
from registroEntradaSalida
where fecha 
between "18/03/2021" and "06/05/2021";

select 
from
inner join estudiante e
on asignacionBecaInstitucional abi
