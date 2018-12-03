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
include 'conexion.php';
?>

<?php

  if ($mysqli->connect_error) {
   die("La conexion falló: " . $mysqli->connect_error);
  }

    if (isset($_POST['entrar'])) {
      $usuario = $_POST['correoe'];
      $pw = $_POST['contras'];
      $login = $mysqli->query("SELECT * FROM usuario 
        WHERE correoe_u = '$usuario' AND clave_u = '$pw' ");

    if (mysqli_num_rows($login)>0) {
    
        $row = mysqli_fetch_array($login);
        $_SESSION['correoe'] = $row['correoe_u'];
        echo '<script> alert("                                               BIENVENIDO...");</script>';
        echo '<script>window.location="indeex.php"; </script>';
     
    if (password_verify($pw, $row['contras'])) {
     
        $_SESSION['login'] = true;
        $_SESSION['correoe'] = 'correoe_u';
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

        header('Location: Pprincipal.php');
    }else {
      echo '<script> alert("Usuario o contraseña incorrectos...");</script>';
      echo '<script>window.location="login.php"; </script>';
      }
    }
  }

    mysqli_close($conexion);

   /* if (_SESSION['login'] == true) {
     echo "<a href=login.php". == "<a href=indeex.php>";
    } */
 ?>
 </body>
 </html>  