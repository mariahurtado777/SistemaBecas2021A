<?php
    require ("../Logica/LNPersonalBusqueda.php");
    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.

    $usuario= new LNPersonalBusqueda();
     $listaRol=$usuario->logicaListaRol();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
   /* if (isset($_SESSION['usuario'])){
     $user=$_SESSION['usuario'];
     if(isset($_SESSION['contrasenia'])){
      $pass=$_SESSION['contrasenia']; */
?>

<html>
    <head>
        <title>Registro Personal</title>
    </head>
    <body >
        <h1>REGISTRO DE PERSONAL</h1>
        <br><br>

       <form action="../Logica/LNRegistrarPersonal.php" method="post" name="registrarPersonal">
        <h3>
        <table border = 1>
            <th>area</th>
                <td>
                
                    <select name="idRol" id="idRol">
                      <?php foreach ($listaRol as $lista): ?>
                      <option value="<?php echo($lista['idRol'])?>"><?php echo($lista['nombre'])?></option>
                    <?php endforeach ;

                ?>
                  </select>
                
               
                </td>
            </tr>
           <tr>
              <td>Primer Nombre</td><td><input type="text" name="primerNombre" pattern="[A-Za-z]+"placeholder="solo caracteres"size=30 minlength="3" maxlength="12"  required></td>
            </tr>
            <tr>
              <td>Segundo Nombre</td><td><input type="text" name="segundoNombre" placeholder="solo caracteres"minlength="3" maxlength="12" size=30></td>
            </tr>
            <tr>
              <td>Apellido Paterno</td><td><input type="text" name="apellidoPaterno"placeholder="solo caracteres"minlength="3" maxlength="12" size=30  required></td>
            </tr>
            <tr>
              <td>Apellido Materno</td><td><input type="text" name="apellidoMaterno"placeholder="solo caracteres"minlength="3" maxlength="12" size=30></td>
            </tr>
               <tr>
                 <td>CI</td><td><input type="text" name="ci" id="ci"placeholder="solo numeros y caracteres"size=30></td>
             </tr>
              <tr>
              <td>Activo</td><td><input type="radio" name="activo"size=30 value='S'>S<input type="radio" name="activo"size=30 value='N'>N
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