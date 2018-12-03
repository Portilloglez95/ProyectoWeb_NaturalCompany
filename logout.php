<?php
session_start();
session_destroy();

echo '<script> alert("Usted cerró sesión...");</script>';
echo '<script>window.location="indeex.php";</script>';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cerrar sesión</title>
</head>
<body>
<script language="javascript">location.href = "index.php";</script>
</body>
</html>