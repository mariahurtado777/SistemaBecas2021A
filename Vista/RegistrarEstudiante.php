<?php
    require ("../Logica/LNPersonalBusqueda.php");
    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (isset($_SESSION['usuario'])){
    $user=$_SESSION['usuario'];
    if(isset($_SESSION['contrasenia'])){
     $pass=$_SESSION['contrasenia'];

     $usuario= new LNPersonalBusqueda();
     $listaCarra=$usuario->logicaListaCarrera();
?>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Registro Estudiante</title>
    </head>
    <body >

        <h1>REGISTRO DE ESTUDIANTE</h1>
        <br><br>

       <form action="../Logica/LNRegistrarEstudiante.php" method="post" name="registrarEstudiante">
        <h3>
        <table border = 1>
        <th>Carrera</th>
                <td>
                
                    <select name="carrera" id="idCarrera">
                      <?php foreach ($listaCarra as $lista): ?>
                      <option value="<?php echo($lista['idCarrera'])?>"><?php echo($lista['nombre'])?></option>
                    <?php endforeach ;

                ?>
                  </select>
                
               
                </td>
            </tr>
            <tr>
                <th>Rol</th>
                <td>
                <select name="idRol" id="idRol">
                    <option value="3">Estudiante</option>
                </select>
                </td>
            </tr>
            <tr>
                 <td>Codigo Estudiante</td><td><input type="text" name="codigoEstudiante" id="codigoEstudiante"placeholder="solo numeros y caracteres"size=30></td>
             </tr>
             <tr>
                 <td>CI</td><td><input type="text" name="ci" id="ci"placeholder="solo numeros y caracteres"size=30></td>
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
            <td>Genero</td><td><input type="radio" name="genero"size=30 value='M' >M<input type="radio" name="genero"size=30 value='F'>F
            </td>
            </tr>

            <tr>
              <td>Fecha Nacimiento</td><td><input type="date" name="fechaNacimiento"size=30></td>
            </tr>
            <tr>
            <td>Activo</td><td><input type="radio" name="activo"size=30 value='S' >S<input type="radio" name="activo"size=30 value='N'>N
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
}}else{
  header('Location: salirEstudiante.php');//Aqui lo redireccionas al lugar que quieras.
    die() ;
    
     }
   ?>