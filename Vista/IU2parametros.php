<?php
require_once("../Logica/LNPersonalBusqueda.php");
$objLNPersonalBusqueda = new LNPersonalBusqueda();
//echo "Gestion: ".$_REQUEST['idGestion'];
$listaFechas = $objLNPersonalBusqueda->ParametrosFechas($_REQUEST['Inicio'],$_REQUEST['Fin']);
var_dump($listaFechas);
var_dump($_REQUEST['Inicio']);
var_dump($_REQUEST['Fin']);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Reporte 2</title>
</head>
<body>
<h1>Reporte 2</h1>
<table>
  <tr>
    <th><h3 title = "Volver al inicio"> <a href="../index.html">Inicio</a></h3></th>
  <tr>
</table>

<table border = 1>
  <tr>
    <th>Gestion</th>
    <th>Cantidad Estudiantes</th>
  </tr>

  <?php 
     //foreach($listaFechas as $estudiante){
   ?>
  <tr>
  	<td><?php  //echo $estudiante['gestion']; ?></td>
  	<td><?php // echo $estudiante['cantEstudiantes']; ?></td>
  </tr>

  <?php //} ?>
</table>

</body>
</html>

