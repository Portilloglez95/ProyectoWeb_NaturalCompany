<?
include 'conexion.php';
?>

<form action="buscador.php" method="get">
<input type="text" name="palabra" value="<?php  echo ($_POST["palabra"]);  ?>"  />
<input type="submit" name="buscador" value="buscar"  />
</form>

<? 

if ($_GET['buscador']) 
{

	$buscar = $_GET['palabra'];

	if (empty($buscar)) {
		echo "No se ha ingresado ningún valor";
	}
	else
	{
		$sql = $mysqli<-query("SELECT * FROM producto WHERE id_producto LIKE '$buscar'");
		$result = mysqli_query($sql, $mysqli);

		$total = mysqli_num_rows($result);

		if ($row = mysqli_fetch_array($result)) {
			echo "Resultados para: $buscar ";
			echo "Total de resultados: $total";

			do {
				?>

				(Id: <? echo $row['id']; ?>) - <? echo $row['titulo']; ?>
<?

}
while ($row = mysql_fetch_array($result));
}
else
{
echo "No se encontraron resultados para: $buscar";
}
}
}
?>
