<?php
require_once("../Modelo/RegistroEntradaSalidaPersistencia.php");
class LNRegistroEntradaSalidaPersistencia{
    private $objRegistroEntradaSalidaPersistencia;
    function __construct()
    {
        $this->objRegistroEntradaSalidaPersistencia =  new RegistroEntradaSalidaPersistencia();
    }
    public function registroEntrada($idAsignacionBecaInstitucional,$fecha,$horaInicio) {
        return $this->objRegistroEntradaSalidaPersistencia->registroEntrada($idAsignacionBecaInstitucional,$fecha,$horaInicio);
    }

    public function registroSalida($idAsignacionBecaInstitucional,$horaFin,$horaInicio){
        return $this->objRegistroEntradaSalidaPersistencia->registroSalida($idAsignacionBecaInstitucional,$horaFin,$horaInicio);
    }
}//end class
?>