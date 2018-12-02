<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Confirmación de login.php</title>

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
  width: 210px;
  height: 205px;
  margin-top: -220px;
  margin-bottom: 25px;
  margin-left: -15px;
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
<body>

<?php
  session_start();
?>

<?php

  $host_db = "localhost";
  $user_db = "root";
  $pass_db = "123456";
  $db_name = "proyectoweb18b";
  $tbl_name = "usuario";

  $mysqli = new mysqli($host_db, $user_db, $pass_db, $db_name);

  if ($mysqli->connect_error) {
   die("La conexion falló: " . $mysqli->connect_error);
  }

  $email = $_POST['correoe_u'];
  $password = $_POST['clave_u'];
   
  $sql = "SELECT * FROM usuario WHERE coreoe_u = '$email'";

  $result = $mysqli->query($sql);


  /* *******************************************  */

  if ($result->num_rows > 0) {  
    
    $row = $result->fetch_array(MYSQLI_ASSOC);
     
    if (password_verify($password, $row['clave_u'])) {
     
        $_SESSION['loggedin'] = true;
        $_SESSION['correoe_u'] = $email;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

        // Hasta aquí están hechos los cambios adaptados


        /*Debajo de este comentario se deben de modificar los nombres de los div y el html
        para adaptarlo a mi proyecto */

    } else { 
      echo "<div class='contra'>";
      echo "Contraseña es incorrecta.";
      echo "<br><a href='login.php'>Volver a Intentarlo</a>";
      echo "</div>";
    }
  } else{
    echo "<div class='correo'>";
    echo "Correo electrónico es invalido.";
    echo "<br>";
    echo "<br><a href='login.php'>Volver a Intentarlo</a>";
    echo "<br>";
    echo "<br><a href='crearCuenta.php'>Regístrate Aquí</a>";
    echo "</div>";
  }
  mysqli_close($conexion);
 ?>
 </body>
 </html>  