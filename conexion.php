<?php
	$mysqli = new mysqli("localhost", "root", "123456", "proyectoweb18b");
	mysqli_set_charset($mysqli,'utf8');
      if (mysqli_connect_errno())
        {
        echo "Error al conectar con la base de datos: " . mysqli_connect_error();
        }
?>
<!-- 
Clase MySqli

$conexion      = new mysqli('localhost', 'usuario', 'contraseña', 'base_de_datos');
$consulta      = $conexion->query('SELECT * FROM usuarios');
$salidaDeDatos = $consulta->fetch_array();
$conexion->close();

Nota: Se deben utilizar el orden de las funciones de Clase Mysqli para evitar errores en el código PHP. -->