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
	background: #ffffff;
}
div.gif-head img {
	margin-left: 510px;
	width:300px; 
	height: 240px;
	border-radius: 70px;
}

h1 {
	margin-left: 600px;
	font-size: 35px;
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
    border-radius: 20px;
    bottom: -100px;
}

form label{
	font-size: 20px;
	font-weight: bold;
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

.btn-success {
	width: 220px;
	margin-left:100px;
	height: 36px;
	font-family: Verdana; 
	font-size: 12pt;
	font-weight: bold;
}

.btn-success:hover {
	border:3px solid #0774F0;
	background-color: #C6D7FF;
	cursor: pointer;
}

.boton-regresar {
	width: 220px;
	font-family: Verdana; 
	font-size: 10pt;
	font-weight: bold;
}

.boton-regresar:hover {
	cursor: pointer; 
}

</style>
<body>

	<div class="gif-head">
        <a href="indeex.php">
        <img src="img/login.png">
        </a>
    </div>

	<form method="post" action="validar_admin.php">
	   <h3>Administrador</h3>
	   <label for="cuenta">Usuario: </label>
	   <br>
	   <input type="text" class="form-control" name="cuenta" autocomplete="off" required="">
	   <br><br>
	   <label for="pw">Contraseña: </label>
	  <input type="password" class="form-control" name="pw" autocomplete="off" required="">
	  <br><br>
	  <input type="submit" class="btn-success" name="login" value="Ingresar">
	</form>
	<br>
        <div class="boton-regresar">
        <input type="button" value="Volver a Tienda Online" onclick="window.location='indeex.php'" style="font-family: Verdana; font-size: 10 pt">
		</div><!-- fin boton-regresar-->
  
  <br><hr>
  <footer>
      <p class="copyright" align="center">
          Todos los derechos reservados &copy;. Fabián Portillo González.
      </p>
  </footer>

</body>
</html>