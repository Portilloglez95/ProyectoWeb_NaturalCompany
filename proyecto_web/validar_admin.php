<?php

session_start();
include 'conexion.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Validación de cuenta de administrador</title>
</head>
<body>
	<?php 
		if (isset($_POST['login'])) {
			$usuario = $_POST['cuenta'];
			$pw = $_POST['pw'];
			$log = $mysqli->query("SELECT * FROM administrador 
				WHERE usuario_admin = '$usuario' AND clave_admin = '$pw' ");

		if (mysqli_num_rows($log)>0) {
				$row = mysqli_fetch_array($log);
				$_SESSION['cuenta'] = $row['usuario_admin'];
				echo 'iniciando sesión para ' ,$_SESSION['cuenta'];
				echo '<script>window.location=panel.php"; </script>';

		}else {
				echo '<script> alert("Usuario o contraseña incorrectos...");</script>';
				echo '<script>window.location=indeex.php"; </script>';
			}
		}
	 ?>
</body>
</html>