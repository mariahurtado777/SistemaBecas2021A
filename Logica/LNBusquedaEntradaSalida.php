<?php
require_once("../Modelo/RegistroEntradaSalidaPersistencia.php");
class LNBusquedaEntradaSalida{
    private $objBES;
    function __construct()
    {
        $this-> objBES=  new RegistrarEntradaSalidaPersistencia();
    }


    public function verificarFechaEntradaSalida($idAsignacionBecaInstitucional, $fechaActual){
        $validado= $this->objBES->MDLverificarFechaEntradaSalida($idAsignacionBecaInstitucional, $fechaActual);

			return $validado;
    }
}

?>