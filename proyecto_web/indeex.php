<?php
include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Carrito de Compras PHP</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    body {
      background: #337ab7;
    }

    h4 {
      font-weight: bold;
    }

    .container{
      padding:2px;
      padding-top: 30px;
      padding-bottom: 10px;
    }

    .btn-success {
      background-color:#0E901A;
    }

    .btn-success:hover {
      background-color:#35C342;
    }
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}

.imagen-principal img {
  width: 180px;
  height: 100px;
  align-content: center;
  margin-top: -2em;
  margin-bottom: -1em;
}

.imagen-principal img:hover {
  cursor: pointer;
}

    </style>
</head>
</head>
<body>
<div class="container">
  <div class="imagen-principal">
    <a href="index.html">
    <img src="img/nat_com.jpg" alt="cepillo de dientes">
    </a>
  </div>
<div class="panel panel-default">
<div class="panel-heading"> 

<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="indeex.php">Inicio</a></li>
  <li role="presentation"><a href="VerCarrito.php">Carrito de Compras</a></li>
  <li role="presentation"><a href="pagosCarrito.php">Pagos</a></li>
  <li role="presentation"><a href="login.php">Login</a></li>
  <li role="presentation"><a href="admin.php">Administrador</a></li>
</ul>
</div>

<div class="panel-body">
    <h1><b>Productos</b> Natural Company</h1>
    <a href="VerCarta.php" class="cart-link" title="Ver Carta"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    <div id="products" class="row list-group">

        <?php
        //get rows query
        $query = $mysqli->query("SELECT * FROM producto ORDER BY id_producto DESC LIMIT 20");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
          <div class="item col-lg-4">
            <div class="thumbnail">
                <div class="caption">
                    <h4 class="list-group-item-heading"><?php echo $row["nombre"]; ?></h4>
                    <p class="list-group-item-text"><?php echo $row["descripcion"]; ?></p>
                    <img class ="imagenes" width="150px" height="100px"><?php echo $row["img_producto"]; ?></img>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead"><?php echo '$'.$row["precio"].' Pesos'; ?></p>
                        </div>
                    <div class="col-md-6">
                            <a class="btn btn-success" href="VerCarrito.php">Agregar al Carrito</a> <!-- PENDIENTE href y funciones adicionales -->
                        </div>
                    </div>
                </div><!-- fin. caption-->
            </div><!-- fin intem col-lg-4 -->
        </div>
        <?php } }else{ ?>
        <p>Producto(s) no existe.....</p>
        <?php } ?>
    </div>
        </div>
 <div class="panel-footer">Derechos resevador &copy; Fabián Portillo González. </div>
 </div><!--Panek cierra-->
 
</div>
</body>
</html>