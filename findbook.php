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
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
  </head>
  <body>
<style>
body {
    background-image: url("bg.png");
 
}
</style>

<body>
 <?php
  require ('config.php');
  $op=$_POST['dato'];
  $buscar=$_POST['searchby'];
  $registro = mysql_query("SELECT * FROM libros WHERE $buscar='".$op."'" );
  if(mysql_num_rows($registro)){
  while($reg=mysql_fetch_array($registro)){

    ?>

    <html>
  <h1><?php echo $reg['titulo']; ?></h1>
   <h3><?php echo $reg['autor']; ?></h3>
  <h4><?php echo $reg['categoria']; ?></h5>
  <p><?php echo$reg['descripcion']; ?></p>
  <br>

  </html>

   <?php
   if ($reg['cantidad'] && $_SESSION['username']) {
    ?>
    <html>
    <br>
  <a href="buybook.php?nombre=<?php echo $reg['titulo'] ?> ">Comprar</a>
</html>
<?php
   }
  }
  }
  else
  	echo "No existe ese libro papwa";
?>
</body>
