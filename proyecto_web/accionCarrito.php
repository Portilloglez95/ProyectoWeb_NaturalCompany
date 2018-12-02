<?php
// Iniciamos la clase de la carta
include 'carrito.php';
$cart = new Cart;

// include database configuration file
include 'conexion.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['producto_id'])){
        $productID = $_REQUEST['producto_id'];
        // get product details
        $query = $db->query("SELECT * FROM producto WHERE producto_id = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'producto_id' => $row['producto_id'],
            'nombre' => $row['nombre'],
            'precio' => $row['precio'],
            'cantidad' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'verCarrito.php':'indeex.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['producto_id'])){
        $itemData = array(
            'rowid' => $_REQUEST['producto_id'],
            'cantidad' => $_REQUEST['cantidad']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }