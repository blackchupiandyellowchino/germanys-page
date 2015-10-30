<?php
	$name = "localhost";
	$user = "root";
	$pass = "alumno";
	$connect = mysql_connect($name,$user,$pass) or die ("No se conecta el user");
	mysql_select_db("germany") or die ("No se conecta la base");
?>
