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
$datos=$usuario->datosEstudiante($user);


//$verificarContraseniaEstudiante=$usuario->verificarContraseniaEstudiante($pass);

//var_dump(password_verify($pass,$datos['contrasenia']));

	//echo "entro";
$existeUsuario=$usuario->verificarUsuarioEstudiante($_SESSION['usuario']);
//$_SESSION['idUsuario']=$existeUsuario['idUsuario'];
$existeContrasenia=$usuario->verificarContraseniaEstudiante($_SESSION['contrasenia']);
$datosUsuario=$usuario->rolEstudiante($_SESSION['usuario']);
/*$existeUsuario=$usuario->verificarUsuarioPersonal($_SESSION['usuario']);
$existeContrasenia=$usuario->verificarContraseniaPersonal($_SESSION['contrasenia']);
$datosUsuario=$usuario->rolPersonal($_SESSION['usuario']);*/

	//if(password_verify($_POST['contrasenia'], $existeUsuario['contrasenia'])){
 //var_dump(password_verify($pass, $_SESSION['contrasenia'])) ;
if($existeUsuario){
	if($user==$datosUsuario['usuario']){
		if(password_verify($pass,$datos['contrasenia'])){
			
?>
			<!DOCTYPE html>
			<html>
			<head>
				<title></title>
			</head>
			<body>
				<h3>BIENVENIDO<br><br><?php echo $datosUsuario['nombreUsuario']?></h3><br>
				<?php
					$opc=$datosUsuario['idRol'];
					switch ($opc) {
						case 1:
				?>
							<?php
							header('../Vista/vistaEstudiante/index.php')
							?>
				<?php
					
							break;

						case 2:
				?>
							<?php
							header('../Vista/vistaEstudiante/index.php')
						?>
				<?php
					
							break;
						case 3:
				?>
						<?php
							header('Location:../Vista/vistaEstudiante/index.php')
						?>
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

