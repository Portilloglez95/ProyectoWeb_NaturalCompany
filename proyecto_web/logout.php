<?php
session_start();
session_destroy();

echo "Usted cerró sesión";
echo "<script>";
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