<?php 
session_start();
$_SESSION['username']=NULL;
$_SESSION['tipo_usu']=NULL;
header("location:index.php");	
?>