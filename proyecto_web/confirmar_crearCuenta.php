<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login de compra</title>

<style>

img {
	margin-left:500px;
}

.logo img{
  width: 210px;
  height: 205px;
  margin-bottom: 5px;
  margin-left: 540px;
}

.logo img:hover {
  cursor: pointer;
  background:#E1ECFF;
  -webkit-transform:scale(1.2);transform:scale(1.2);
}

h1 {
	text-align: center;
	font-size: 38px;
	border: 1px solid black;
	color:black;
	background:#8EADF7;
}

h3 {
	text-align: center;
	font-size: 25px;
}


form {
    width: 450px;
    margin: auto;
    background:#8EADF7;
    padding: 10px 20px;
    box-sizing: border-box;
    margin-top: 20px;
    border: 2px solid black;
    border-radius: 10px;
    bottom: -100px;
}

input{
    width: 100%;
    margin-bottom: 20px;
    padding: 7px;
    box-sizing: border-box;
    font-size: 15px;
    border: 1px solid black;
}

input.btn{
	width: 200px;
	margin-left: 104px;
	background-color: white;
	border: solid black 1px;
	border-radius: 5px;
}

input:focus{
	border:3px solid #0774F0;
	background-color: #C6D7FF;
}

input:hover{
	background-color:#E4E7F0;
}

form label{
	font-size: 20px;
	font-weight: bold;
}

p {
	text-align: center;
	font-size: 17px;
}

.boton-regresar {
	width: 220px;
	font-family: Verdana; 
	font-size: 10pt;
	font-weight: bold;
}

footer p {
  text-align: center;
}

</style>
</head>
<body>

<?php
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "123456";
	$db_name = "proyectoweb18b";
	$tbl_name = "usuario";
	 
	$nom = $_POST['nom_u'];
	$apes = $_POST['apes_u'];
	$correoe = $_POST['email_u'];
	$clave = $_POST['password_u'];

	/*Cifrar contraseña*/
	$hash = password_hash($form_pass, PASSWORD_BCRYPT); 

	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion->connect_error) {
	die("La conexion falló: " . $conexion->connect_error);
	}

	$buscarCorreoe = "SELECT * FROM $tbl_name
	WHERE email_u = '$correoe'";

	$result = $conexion->query($buscarCorreoe);

	$count = mysqli_num_rows($result);


	/* Hasta este punto se han hecho las modificaciones correspondientes. 
	Debajo de este comentario hace falta modificar el html y algunas variables.  */

	if ($count == 1) {

		echo "<div class='RegUsr'>";

		echo "<br />". "¡Este correo electrónico ya ha sido registrado en otra cuenta!" . "<br />";

		echo "<a href='crearCuenta.php'>Por favor ingrese otra dirección de correo electrónico</a>";
		echo "</div>";
	} else{

		$query = "INSERT INTO usuario (nombre_u, apellido_u, correoe_u, clave_u)
		           VALUES ('$nom', '$apes', '$hash', '$correoe')";

		if ($conexion->query($query) == TRUE) {

			header('Refresh: 2; url=login.php');
		
			echo "<div class='RegUsr'>";
			echo "<br />" . "<h2>" . "Cuenta MTEL Creada Exitosamente!" . "</h2>";
			echo "<h4>" . "Bienvenido: " . "$nom" . "</h4>" . "\n\n";
			echo "</div>"; 
		} else {
			echo "<div class='RegUsr'>";
			echo "Error al crear la cuenta." . $query . "<br>" . $conexion->error;
			echo "</div>";
	   }
	}
	 
	mysqli_close($conexion);
?>

</body>
</html>