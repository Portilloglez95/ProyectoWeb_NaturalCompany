<?php
session_start();
include 'conexion.php';

if (isset($_SESSION['cuenta'])) {?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Panel de administrador</title>

<style>
1 {
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

.logout {
	margin-left:630px;
	margin-top: 50px;
}

footer p {
  text-align: center;
}

</style>
</head>
<body>

<h3>Sesión Administrador</h3>
<p>En esta sección usted puede realizar modificaciones de insertar, alterar y eliminar<br>Productos de Natural Company.</p>

	<form method="post" action="validar_admin.php">
	   <h3>Altas | Bajas | Modificaciones</h3>

	   <label for="nom_prod">Nombre: </label>
	   <br><input type="text" class="form-control" name="nom_prod" autocomplete="off" required="">
	   <br>

	   <label for="precio">Precio: </label>
	   <br><input type="text" class="form-control" name="precio" autocomplete="off" required="">
	  <br>

	    <label for="nom_prod">Imagen. </label>
	   <br><input type="text" class="form-control" name="nom_prod" autocomplete="off" required="">

	   <label for="desc">Descripción: </label>
	   <br><input type="text" class="form-control" name="desc" autocomplete="off" required="">

	    <label for="cantidad">Cantidad: </label>
	   <br><input type="text" class="form-control" name="cantidad" autocomplete="off" required="">

	  <input type="submit" class="btn-admin" name="insertar" value="Insertar">
	  <input type="submit" class="btn-admin" name="eliminar" value="Eliminar">
	  <input type="submit" class="btn-admin" name="modificar" value="Modificar">
	  <input type="submit" class="btn-admin" name="cancelar" value="Cancelar">
	  <br><br>
	</form>

<a href="logout.php"><button class="logout">Cerrar sesión</button></a>
<?php
	}else{
		echo "<script> window.location=indeex.php;</script>";
	}
	?>
</body>
</html>

