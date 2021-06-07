<?php
require_once("../Modelo/PersonalPersistencia.php");
    
    $objetoSolicitudPersistencia = new PersonalPersistencia();

    $exitoRegistro = $objetoSolicitudPersistencia->registrarSolicitud(
                                                        $_REQUEST['idGestion'],
                                                         $_REQUEST['idArea'],
                                                        $_REQUEST['idPrecio']
                                                       
                                                       
                                                        );
    if($exitoRegistro==1){
    	echo "exito registro";;
      
    }else{
      echo "error al registrar";
    }
   
?>

<br>
<?php

header('Location:../Vista/HorarioTrabajo.php')?>

