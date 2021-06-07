<?php
	require_once("../Modelo/Conexion.php");
	class BusquedaRegistroEntradaSalida
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}
        public function verifyEntradaSalidaEstudianteFechaActual($idAsignacionBecaInstitucional,$fecha)
        {   $sql = "
                    SELECT idAsignacionBecaInstitucional,fecha,horaInicio,horaFin,totalHora 
                    FROM registroEntradaSalida
                    WHERE idAsignacionBecaInstitucional = :idAsignacionBecaInstitucional 
                    AND fecha = :fecha
                    AND horaFin is NULL;
                   ";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':idAsignacionBecaInstitucional', $idAsignacionBecaInstitucional);
            $cmd->bindParam(':fecha', $fecha);
            $cmd->execute();
            $registroEntradaSalida = $cmd->fetchAll();
            return $registroEntradaSalida;
        }
    }//end class    
?>