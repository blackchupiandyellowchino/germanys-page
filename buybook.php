<?php
require ('config.php');
session_start();

if (!@$_SESSION["username"]) {
	header("Location: index.php");
}

$title= @$_GET['nombre'];
$name= $_SESSION["username"];

if ($title){
	$registro = mysql_query("SELECT * FROM libros WHERE titulo='".@$_GET['nombre']."'" ) ;
	while($reg=mysql_fetch_array($registro)){
		mysql_query("UPDATE libros SET cantidad=cantidad-1 WHERE titulo='".$title."'");
		mysql_query("INSERT INTO ventas (`idusername`, `libro`) VALUES ('".$name."', '".$title."')");
	}	
	header("Location: comprado.php");
}

?>
