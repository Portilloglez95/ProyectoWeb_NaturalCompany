<?php

session_start();

include 'conexion.php';
if (isset($_SESSION['cuenta'])) {
	echo '<script>window.location=panel.php"; </script>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login de Administrador</title>
</head>

<style>

html{
	background: #8EADF7;
}
div.gif-head img {
	margin-left: 480px;
	width:300px; 
	height: 240px;
	border-radius: 70px;
}

h1 {
	margin-left: 560px;
	font-size: 35px;
}

form {
    width: 450px;
    margin-top: -10px;
    margin-left: 550px;
}

.btn-success {
	width: 220px;
	margin-left:-25px;
	height: 30px;
	font-family: Verdana; 
	font-size: 10pt;
	font-weight: bold;
}

.btn-success:hover {
	border:3px solid #0774F0;
	background-color: #C6D7FF;
}

</style>
<body>

	<div class="gif-head">
        <a href="indeex.php">
        <img src="img/login.png">
        </a>
    </div>

	<h1>Login</h1>
	<form method="post" action="validar_admin.php">
	   Usuario: <br><input type="text" class="form-control" name="cuenta" autocomplete="off" required="">
	   <br><br>
	  Contraseña: <br> <input type="password" class="form-control" name="pw" autocomplete="off" required="">
	  <br><br>
	  <input type="submit" class="btn-success" name="login" value="entrar">
	</form>

</body>
</html>