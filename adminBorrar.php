<?php 
include("adminFunction.php");
$id = $_GET['id'];
delete('producto','id',$id);
header("location:indeex.php");
?>