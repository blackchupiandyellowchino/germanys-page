<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Greece Library</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<style>
body {
    background-image: url("bg.png");
 
}
</style>


<?php

session_start();

require ('config.php');
$registro = mysql_query("SELECT * FROM libros") or  die ("No se encontro la base con los libros");
while($reg=mysql_fetch_array($registro)){
	?>

<html>
	<div class="container marketing">
	<div class="row">
              <div class="col-lg-4">
              <img class="img-circle" src="Discours_de_la_méthode.jpg" alt="Generic placeholder image" width="140" height="144">
                <h2> <?php echo $reg['titulo']; ?></h2>
                <h3> <?php echo $reg['autor']; ?></h4>
                <h4> <?php echo $reg['categoria']; ?></h4>
                <p><?php echo $reg['descripcion']; ?></p>
        <?php
		if ($_SESSION["username"] && $reg['cantidad']){
		?>
                <p><a class="btn btn-primary" href="buybook.php?nombre=<?php echo $reg['titulo'] ?>" role="button">Comprar &raquo;</a></p>
              </div>
</html>
<?php
	}
}
?>