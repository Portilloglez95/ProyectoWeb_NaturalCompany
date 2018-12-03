<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login de usuario</title>

<style>

body{

}

div.gif-head iframe {
	margin-left: 430px;
	width:480px; 
	height: 240px;
	border-radius: 10px;
}

img {
	margin-left:500px;
}

.logo img{
  width: 390px;
  height: 225px;
  margin-top: -220px;
  margin-bottom: 25px;
  margin-left: 10px;
}

.logo img:hover {
  cursor: pointer;
  background:#E1ECFF;
  -webkit-transform:scale(1.1);transform:scale(1.1);
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
    border-radius: 20px;
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

footer p{
  text-align: center;
}
</style>
</head>

<?php
  session_start();
  include 'conexion.php';
?>
<body>
	<div class="contenedor">
		<div class="contenido">

		<header>
			<div class="gif-head">
            	<a href="#">
            	<iframe src="https://giphy.com/embed/11w04LB6klGtcA" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
            	</a>
        	</div>

        	<div class="logo">
  				<a href="index.html">
  				<img src="img/nat_com.jpg" alt="Logo de empresa">
  				</a>
			</div>

            <span><hr></span>
        </header>

        	<h1>Inicio de sesión</h1><hr>

			    <form action="confirmar_login.php" method="post">
            <h3>Usuario</h3>

              <label for="email_u">Correo electrónico: </label>
              <br><br>
			        <input class= "correo" type="email" name="correoe" placeholder="correo@example.com" autocomplete="off" required="">
              
              <label class="contra" for="password">Contraseña: </label>
              <br><br>
              <input class="contra" type="password" name="contras" minlength="8'" autocomplete="off" required="">

              <input type="submit" value="ingresar" name="entrar" id="boton" autocomplete="off" required="">

              <p>¿Aún no te has registrado?</p>
			       <input class="btn" type="button" name="CCuenta" value="Crear cuenta" onClick=" window.location.href='crearCuenta.php'">
          </form>
        <!-- Botón para regresar -->
        <br>
        <div class="boton-regresar">
        <input type="button" value="Volver a Tienda Online" onclick="window.location='indeex.php'" style="font-family: Verdana; font-size: 10 pt">
    	</div>

		</div><!-- fin contenido-->
	</div><!-- fin contenedor --> 
  
  <br><hr>
  <footer>
      <p class="copyright">
          Todos los derechos reservados &copy;. Fabián Portillo González.
      </p>
  </footer>

</body>
</html>