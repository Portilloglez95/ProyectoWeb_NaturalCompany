<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Registros Mysql Mediante Funcion</title>
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
	width:50%;
	
	background:#E0E4E5;
	border:1px solid #292929;
	padding:25px;
}
hr {
    margin-top: 5px;
    margin-bottom: 5px;
    border: 0;
    border-top: 1px solid #eee;
}
</style>
</head>

<body>
<div class="main-wrapper">
<h1>Editar Registros con Función PHP </h1>
<br><br>
<?php 
include("adminFunction.php");
$id = $_GET['id'];
select_id('producto','id',$id);
?>
<form action="" method="post">
	<input type="text" value="<?php echo $row->nombre;?>" name="nombres">
	<input type="text" value="<?php echo $row->precio;?>" name="precios">
<input type="text" value="<?php echo $row->descripcion;?>" name="descripcion">
	<input type="text" value="<?php echo $row->cantidad;?>" name="cantidad">	
	<input type="submit" name="submit">
</form>

<?php
	$sql = 'SELECT * FROM producto';
$rec = mysqli_query($connection,$sql);
if (!$rec) {
    echo("Error: %s\n" mysqli_error($connection));
}

	if(isset($_POST['submit'])){
		$field = array("nombres"=>$_POST['nombres'], "precios"=>$_POST['precios'], "descripcion"=>$_POST['descripcion'],"cantidad"=>$_POST['cantidad'],);
		$tbl = "producto";
		edit($tbl,$field,'id',$id);
		header("location:indeex.php");
	}
?>
</div>
</body>
</html>