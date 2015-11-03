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


<br>
<br>
<?php 

include_once ('header.php');

session_start();
require ('config.php');


$registro = mysql_query("SELECT * FROM users WHERE username='".$_SESSION["username"]."'");
if(mysql_num_rows($registro)){
	while($reg=mysql_fetch_array($registro)){


		?>
		<html><h1>Libros comprados por <?php echo $reg['username']; ?></h1><br></html>

		<?php
	}
}

$registro = mysql_query("SELECT * FROM ventas WHERE idusername='".$_SESSION["username"]."'" );
if(mysql_num_rows($registro)){
	while($reg=mysql_fetch_array($registro)){
		
?>

	<html>
		<h3><?php echo $reg['libro']; ?><h3></html>
		<?php
	}
}


?>