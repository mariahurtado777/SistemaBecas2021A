<?php
    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (isset($_SESSION['usuario'])){
		$user=$_SESSION['usuario'];
		if(isset($_SESSION['contrasenia'])){
			$pass=$_SESSION['contrasenia'];
    
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<h1>Bienvenido Estudiante</h1>
	<?php 
		echo "<a href='salir.php'>SALIR</a>";
	 ?>
</body>
<META HTTP-EQUIV="REFRESH" CONTENT="15;URL=salir.php">
<?php
//header('Location: salir.php');
?>

</html>

<?php
}}else{
	header('Location: ../index.php');//Aqui lo redireccionas al lugar que quieras.
		die() ;
		
	   }
   ?>