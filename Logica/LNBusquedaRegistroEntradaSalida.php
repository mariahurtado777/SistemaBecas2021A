<?php
    require_once("../Modelo/BusquedaRegistroEntradaSalida.php");
	//session_start();
	class LNBusquedaRegistroEntradaSalida
	{
		private $objBusquedaRegistroEntradaSalida;
		public function __construct()
		{
            $this->objBusquedaRegistroEntradaSalida = new BusquedaRegistroEntradaSalida();
		}

		public function verifyEntradaSalidaEstudianteFechaActual($idAsignacionBecaInstitucional,$fecha)
		{   
			$listaEntradaSalidaEstudiante = $this->objBusquedaRegistroEntradaSalida->verifyEntradaSalidaEstudianteFechaActual($idAsignacionBecaInstitucional,$fecha);
			return $listaEntradaSalidaEstudiante;
		}
    }
?>