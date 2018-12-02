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
  width: 410px;
  height: 205px;
  margin-bottom: 5px;
  margin-left: 490px;
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

	<div class="contenedor">
		<div class="contenido">

		<header>
          <div class="logo">
            <a href="index.html">
            <img src="img/nat_com.jpg" alt="Logo videojuego"></a>
          </div>
            <span><hr></span>
        </header>

        	<h1>Crear cuenta</h1><hr>
			<form action="confirmar_crearCuenta.php" method="post">
            <h3>Registrarse</h3>

              <label for="nom_u">Nombre: </label>
              <br><br>
			        <input type="text" name="nom_u" required>


              <label for="apes_u">Apellido: </label>
              <br><br>
			        <input type="text" name="apes_u" required>

              <label for="email_u">Correo electrónico: </label>
              <br><br>
			        <input type="email" name="email_u" placeholder="correo@example.com" required>
              
              <label for="password_u">Contraseña: </label>
              <br><br>
              <input type="password" name="password_u" placeholder="mínimo 8 catateres" minlength="8'" required>

              <label for="password_u">Repetir contraseña: </label>
              <br><br>
              <input type="password" name="password_u" placeholder="mínimo 8 catateres" minlength="8'" required>

              <p>Crear cuenta</p>
			        <input class="btn" type="button" name="CCuenta" value="Crear" onClick=" window.location.href='Form_Registro.php'">

            </form>

        <!-- Botón para regresar a la tienda online -->
        <br>
        <div class="boton-regresar">
        <input type="button" value="Volver a Tienda Online" onclick="window.location='indeex.php'">
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