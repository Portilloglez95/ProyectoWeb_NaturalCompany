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

nav ul li .presentation .CBusqueda {
  margin-left: 500px;
}
    </style>
</head>
</head>
<body>
<div class="container">
  <div class="imagen-principal">
    <a href="index.html">
    <img src="img/nat_com.jpg" alt="imagen principal Logo">
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
  <li role="presentation"><a href="buscar.php">Buscar</a></li></ul>
</div>

<?php
//Variable que contendrá el resultado de la búsqueda
$texto = '';
//Variable que contendrá el número de resgistros encontrados
$registros = '';

if($_POST){
  
  $busqueda = trim($_POST['buscar']);

  $entero = 0;

  if (empty($busqueda)){
    $texto = 'Búsqueda sin resultados';
  }else{
    // Si hay información para buscar, abrimos la conexión
    conectar();
      mysqli_set_charset('utf8');  // mostramos la información en utf-8
    
    //Contulta para la base de datos, se utiliza un comparador LIKE para acceder a todo lo que contenga la cadena a buscar
    $sql = $mysqli->query("SELECT * FROM producto WHERE nombre LIKE '%" .$busqueda. "%' ORDER BY id_categoria");

        $resultado = mysqli_query($sql); //Ejecución de la consulta
      //Si hay resultados...
    if (mysqli_num_rows($resultado) > 0){ 
       // Se recoge el número de resultados
     $registros = '<p>HEMOS ENCONTRADO ' . mysqli_num_rows($resultado) . ' registros </p>';
       // Se almacenan las cadenas de resultado
     while($fila = mysqli_fetch_assoc($resultado)){ 
              $texto .= $fila['producto'] . '<br />';
       }
    
    }else{
         $texto = "NO HAY RESULTADOS EN LA BBDD"; 
    }
    // Cerramos la conexión (por seguridad, no dejar conexiones abiertas)
    mysqli_close($conexion);
  }
}
?>

<?php 
// Resultado, número de registros y contenido.
echo $registros;
echo $texto; 
?>

<div class="panel-body">
    <h1><b>Productos</b> Natural Company</h1>
    <a href="VerCarrito.php" class="cart-link" title="Ver Carrito"><i class="glyphicon glyphicon-shopping-cart"></i></a>
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
                    <img class ="imagenes" src="img/nat_com.jpg" width="150px" height="100px"><?php echo "<a href=". $row["img_producto"]; ?></img>
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
 <div class="panel-footer" align="center">Derechos resevador &copy; Fabián Portillo González. </div>
 </div><!--Panek cierra-->
 
</div>
</body>
</html>