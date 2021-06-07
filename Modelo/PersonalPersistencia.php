<?php
	require_once("../Modelo/Conexion.php");
	class personalPersistencia
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}

	    public function registrarEstudiante($idCarrera,$idRol,$codigoEstudiante,$ci,$primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno,$genero,$fechaNacimiento,$usuario,$contrasenia,$activo) 
         {
        $sqlRegistrarEstudiante= " 
                                INSERT INTO estudiante(idCarrera,idRol,codigoEstudiante,ci,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,genero,fechaNacimiento,usuario,contrasenia,activo)  
                                VALUES (:idCarrera,:idRol,:codigoEstudiante,:ci,:primerNombre,:segundoNombre,:apellidoPaterno,:apellidoMaterno,:genero,:fechaNacimiento,
                                :usuario,:contrasenia,:activo);
                              ";    

        try{
                $cmd = $this->conexion->prepare($sqlRegistrarEstudiante);
                 $cmd->bindParam(':idCarrera', $idRol);
                $cmd->bindParam(':idRol', $idRol);
                 $cmd->bindParam(':codigoEstudiante', $codigoEstudiante);
                $cmd->bindParam(':ci', $ci);
                $cmd->bindParam(':primerNombre', $primerNombre);
                $cmd->bindParam(':segundoNombre', $segundoNombre);
                $cmd->bindParam(':apellidoPaterno', $apellidoPaterno);
                $cmd->bindParam(':apellidoMaterno', $apellidoMaterno);
                 $cmd->bindParam(':genero', $genero);
                $cmd->bindParam(':fechaNacimiento', $fechaNacimiento);
                $cmd->bindParam(':usuario', $usuario);
                $cmd->bindParam(':contrasenia', $contrasenia);
                 $cmd->bindParam(':activo', $activo);
                if($cmd->execute()){
                    return 1;   
                }else{
                    return 0;
                }
        }catch(PDOException $e){
            echo 'ERROR: No se logro realizar la nueva inserción - '.$e->getMessage();
            exit();
            return 0;
        }
     }//end function
        public function registrarPersonal($idRol,$primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno,$ci,$usuario,$contrasenia,$activo) 
         {
        $sqlRegistrarPersonal= " 
                                INSERT INTO personal(idRol,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,ci,usuario,contrasenia,activo)  
                                VALUES (:idRol,:primerNombre,:segundoNombre,:apellidoPaterno,:apellidoMaterno,:ci,:usuario,
                                :contrasenia,:activo);
                              ";    

        try{
                $cmd = $this->conexion->prepare($sqlRegistrarPersonal);
                $cmd->bindParam(':idRol', $idRol);
                $cmd->bindParam(':primerNombre', $primerNombre);
                $cmd->bindParam(':segundoNombre', $segundoNombre);
                $cmd->bindParam(':apellidoPaterno', $apellidoPaterno);
                $cmd->bindParam(':apellidoMaterno', $apellidoMaterno);
                $cmd->bindParam(':ci', $ci);
                $cmd->bindParam(':usuario', $usuario);
                $cmd->bindParam(':contrasenia', $contrasenia);
                 $cmd->bindParam(':activo', $activo);
                if($cmd->execute()){
                    return 1;   
                }else{
                    return 0;
                }
        }catch(PDOException $e){
            echo 'ERROR: No se logro realizar la nueva inserción - '.$e->getMessage();
            exit();
            return 0;
        }
        }//end function
        public function registrarPersonalDepartamento($idDepartamento,$idPersonal,$idGestion) 
         {
        $sqlRegistrarPersonalDepartamento= " 
                                INSERT INTO personalDepartamento(idDepartamento,idPersonal,idGestion)  
                                VALUES(:idDepartamento,:idPersonal,:idGestion);
                              ";    

        try{
                $cmd = $this->conexion->prepare($sqlRegistrarPersonalDepartamento);
                $cmd->bindParam(':idDepartamento', $idGestion);
                $cmd->bindParam(':idPersonal', $idPersonal);
                $cmd->bindParam(':idGestion', $idGestion);
                if($cmd->execute()){
                    return 1;   
                }else{
                    return 0;
                }
        }catch(PDOException $e){
            echo 'ERROR: No se logro realizar la nueva inserción - '.$e->getMessage();
            exit();
            return 0;
        }
        }//end function

        public function registrarSolicitud($idGestion,$idArea,$idPrecio) 
         {
        $sqlRegistrarSolicitud= " 
                                INSERT INTO becaInstitucional(idGestion,idArea,idPrecio)  
                                VALUES(:idGestion,:idArea,:idPrecio);
                              ";    

        try{
                $cmd = $this->conexion->prepare($sqlRegistrarSolicitud);
                $cmd->bindParam(':idGestion', $idGestion);
                $cmd->bindParam(':idArea', $idArea);
                $cmd->bindParam(':idPrecio', $idPrecio);
                if($cmd->execute()){
                    return 1;   
                }else{
                    return 0;
                }
        }catch(PDOException $e){
            echo 'ERROR: No se logro realizar la nueva inserción - '.$e->getMessage();
            exit();
            return 0;
        }
     }//end function

     public function AsignarBecaInstitucional($idBecaInstitucional,$idEstudiante) 
         {
        $sqlAsignarBecaInstitucional= " 
                                INSERT INTO asignacionBecaInstitucional (idBecaInstitucional,idEstudiante)  
                                VALUES(:idBecaInstitucional,:idEstudiante);
                              ";    

        try{
                $cmd = $this->conexion->prepare($sqlAsignarBecaInstitucional);
                $cmd->bindParam(':idBecaInstitucional', $idBecaInstitucional);
                $cmd->bindParam(':idEstudiante', $idEstudiante);
                if($cmd->execute()){
                    return 1;   
                }else{
                    return 0;
                }
        }catch(PDOException $e){
            echo 'ERROR: No se logro realizar la nueva inserción - '.$e->getMessage();
            exit();
            return 0;
        }
     }//end function
        public function registrarHorario($idBecaInstitucional,$idDia,$idHoraInicio,$idHoraFin) 
         {
        $sqlRegistrarHorario= " 
                                INSERT INTO horarioTrabajo (idBecaInstitucional,idDia,idHoraInicio,idHoraFin)  
                                VALUES(:idBecaInstitucional,:idDia,:idHoraInicio,:idHoraFin);
                              ";    

        try{
                $cmd = $this->conexion->prepare($sqlRegistrarHorario);
                $cmd->bindParam(':idBecaInstitucional', $idBecaInstitucional[]);
                $cmd->bindParam(':idDia', $idDia[]);
                $cmd->bindParam(':idHoraInicio', $idHoraInicio[]);
                $cmd->bindParam(':idHoraFin', $idHoraFin[]);
                if($cmd->execute()){
                    return 1;   
                }else{
                    return 0;
                }
        }catch(PDOException $e){
            echo 'ERROR: No se logro realizar la nueva inserción - '.$e->getMessage();
            exit();
            return 0;
        }
     }//end function

        public function RegistrarInicio($idAsignacionBecaInstitucional,$fecha,$HoraInicio)
        {
            $sqlRegistrarHoraInicio="INSERT INTO registroentradasalida
                                    values(:idAsignacionBecaInstitucional:fecha,:HoraInicio, null, null);
                                    ";
        
            try{
                $cmd = $this->conexion->prepare($sqlRegistrarHoraInicio);
                $cmd->bindParam(':idAsignacionBecaInstitucional', $idAsignacionBecaInstitucional);
                $cmd->bindParam(':HoraInicio', $HoraInicio);
                $cmd->bindParam(':fecha', $fecha);
                if($cmd->execute()){
                    return 1;   
                }else{
                    return 0;
                }
        }catch(PDOException $e){
            echo 'ERROR: No se logro realizar la nueva inserción - '.$e->getMessage();
            exit();
            return 0;
        }
     }

    }
?>

