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
    $listaArea=$usuario->logicaListaArea();
    $listaGestion=$usuario->logicaListaGestion();
    $listaPrecio=$usuario->logicaListaPrecio();
?>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Solicitud Personal</title>
    </head>
    <body >
        <h1>Solicitud Personal</h1>
        <br><br>

       <form action="../Logica/LNRegistrarSolicitud.php" method="post" name="registrarSolicitud">
        <h3>
        <table border = 1>
        <tr>
               
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
          <tr>
               
                <th>area</th>
                <td>
                
                    <select name="idArea" id="idArea">
                      <?php foreach ($listaArea as $lista): ?>
                      <option value="<?php echo($lista['idArea'])?>"><?php echo($lista['nombre'])?></option>
                    <?php endforeach ;

                ?>
                  </select>
                
               
                </td>
            </tr>
             <tr>
               
                <th>Precio</th>
                <td>
               <select name="idPrecio" id="idPrecio">
                      <?php foreach ($listaPrecio as $lista3): ?>
                      <option value="<?php echo($lista3['idPrecio'])?>"><?php echo($lista3['precio'])?></option>
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