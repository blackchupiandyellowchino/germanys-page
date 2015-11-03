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


<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" ><strong><span style="color: #43C6DB;">GREECE </span></strong><small><em>library</em></small></a>
          
        </div>


        <div id="navbar" class="navbar-collapse collapse">
          <ul id="myTabs" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Inicio</a></li>
<?php 

session_start();

require('config.php');

if(!$_SESSION['username']){

?> 
<html>
           <li role="presentation"><a href="register.php" role="tab" id="register-tab" data-toggle="tab" aria-controls="register">Registrarse</a></li>
           <li role="presentation"><a href="login.php" role="tab" id="login-tab" >Ingresar</a></li>

</html>

<?php
}

else{
?>

<html>
<li role="presentation"><a href="perfil.php" role="tab" id="perfil-tab">Perfil</a></li>
	<li role="presentation"><a href="index.php?action=logout" role="tab" id="logout-tab" >Logout</a></li>
</html>
<?php

}

if(@$_GET['action'] == "logout"){
		session_destroy();
		header("Location: index.php");
	}

?>
       
          <form class="navbar-form navbar-left" role="search" method="POST" action="findbook.php">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search" name="dato">
              <select name="searchby" class="btn btn-default">
                    <option value="titulo">Título</option>
                    <option value="autor">Autor</option>
                    <option value="categoria">Categoría</option>
                    <option value="precio">Precio</option>
                </select>
            </div>
       
            <button type="submit" class="btn btn-info">Buscar</button>
          </form>
      
        </ul>
        </div>
      </div>
    </nav>
</body>
