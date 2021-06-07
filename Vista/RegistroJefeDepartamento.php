<?php
    require ("../Logica/LNPersonalBusqueda.php");
    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.

    $usuario= new LNPersonalBusqueda();
     $listaDepartamento=$usuario->logicaListaDepartamento();
     $listaPersonalU=$usuario->LogicaListaPersonalU();
     $listaGestion=$usuario->LogicaListaGestion();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
   /* if (isset($_SESSION['usuario'])){
     $user=$_SESSION['usuario'];
     if(isset($_SESSION['contrasenia'])){
      $pass=$_SESSION['contrasenia']; */
?>

<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Asignar Departamento</title>
    </head>
    <body >
        <h1>AsignarDepartamento </h1>
        <br><br>

       <form action="../Logica/LNRegistrarPersonalDepartamento.php" method="post" name="registrarPersonalDepartamento">
        <h3>
        <table border = 1>
            <th>Departamento</th>
                <td>
                    <select name="idDepartamento" id="idDepartamento">
                      <?php foreach ($listaDepartamento as $lista): ?>
                      <option value="<?php echo($lista['idDepartamento'])?>"><?php echo($lista['nombre'])?></option>
                    <?php endforeach ;

                ?>
                  </select>
                </td>
            </tr>
            <th>Personal</th>
                <td>
                    <select name="idPersonal" id="idPersonal">
                    <option value="<?php echo($listaPersonalU['idPersonal'])?>"><?php echo($listaPersonalU['nombreCompleto'])?></option>  
                  </select>
                </td>
            </tr>
            <th>Gestion</th>
                <td>
                    <select name="idGestion" id="idGestion">
                      <?php foreach ($listaGestion as $lista): ?>
                      <option value="<?php echo($lista['idGestion'])?>"><?php echo($lista['nombre'])?></option>
                    <?php endforeach ;

                ?>
                  </select>
                </td>
            </tr>
        </table>
        </h3>
        
        <input type = "submit" value = "Registrar">
        <input type = "reset" value = "Cancelar"> 
        </form>
        <script>
            
        </script>
    </body>
</html>
<?php
/*}}else{
  header('Location: salirPersonal.php');//Aqui lo redireccionas al lugar que quieras.
    die() ;
    
    }*/
   ?>