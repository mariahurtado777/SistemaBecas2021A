<?php
	require_once("../Modelo/Conexion.php");
	class BusquedaGestion
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}
        public function gestionActiva()
        {   $datoGestion = "
            select * from gestion where activo=1;
            ";
            $cmd = $this->conexion->prepare($datoGestion);
            $cmd->execute();
            $gestion = $cmd->fetch();
            return $gestion;
        }
        public function verificarEstudianteGestion($idGestion,$idEstudiante){
            $sql="
                    SELECT d.nombre Departamento, a.nombre Area,abi.idAsignacionBecaInstitucional,
                    abi.idSolicitudBecaInstitucional, 
                    CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante, 
                    e.idEstudiante,e.ci
                    FROM gestion g
                    INNER JOIN solicitudBecaInstitucional sbi
                    ON g.idGestion = sbi.idGestion
                    AND g.idGestion = :idGestion
                    INNER JOIN asignacionBecaInstitucional abi 
                    ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
                    INNER JOIN estudiante e
                    ON abi.idEstudiante = e.idEstudiante 
                    AND e.idEstudiante = :idEstudiante
                    INNER JOIN area a 
                    ON sbi.idArea = a.idArea 
                    INNER JOIN departamento d 
                    ON a.idDepartamento = d.idDepartamento;
            ";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':idGestion',$idGestion);
            $cmd->bindParam(':idEstudiante',$idEstudiante);
            $cmd->execute();
            $estudiante = $cmd->fetch();  
            return $estudiante;
        }//end function
        
    }
    ?>