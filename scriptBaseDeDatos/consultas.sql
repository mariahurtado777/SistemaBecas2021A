--- 1. Dada una gestion y estudiante mostrar en que departamento y area trabaja asi como tambien 
 ---  los horarios en el cual trabaja.
select d.nombre as departamento ,a.nombre as area ,e.idPersona as estudiante,g.nombre as gestion,h.hora
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


select d.nombre as departamento ,a.nombre as area ,e.idPersona as estudiante,g.nombre as gestion,h.hora
from gestion g INNER JOIN becaInstitucional bi  
on g.idGestion = bi.idGestion
and g.idGestion = 1
inner join estudiante e 
on bi.idEstudiante= e.idEstudiante
and e.idEstudiante=1
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
  select e.idPersona as estudiante,g.nombre as gestion,sum(h.hora) as hora,p.precio
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
-------------------------------------------- seleccionar area dado un departamento------------------------------
SELECT  d.nombre, a.nombre
FROM departamento d inner join area a
on a.idDepartamento=d.idDepartamento
and d.idDepartamento=4;
---------------------------------------- sacar el personal de que departamento es ----------------------------------
SELECT  CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) AS nombreCompleto,d.nombre as departamento,a.nombre
FROM departamento d inner join personalDepartamento dp
on dp.idDepartamento = d.idDepartamento
INNER JOIN personal p
on dp.idPersonal=p.idPersonal
inner join area a
on a.idDepartamento=d.idDepartamento
and dp.idPersonal=3;

SELECT *,CONCAT_WS(' ',primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno) AS nombreUsuario,d.nombre as departamento 
FROM personal p inner join personalDepartamento dp
on dp.idDepartamento = d.idDepartamento
AND p.usuario=lalarcon
INNER join  departamento d
on dp.idDepartamento = d.idDepartamento;


SELECT MAX(bi.idBecaInstitucional) AS id, a.nombre as area
FROM area a INNER join becaInstitucional bi
on a.idArea =bi.idArea;

SELECT * FROM becainstitucional bi INNER JOIN area a 
 ON bi.idArea = a.idArea 
 WHERE idBecaInstitucional=MAX(bi.idBecaInstitucional);

SELECT a.nombre, FROM becainstitucional bi INNER JOIN area a  ON bi.idArea = a.idArea 
WHERE idBecaInstitucional = (SELECT MAX(idBecaInstitucional) as maxid FROM becainstitucional);


SELECT a.nombre ,g.nombre,p.precio
FROM becainstitucional bi INNER JOIN area a 
 ON bi.idArea = a.idArea 
 INNER join gestion g 
 on bi.idGestion=g.idGestion
 INNER JOIN precio p
 on bi.idPrecio=p.idPrecio
 WHERE idBecaInstitucional = (SELECT MAX(idBecaInstitucional) as maxid FROM becainstitucional);


 SELECT  bi.idBecaInstitucional,count(a.idArea) as area ,a.nombre, p.precio
  from area a INNER JOIN becaInstitucional bi
  ON a.idArea = bi.idArea
  INNER JOIN precio p
  ON p.idPrecio=bi.idPrecio
  WHERE bi.idBecaInstitucional NOT IN (SELECT idBecaInstitucional FROM asignacionBecaInstitucional)
  group by a.idArea
  having area>0;

SELECT  bi.idBecaInstitucional,a.nombre, p.precio
from area a INNER JOIN becaInstitucional bi
ON a.idArea = bi.idArea
INNER JOIN precio p
ON p.idPrecio=bi.idPrecio
WHERE bi.idBecaInstitucional NOT IN (SELECT idBecaInstitucional FROM asignacionBecaInstitucional);




 SELECT CONCAT_WS(' ',primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno) AS nombreCompleto,idPersonal
 FROM personal
 WHERE idPersonal = (SELECT MAX(idPersonal) as maxid FROM personal);




----------------------------------------------------------------------------------------------------------------------------------------------
$(function(){
            $('#adicional').on('click',function(){
               $('#tabla tbody tr:eq(0)').clone().removeClass('fila-fija').appendTo('#tabla');
            });
            $(document).on('click','.eliminar',function(){
                var parent = $(this).parents().get(0);
                $(parent).remove();
            });
        });
logica vista aumentar tabls

<table class="table" id="tabla">
                                       


                                        <tr class="fila-fija">
                                            <td>
                                                <select name="asesor[]" id="asesor" class="custom-select" placeholder="Asesor" required>
                                                    <option value="" selected disabled>Asesor</option>
                                                    <?php foreach($asesores as $asesor){?>
                                                        <option value="<?php echo $asesor["idPersonalTesis"]?>"><?php echo $asesor["nombreCompleto"]?></option>
                                                    <?php }?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="roles[]" id="roles" class="custom-select" required>
                                                    <op


<button type="button" id="adicional" name="adicional" class="btn btn-success">Nuevo Asesor +</button>


crear un servidor local en


select * from personal where activo=0;

--------------------------------------- busqueda estudiante
        SELECT  CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) AS nombreCompleto,e.ci,e.fechaNacimiento,
                                    IF(p.activo=1,'Si','No') AS activo, e.idEstudiante
                                    FROM rol r INNER JOIN estudiante e
                                    ON r.idRol = e.idrol
                                    WHERE e.primerNombre LIKE '%".$primerNombre."%'
                                    AND e.segundoNombre LIKE '%".$segundoNombre."%'
                                       AND e.apellidoPaterno LIKE '%".$apellidoPaterno."%'
                                    AND e.apellidoMaterno LIKE '%".$apellidoMaterno."%'
                                    AND e.ci LIKE '%".$ci."%'
                                    AND e.fechaNacimiento LIKE '%".$fechaNacimiento."%'
                                    AND e.activo = ".$activo."
                                    GROUP BY e.idEstudiante
                                    ORDER BY e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre;

-----------------------------------------------------------------------------------------------------------------------
SELECT *,CONCAT_WS(' ',primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno) 
AS nombreUsuario,idPersonal FROM personal 
where usuario=:usuario;


---ineer joins--
select e.primerNombre, g.idgestion, abi.idAsignacionBecaInstitucional
from estudiante e
inner join asignacionBecaInstitucional abi
on e.idEstudiante=abi.idEstudiante
inner join solicitudbecainstitucional sbi
on abi.idSolicitudBecaInstitucional=sbi.idSolicitudBecaInstitucional
inner join gestion g
on sbi.idGestion=g.idGestion;


