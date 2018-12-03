<?php
include 'conexion.php';
if(!isset($_REQUEST['id_compra'])){
    header("Location: indeex.php");
}
?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Orden Completado - PHP Carrito de Compras</title>
    <meta charset="utf-8">
    <style>
    .container{padding: 20px;}
    p{color: #34a853;font-size: 18px;}
    </style>
</head>
</head>
<body>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"> 

<ul class="nav nav-pills">
  <li role="presentation"><a href="indeex.php">Inicio</a></li>
</ul>
</div>

<div class="panel-body">

    <h1>Estado de su Orden</h1>
    <p>Su pedido ha sido enviado exitosamente. La ID del pedido es #<?php echo $_GET['id_compra']; ?></p>
           </div>
 <div class="panel-footer">Derechos resevados. &copy; Fabián Portillo González.</div>
 </div><!--Panek cierra-->
</div>
</body>
</html>