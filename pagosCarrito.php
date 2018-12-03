<?php
// include database configuration file
include 'conexion.php';
?>
<?php
// initializ shopping cart class
include 'carrito.php';
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: indeex.php");
}

// set customer ID in session
$_SESSION['id'] = 1;

// get customer details by session customer ID
$query = $mysqli->query("SELECT * FROM usuario WHERE id_usuario = ".$_SESSION['id']);
$custRow = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pagos - Carrito de compras</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 20px;}
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    </style>
</head>
<body>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"> 

<ul class="nav nav-pills">
  <li role="presentation"><a href="indeex.php">Inicio</a></li>
  <li role="presentation"><a href="VerCarrito.php">Ver Carrito</a></li>
  <li role="presentation" class="active"><a href="PagosCarrito.php">Pagos</a></li>
  <li role="presentation"><a href="login.php">Login</a></li>
</ul>
</div>

<div class="panel-body">
    <h1>Vista previa de la Orden</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Pricio</th>
            <th>Cantidad</th>
            <th>Sub total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["nombre"]; ?></td>
            <td><?php echo '$'.$item["precio"].' Pesos'; ?></td>
            <td><?php echo $item["cantidad"]; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No hay articulos en tu carrito......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' Pesos'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <div class="shipAddr">
        <h4>Detalles de envío</h4>
        <p><?php echo $custRow['nombre_u']; ?></p>
        <p><?php echo $custRow['apellido_u']; ?></p>
        <p><?php echo $custRow['correoe_u']; ?></p>
    </div>
    <div class="footBtn">
        <a href="indeex.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a>
        <a href="AccionCarta.php?action=placeOrder" class="btn btn-success orderBtn">Realizar pedido <i class="glyphicon glyphicon-menu-right"></i></a>
    </div>
        </div>
 <div class="panel-footer">Derechos resevados. &copy; Fabián Portillo González.</div>
 </div><!--Panek cierra-->
</div>
</body>
</html>