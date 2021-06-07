<?php
require_once("../Modelo/PersonalPersistencia.php");
$RegistroEntrada=new PersonalPersistencia();
var_dump($_POST);
$registroExitoso=$RegistroEntrada->RegistrarInicio(
                                            $_REQUEST['idAsignacionBecaInstitucional'],
                                            $_REQUEST['fecha'],
                                             $_REQUEST['HoraInicio']);

if($registroExitoso==1){
        echo "Se registro la entrada ";
        //var_dump($_REQUEST['CI']);
        var_dump($_REQUEST['ídAsignacionBecaInstitucional']);
        var_dump($_REQUEST['HoraInicio']);
        var_dump($_REQUEST['fecha']);
    }else{
        echo "Error al registrar entrada";
    }