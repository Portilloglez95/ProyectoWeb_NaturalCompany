<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Insertar, Editar, Eliminar Registros con Función PHP MySQLi </title>
<link type="text/css" href="bootstrap.min.css" rel="stylesheet">
<link type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
<style>
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    text-align: left;
    padding: 4px;
}
tr:nth-child(even){background-color: #f2f2f2}
th {
    background-color: #4CAF50;
    color: white;
}
.main-wrapper{
	width:60%;
	
	background:#E0E4E5;
	border:1px solid #292929;
	padding:25px;
	margin:auto;
}
hr {
    margin-top: 5px;
    margin-bottom: 5px;
    border: 0;
    border-top: 1px solid #eee;
}
h1{
	font-size:24px;
	}
</style>
</head>

<body>
<div class="main-wrapper">
<h1>Insertar, Editar, Eliminar Registros con Función PHP MySQLi </h1>
<br><br>
<form action="" method="post">
  <div class="col-xs-3">
    <input class="form-control" name="nombres" type="text" placeholder="Nombres">
  </div>

  <div class="col-xs-3">
    <input class="form-control" name="precios" type="text" placeholder="Precios">
  </div>  

  <div class="col-xs-3">
    <input class="form-control" name="descripcion" type="text" placeholder="Descripcion">
  </div>  

  <div class="col-xs-3">
    <input class="form-control" name="cantidad" type="text" placeholder="Cantidad">
  </div>  
	<input type="submit" name="submit" class="btn btn-primary" value="Insertar">
</form>
<br>

<?php
	include("adminFunction.php");

	if(isset($_POST['submit'])){
		$field = array("submit"=>$_POST['submit']);
		$tbl = "producto";
		insert($tbl,$field);
	}
?>
<table border="1" width="100%">
	<tr>
		<th width="25%">Nombre</th>
		<th width="25%">Precio</th>
		<th width="25%">Descripcion</th>
		<th width="25%">Cantidad</th>
	</tr>
<?php 
	$sql = "select * from producto";
	$result = db_query($sql);
	while($row = mysqli_fetch_object($result)){
	?>
	<tr>
		<td><?php echo $row->nombre;?></td>
		<td><?php echo $row->precio;?></td>
		<td><?php echo $row->descripcion;?></td>
		<td><?php echo $row->cantidad;?></td>
		<td>

<a class="btn btn-primary" href="adminEditar.php?id=<?php echo $row->id_producto; ?>"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
<a class="btn btn-primary" href="adminBorrar.php?id=<?php echo $row->id_producto;?>"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
</td>
	</tr>
	<?php } ?>
</table>
</div>
</body>
</html>