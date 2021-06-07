<?php
require_once "../Logica/LNPersonalBusqueda.php";
require_once "../Logica/LNBusquedaGestion.php";
require_once "../Logica/LNBusquedaAsignacionBecaInstitucional.php";
require_once "../Logica/LNBusquedaRegistroEntradaSalida.php";
require_once "../Logica/LNBusquedaEntradaSalida.php";
require_once "../Logica/LNRegistroEntradaSalidaPersistencia.php";

if(!empty($_REQUEST['ci'])){
    //echo "Ci: ".$_REQUEST['ci'];
    $objLNEstudianteBusqueda = new LNPersonalBusqueda();
    $objGestion = new LNBusquedaGestion();

    $estudiante = $objLNEstudianteBusqueda->buscarCIEstudiante($_REQUEST['ci']);
    $gestionActiva = $objGestion->gestionActiva();

    $fechaActual = date("Y-m-d");
    $horaActual = time();
        //$DateAndTime = date('m-d-Y h:i:s a', time());
        //echo $horaActual;
        //echo $fechaActual;
        //var_dump($_REQUEST['ci']);
        //si hay dato del estudiante
        //var_dump($estudiante);
        //var_dump($gestionActiva);
        //var_dump($existeEstudianteGestionActual);
        //echo $DateAndTime;
        if ($estudiante) {
        // var_dump($estudiante);
            $objBABI = new LNBusquedaAsignacionBecaInstitucional();
            $existeEstudianteGestionActual = $objBABI->buscarEstudianteGestion($gestionActiva['idGestion'], $estudiante['idEstudiante']);
            if ($existeEstudianteGestionActual) {
                //echo "llego aqui";
            // var_dump($existeEstudianteGestionActual);
                //se necesita verificar si el estudiante ingreso en la fecha actual

                $objBES = new LNBusquedaEntradaSalida();
                $estudianteMarcoFechaActual = $objBES->verificarFechaEntradaSalida($existeEstudianteGestionActual['idAsignacionBecaInstitucional'], $fechaActual);
                //si hay datos, entonces quiere decir que el estudiante ya marco en la fecha actual.
                //pero todavia no se sabe si marco:
                //1. Entrada y no salida
                //2. Entrada y salida
                var_dump($estudianteMarcoFechaActual);
                //echo "llega";
                if ($estudianteMarcoFechaActual) {
                    //var_dump($existeEstudianteGestionActual);
                    echo "llega";
                    if ($estudianteMarcoFechaActual['horaInicio'] != null && $estudianteMarcoFechaActual['horaFin'] == null) {
                        //echo "llega";
                        //ACTUALIZAR salida

                    } //else{
                    //if($estudianteMarcoFechaActual[$horainicio] != NULL && $estudianteMarcoFechaActual[$horaFin] != NULL ){
                    //ya esta marcado

                    // }
                    //}
                    else {
                        //quiere decir que recien marcar en la fecha y se marcara la primera entrada
                        $objRES = new LNRegistroEntradaSalidaPersistencia();
                        $exitoRegistro = $objRES->registroEntrada($existeEstudianteGestionActual['idAsignacionBecaInstitucional'], $fechaActual, $horaActual);
                    }
                } else {
                    echo "Usuario no trabaja en la gestion actual";
                }

            } else {
                echo "usario invalido";
            }

        /*
        gestion
        solicitud beca institucional
        asignacionbeca Institucional
        estudiante

        Esta consulta debe ir: LNBusquedaAsignacionBecaInstitucional.(MDBusquedaAsignacionBecaInstitucional.())
        -- buscarEstudianteGestion($idGestio,$idEstudiante)
        SELECT abd.idAsignacionBecaInstitucional
        FROM gestion g
        INNER JOIN becaInstitucional sbi
        ON g.idGestion = 6
        AND g.IdGestion= sbi.idGestion
        INNER JOIN asignacionBecaInstitucional abi
        ON sbi.idBecaInstitucional=abi.idBecaInstitucional
        INNER JOIN estudiante e
        ON abi.idEstudiante=e.idEstudiante and e.idEstudiante= ??debe vebir el Id del Estudiante

        *//*
        BusquedaEntradaSalida
        LNBusquedaEntradaSalida

        Deben tener una consulta donde se verifique si el estudiante ingreso en la fecha actual.
        Para ello consulta en  la tabla RegistroEntradaSalida
        metodo: verificarFechaEntradaSalida
        SELECT *
        FROM registroEntradaSalida
        where idAsignacionEntradaSalida  = ??llega el id
        and fecha =  ???fechaActual

        */

    }
}else{
    echo "Ci no puede ser vacio";
}//end else


