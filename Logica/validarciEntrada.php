<?php
require_once("../Logica/LNPersonalBusqueda.php");
require_once("../Logica/LNBusquedaGestion.php");
$objLNEstudianteBusqueda = new LNPersonalBusqueda();
$objGestion = new LNGestionBusqueda();
$listaEstudiante = $objLNEstudianteBusqueda->buscarCIEstudiante($_REQUEST['ci']);
$gestionActiva = $objGestion->gestionActiva();
if($gestionActiva){
/*
gestion
solicitud beca institucional
asignacionbeca Institucional
estudiante

SELECT g.nombre, e.ci
FROM gestion g
INNER JOIN becaInstitucional sbi
on g.idGestion = 6 AND g.IdGestion= sbi.idGestion
INNER JOIN asignacionBecaInstitucional abi
ON sbi.idBecaInstitucional=abi.idBecaInstitucional
INNER JOIN estudiante e
ON abi.idEstudiante=e.idEstudiante and e.idEstudiante=


*/ 

}
?>