<?php
require_once("../Modelo/PersonalPersistencia.php");
    
$objetoPersonalPersistencia = new PersonalPersistencia();
var_dump($_POST);

$c=0;
foreach ($_POST['idBecaInstitucional'] as $dia ){
    $exitoRegistro = $objetoPersonalPersistencia->registrarHorario(
                                                    $_REQUEST['idBecaInstitucional'],
                                                    $_REQUEST['dia'],
                                                    $_REQUEST['HoraInicio'],
                                                    $_REQUEST['HoraFin']
                                                
                                                
                                                    );
if($exitoRegistro==1){
echo "exito registro";;

}else{
echo "error al registrar";
}
    $c++;

}
?>