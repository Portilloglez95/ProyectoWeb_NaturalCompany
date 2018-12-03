<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login de compra</title>
</head>
<body>

<?php
// Notificar solamente errores de ejecución
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "proyectoweb18b";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Create variables
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correoe'];
$clave = $_POST['clave'];

$sql = sprintf($conn,"INSERT INTO usuario (nombre_u,apellido_u,correoe_u,clave_u) VALUES ($nombre','$apellido','$correo','$clave')");
//ejecutamos la sentencia de sql
	$ejecutar = mysqli_query($conn,$sql);

	//verificamos la ejecucion
	if(!$ejecutar){
		echo"Hubo Algun Error";
	}else{
		echo"Datos Guardados Correctamente<br><a href='indeex.php'>Volver</a>";
	}

mysqli_close($conn);
?>

</body>
</html>