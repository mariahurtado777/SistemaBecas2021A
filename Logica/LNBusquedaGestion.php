<?php
    require_once("../Modelo/BusquedaGestion.php");
	//session_start();
	class LNBusquedaGestion
	{
		private $objGestion;
		public function __construct()
		{
            $this->objGestion = new BusquedaGestion();
		}

		public function gestionActiva()
		{   
			$datoGestion = $this->objGestion->gestionActiva();
			return $datoGestion;
		}
    }
?>