<?php
require_once("../Modelo/PersonalPersistencia.php");
    
    $objetoRegistrarDepartamentoPersonal = new PersonalPersistencia();
    $dep=$_REQUEST['idDepartamento'];
    $personal=$_REQUEST['idPersonal'];
    $gestion=$_REQUEST["idGestion"];
    echo $dep;
    echo $personal;
    echo $gestion;
    $exitoRegistro = $objetoRegistrarDepartamentoPersonal->registrarPersonalDepartamento(
                                                        $_REQUEST['idDepartamento'],
                                                         $_REQUEST['idPersonal'],
                                                        $_REQUEST['idGestion']
                                                       
                                                       
                                                        );
    if($exitoRegistro==1){
    	echo "exito registro";;
      
    }else{
      echo "error al registrar";
    }
   
?>

<br>
<?php

//header('Location:../Vista/HorarioTrabajo.php')?>