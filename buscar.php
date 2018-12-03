<?php include 'conexion.php';?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
<title>Unir dos tablas y buscar con PHP & MySQL - BaulPHP</title>
<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<style>

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
  height: 200px;
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
  margin-left: 150px;
}

.btn-success {
  width: 170px;
  margin-left:120px;
  height: 29px;
  font-family: Verdana; 
  font-size: 12pt;
  font-weight: bold;
}

.btn-success:hover {
  border:3px solid #0774F0;
  background-color: #C6D7FF;
  cursor: pointer;
}

.boton-regresar {
  width: 220px;
  font-family: Verdana; 
  font-size: 10pt;
  font-weight: bold;
  margin-left: 450px;
}

.boton-regresar:hover {
  cursor: pointer; 
}


footer p{
  text-align: center;
}
</style>
  </head>
  <body>
    <header>
<div class="container">

<div class="row">
  <div class="col-12 col-md-12">
<!-- Contenido -->   
<form method="post">
    <h3>Búsqueda de Productos</h3>
      <label for="articulo">Artículo: </label>
      <br>
      <input required name="PalabraClave" type="text" id="inlineFormInput" placeholder="Ingrese palabra clave">  
      <br>

      <button class="btn-success" type="submit" value="Buscar">Buscar</button>
    </div>

  </div><!-- Fin .form-row align-items-center -->
</form>

<?php
 
if(!empty($_POST))
{
      $aKeyword = explode(" ", $_POST['PalabraClave']);
      $query ="SELECT * FROM producto WHERE nombre like '%" . $aKeyword[0] . "%' OR id_categoria like '%" . $aKeyword[0] . "%'";
      
     for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR descripcion like '%" . $aKeyword[$i] . "%'";
        }
      }
     
     $result = $mysqli->query($query);
     echo "<br>Has buscado la palabra clave:<b> ". $_POST['PalabraClave']."</b>";
                     
     if(mysqli_num_rows($result) > 0) {
        $row_count=0;
        echo "<br><br><b>Resultados encontrados: </b><br>";
        echo "<br><table class='table table-striped'>";
        While($row = $result->fetch_assoc()) {   
            $row_count++;                         
            echo "<tr><td>".$row_count." </td><td>". $row['descripcion'] . "</td><td>". $row['descripcion'] . "</td></tr>";
        }
        echo "</table>";
	
    }
    else {
        echo "<br>Resultados encontrados: Ninguno";
    }
}

?>
  <br><br>
    <div class="boton-regresar">
      <input type="button" value="Volver a Tienda Online" onclick="window.location='indeex.php'" style="font-family: Verdana; font-size: 10 pt">
    </div><!-- fin boton-regresar-->

  <footer>
    <hr>
    <p>Derechos resevados. &copy; Fabián Portillo González. </p>
  </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    </body>
</html>