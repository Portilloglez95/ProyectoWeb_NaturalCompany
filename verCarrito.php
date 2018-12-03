<?php
// initializ shopping cart class
include 'carrito.php';
include 'conexion.php';

error_reporting(E_ERROR | E_WARNING | E_PARSE);

$cart = new Cart;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ver Carrito de Compras</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 20px;}
    input[type="number"]{width: 20%;}
    </style>
    <script>
    function updateCartItem(obj,id){
        $.get("accionCarrito.php", {action:"updateCartItem", id:id, cantidad:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Fallo en actualización de carrito, por favor, intenta otra vez.');
            }
        });
    }
    </script>
</head>
</head>
<body>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"> 

<ul class="nav nav-pills">
  <li role="presentation"><a href="indeex.php">Inicio</a></li>
  <li role="presentation" class="active"><a href="verCarrito.php">Carrito de compras</a></li>
  <li role="presentation"><a href="pagosCarrito.php">Pagos</a></li>
</ul>
</div>

<div class="panel-body">


    <h1>Carrito de compras</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Sub total</th>
            <th>&nbsp;</th>
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
            <td><input type="number" class="form-control text-center" value="<?php echo $item["cantidad"]; ?>" onchange="updateCartItem(this, <?php echo $item["rowid"]; ?>')"></td>
            <td><?php echo '$'.$item["subtotal"].' Pesos'; ?></td>
            <td>-->
                <a href="accionCarrito.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Confirma eliminar?')"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>Tu carrito está vacío.....</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="indeex.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continúe Comprando</a></td>
            <td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' Pesos'; ?></strong></td>
            <td><a href="pagosCarrito.php" class="btn btn-success btn-block">Pagos <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    
    </div>
 <div class="panel-footer">Derechos resevados. &copy; Fabián Portillo González. </div>
 </div><!--Panek cierra-->
 
</div>
</body>
</html>