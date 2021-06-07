<?php
session_start();
require_once("../Logica/LNListaPersonal.php");
$objLNListaPersonal = new LNListaPersonal();

$estado = $_REQUEST['activo'];
if($estado=="todo"){
    $estado="1 or p.activo = 0";
    $activo=$estado;
}else{
    $activo=$estado;
}
/*require_once("../Logica/LNListaPersonal.php");
$objLNListaPersonal = new LNListaPersonal();
$datosPersonal = $objLNListaPersonal->datoPersonal($_REQUEST['idPersonal']);
var_dump ($datosPersonal);*/
$Lista = $objLNListaPersonal->busquedaPersonal($_REQUEST['primerNombre'],$_REQUEST['segundoNombre'],$_REQUEST['apellidoPaterno'],$_REQUEST['apellidoMaterno'],$_REQUEST['ci'],$activo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/estilos1.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Personal</title>
</head>
<body>
      <head>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Lista Personal</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="../ListaEstudiante.php">Estudiante <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../ListaPersonal.php">Personal</a>
      </li>
    </ul>
    
  </div>
</nav>
  </head>
        <form action="ListaPersonal.php" method="post">
            Primer Nombre: <input type="text" name="primerNombre" id="primerNombre">
            Segundo Nombre: <input type="text" name="segundoNombre" id="segundoNombre">
            Apellido Paterno: <input type="text" name="apellidoPaterno" id="apellidoPaterno">
            Apellido Materno: <input type="text" name="apellidoMaterno" id="apellidoMaterno"><br><br>
            Ci: <input type="text" name="ci" id="ci"><br><br>
            Activos <input type="radio" name="activo" value="1">
            Inactivos <input type="radio" name="activo" value="0">
            Todos <input type="radio" name="activo" value="todo" checked><br><br>
            <input type="submit" name="buscar" id="buscar" value="BUSCAR">
            <br>
            <br>
           
        </form>
    </div>
    <a href="SolicitudPersonal.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Solicitud</a>
    <div class="main-boxes">
        <div class="main-header">
            <h2>Lista Personal</h2>
        </div>
        <?php if($Lista){?>
        <div class="container"> 
            <table border="1">
                <tr>
                    <th>Nombre</th>
                    <th>Ci</th>
                    <th>Activo</th>
                </tr>
                <?php foreach($Lista as $Listas){?>
                <tr>
                    <td ><?php echo $Listas['nombreCompleto']?></td>
                    <td ><?php echo $Listas['ci']?></td>
                    <td><?php echo $Listas['activo']?></td>
                </tr>
                <?php }?>
            </table>
        </div>

        <?php }?>  
    </div>
</body>
</body>
</html>