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



    /* ************************** */
 }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['producto_id'])){
        $deleteItem = $cart->remove($_REQUEST['producto_id']);
        header("Location:verCarrito.php");
    

    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['id'])){
        // insert order details into database
        $insertOrder = $db->query("INSERT INTO compras (id_cliente,precio_total) VALUES ('".$_SESSION['id']."', '".$cart->total()")";
        
        if($insertOrder){
            $IDCompra = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO detalle_compra (id_compra, id_producto, cantidad) VALUES ('".$IDCompra."', '".$item['id_producto']."', '".$item['cantidad']."');";
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: OrdenExito.php?id=$orderID");
            }else{
                header("Location: pagosCarrito.php");
            }
        }else{
            header("Location: pagosCarrito.php");
        }
    }else{
        header("Location: indeex.php");
    }
}else{
    header("Location: indeex.php");
}