<?php
    require ("../Logica/LNPersonalBusqueda.php");
    $usuario= new LNPersonalBusqueda();

    //header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    //session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    //if (isset($_SESSION['usuario'])){
    //$user=$_SESSION['usuario'];
    //if(isset($_SESSION['contrasenia'])){
      //$pass=$_SESSION['contrasenia'];
      $listaEstudiante=$usuario->logicaListaEstudiante();
      $listaBecaInstitucional=$usuario->LogicaListaBecaInstitucional();
?>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Asignacion BecaInstitucional</title>
    </head>
    <body >
        <h1>Asignacion BecaInstitucional</h1>
        <br><br>

       <form action="../Logica/LNAsignarBecaInstitucional.php" method="post" name="asignarBecaInstitucional">
        <h3>
        <table border = 1>
          <tr>
               
                <th>Estudiante</th>
                <td>
                
                    <select name="estudiante" id="idEstudiante">
                      <?php foreach ($listaEstudiante as $lista): ?>
                      <option value="<?php echo($lista['idEstudiante'])?>"><?php echo($lista['nombreCompleto'])?></option>
                    <?php endforeach ;

                ?>
                  </select>
                
                        
                </td>
            </tr>
             <tr>
               
                <th>BecaInstitucional</th>
                <td>
               <select name="becaInstitucional" id="idBecaInstitucional">
                      <?php foreach ($listaBecaInstitucional as $lista3): ?>
                      <option value="<?php echo($lista3['idBecaInstitucional'])?>"><?php echo($lista3['area'])?>         <?php echo($lista3['precio'])?>Bs</option>
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
//}}else{
 // header('Location: salirEstudiante.php');//Aqui lo redireccionas al lugar que quieras.
    //die() ;
    
    // }
   ?>