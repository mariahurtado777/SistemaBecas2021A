<?php
require_once("../Modelo/PersonalBusqueda.php");
$usuario= new PersonalBusqueda();
session_start();
if($user=$_POST['usuario']==null||$pass=$_POST['contrasenia']==null){
	header('Location: ../index.php');
}
else{
$user=$_POST['usuario'];
$pass=$_POST['contrasenia'];
$_SESSION['usuario']=$user;
$_SESSION['contrasenia']=$pass;
$datosPersonal1=$usuario->datosPersonal($user);

$existeUsuario=$usuario->verificarUsuarioPersonal($_SESSION['usuario']);
$existeContrasenia=$usuario->verificarContraseniaPersonal($_SESSION['contrasenia']);
$datosUsuario=$usuario->rolPersonal($_SESSION['usuario']);

if($existeUsuario){
	//echo "entro";
	if($user==$datosUsuario['usuario']){
		if(password_verify($pass,$datosPersonal1['contrasenia'])){
			
?>
			<!DOCTYPE html>
			<html>
			<head>
				<title></title>
			</head>
			<body>
				<?php
					$opc=$datosUsuario['idRol'];
					switch ($opc) {
						case 1:
				?>			
				 		
						 <script>
							window.onload=function(){
							// Una vez cargada la página, el formulario se enviara automáticamente.
							document.forms["miformulario"].submit();
						}
					</script>
 					<div class="sub-container">
                        <div class="sub-header"><h1>Bienvenido <br><br><?php echo $datosUsuario['nombreUsuario']?></h1><br></div>
                                    <form action="../Vista/JefeGestionTalentoHumano.php" method="post" name="miformulario">
                                    <label for="user" name="user"></label>
                                    <input type="hidden" name="user" value="<?php echo $datosUsuario['idPersonal']?>"><br>
                                  	<div class="button">
                                	<input type="submit" value="Continuar">
                            </div> 
                     				</form>
                        </div>
					
				<?php
						break;

						case 2:
				?>
					
							
					<script>
							window.onload=function(){
							// Una vez cargada la página, el formulario se enviara automáticamente.
							document.forms["miformulario"].submit();
						}
					</script>
 					<div class="sub-container">
                        <div class="sub-header"><h1>Bienvenido <br><br><?php echo $datosUsuario['nombreUsuario']?></h1><br></div>
                                    <form action="../Vista/jefeDepartamento.php" method="post" name="miformulario">
                                    <label for="user" name="user"></label>
                                    <input type="hidden" name="user" value="<?php echo $datosUsuario['idPersonal']?>"><br>
                                  	<div class="button">
                                	<input type="submit" value="Continuar">
                            </div> 
                     				</form>
                        </div>
				<?php
						
							break;
						case 4:
				?>
						<script>
							window.onload=function(){
							// Una vez cargada la página, el formulario se enviara automáticamente.
							document.forms["miformulario"].submit();
						}
					</script>
 					<div class="sub-container">
                        <div class="sub-header"><h1>Bienvenido <br><br><?php echo $datosUsuario['nombreUsuario']?></h1><br></div>
                                    <form action="../Vista/encargadoFinanza.php" method="post" name="miformulario">
                                    <label for="user" name="user"></label>
                                    <input type="hidden" name="user" value="<?php echo $datosUsuario['idPersonal']?>"><br>
                                  	<div class="button">
                                	<input type="submit" value="Continuar">
                            </div> 
                     				</form>
                        </div>
				<?php
						
							break;
						}
				?>
	
			

			
	<?php
}else{
?>

	<h3>su usuario o su contrasenia es incorrecto</h3>
	<a href="../index.php">vuelva a intentarlo</a>

<?php
}
}else{
?>

		<h3>su usuario o su contrasenia es incorrecto</h3>
		<a href="../index.php">vuelva a intentarlo</a>


<?php
}
}else{
?>
	<h3>su usuario o su contrasenia es incorrecto</h3>
	<a href="../index.php">vuelva a intentarlo</a>
<?php
}
?>
<?php
}

?>

</body>
</html>