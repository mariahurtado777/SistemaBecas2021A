<?php
require_once "../Logica/LNPersonalBusqueda.php";
require_once "../Logica/LNBusquedaGestion.php";
require_once "../Logica/LNBusquedaAsignacionBecaInstitucional.php";
require_once "../Logica/LNBusquedaRegistroEntradaSalida.php";
require_once "../Logica/LNRegistroEntradaSalidaPersistencia.php";
//ci no debe llegar vacio
if(!empty($_REQUEST['ci'])){
    //echo "Ci: ".$_REQUEST['ci'];
    $objLNEstudianteBusqueda = new LNPersonalBusqueda();
    $objLNGestion = new LNBusquedaGestion();
    $estudiante = $objLNEstudianteBusqueda->buscarCIEstudiante($_REQUEST['ci']);
    $gestionActiva = $objLNGestion->gestionActiva();
    //existe el estudiante
    if($estudiante){
        //var_dump($estudiante);
        $dtz = new DateTimeZone("America/Caracas");
        $dt = new DateTime("now", $dtz);
        //Buscar: PHP como obtener hora para bolivia 
        //https://www.php.net/manual/es/timezones.america.php
        //Stores time as "2021-04-04T13:35:48":
        //$currentTime = $dt->format("Y-m-d") . "T" . $dt->format("H:i:s");
        //echo"Unidito fecha y hora:   ".$currentTime;
        //echo "fechita:  ".$dt->format("Y-m-d");
        //echo "horita:  ".$dt->format("H:i:s");
        $fechaActual = $dt->format("Y-m-d");
        $horaActual = $dt->format("H:i:s");
        //verificar si estudiante becado trabaja en la gestion actual.
        $objLNBABI = new LNBusquedaAsignacionBecaInstitucional();
        $existeEstudianteGestionActual = $objLNBABI->buscarEstudianteGestion($gestionActiva['idGestion'], $estudiante['idEstudiante']);
        if ($existeEstudianteGestionActual) {
            //var_dump($existeEstudianteGestionActual);
            //Se obtiene el valor de "idAsignacionBecaInstitucional" para verificar si el estudiante ingreso en la fecha actual
            $idAsignacionBecaInstitucional = $existeEstudianteGestionActual['idAsignacionBecaInstitucional'];
            $objLNBRES = new LNBusquedaRegistroEntradaSalida();
            $estudianteMarcoFecha = $objLNBRES->verifyEntradaSalidaEstudianteFechaActual($idAsignacionBecaInstitucional,$fechaActual);
            $objLNRES = new LNRegistroEntradaSalidaPersistencia();
            //si hay datos, entonces quiere decir que el estudiante ya marco en la fecha actual.
            if($estudianteMarcoFecha){
                //var_dump($estudianteMarcoFecha);
                foreach($estudianteMarcoFecha as $registro){    
                    if(is_null($registro['horaFin'])){
                                            //registroSalida($idAsignacionBecaInstitucional,$horaFin,$horaInicio)
                        $registrado = $objLNRES->registroSalida($idAsignacionBecaInstitucional,$horaActual,$registro['horaInicio']);
                        if($registrado>0){
                            echo "Se actualizo de manera correcta la salida";
                        }else{
                            echo "Error al actualizar la hora inicio";
                        }
                    }
                }
            }//estudiante
            else{
                //NO registro nada en esta fecha. Se registra la fecha y hora de entrada
                //echo "Marcara la hora inicio:  <br>";
                $registrado = $objLNRES->registroEntrada($idAsignacionBecaInstitucional,$fechaActual,$horaActual);
                echo "Se registra la entrada correctamente";
            }
        }else{
            echo "Usuario no trabaja en la gestion actual";
        }//end else
    }else{//ci estudiante no existe
        echo "Usuario Invalido";
    }
}else{//opuesto empty
    echo "Ci no puede ser vacio";
}//end else


