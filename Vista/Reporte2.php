<?php
require_once("../Logica/LNPersonalBusqueda.php");
$objLNPersonalBusqueda = new LNPersonalBusqueda();
//echo "Gestion: ".$_REQUEST['idGestion'];
$listaEstudiantes = $objLNPersonalBusqueda->listaReporte2($_REQUEST['idGestion']);
//var_dump($listaEstudiantes);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Reporte 1</title>
</head>
<body>
<h1>Reporte 1</h1>
<table>
  <tr>
    <th><h3 title = "Volver al inicio"> <a href="../index.html">Inicio</a></h3></th>
  <tr>
</table>

<table border = 1>
  <tr>
    <th>Gestion</th>
    <th>Tipo Beca</th>
    <th>Cantidad Estudiantes</th>
  </tr>

  <?php 
     foreach($listaEstudiantes as $estudiante){
   ?>
  <tr>
  	<td><?php  echo $estudiante['gestion']; ?></td>
  	<td><?php  echo $estudiante['tipoBeca']; ?></td>
    <td><?php  echo $estudiante['estudiante']; ?></td>
  </tr>

  <?php } ?>
</table>

</body>
</html>

