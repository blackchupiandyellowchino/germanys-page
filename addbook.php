<!DOCTYPE html>
<head>
	<title>Agregar libro</title>
</head>
<body>
	<form action="addbook.php" method="POST">
		Titulo: <input type="text" name="titulo"> <br>
		Autor: <input type="text" name="autor"> <br>
		Categoria: <input type="text" name="categoria"> <br>
		Ano: <input type="text" name="year"> <br>
		Descipcion: <input type="text" name="descripcion"> <br>
		Cantidad: <input type="text" name="cantidad"> <br>
		<input type="submit" value="Agregar" name="submit">
</body>



<?php
session_start();
require ('config.php');
$titulo = @$_POST['titulo'];
$autor = @$_POST['autor'];
$categoria = @$_POST['categoria'];
$year = @$_POST['year'];
$descripcion = @$_POST['descripcion'];
$cantidad = @$_POST['cantidad'];
if (isset($_POST['submit'])){
	if ($titulo && $autor && $year && $descripcion && $cantidad !=""){
		$query= mysql_query("INSERT INTO libros (`titulo`, `autor`,`categoria`,`year`,`descripcion`,`cantidad`) VALUES ('".$titulo."','".$autor."','".$categoria."','".$year."','".$descripcion."','".$cantidad."')");
	}else{
		echo "Complete los campos";
	}
}
?>

