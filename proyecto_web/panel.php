<?php
session_start();
include 'conexion.php';

if (isset($_SESSION['cuenta'])) {
	echo "";
} else {
	echo '<script>window.location=indeex.php"; </script>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
<article>
	<p>
		ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</p>
</article>
<a href="logout.php"><button>Salir</button></a>
</body>
</html>

