<?php
require_once("../Modelo/BusquedaGestion.php");
class LNBusquedaAsignacionBecaInstitucional{
    function __construct()
    {
        $this->objBusquedaGestion =  new BusquedaGestion();
    }

    public function buscarEstudianteGestion($idGestion,$idEstudiante){
        return $this->objBusquedaGestion->verificarEstudianteGestion($idGestion,$idEstudiante);
    }
}

?>