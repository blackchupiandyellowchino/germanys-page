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

<style>
              body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #eee;
              }

              .form-signin {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
              }
              .form-signin .form-signin-heading,
              .form-signin .checkbox {
                margin-bottom: 10px;
              }
              .form-signin .checkbox {
                font-weight: normal;
              }
              .form-signin .form-control {
                position: relative;
                height: auto;
                -webkit-box-sizing: border-box;
                   -moz-box-sizing: border-box;
                        box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
              }
              .form-signin .form-control:focus {
                z-index: 2;
              }
              .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
              }
              .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
              }
            </style>

  <form class="form-signin" action="login.php" method="POST">
              <h2 class="form-signin-heading"><span style="color: #306EFF;">Log in</span></h2>
              <label for="inputUser" class="sr-only">Nombre de usuario</label>
              <input type="user" name="username" class="form-control" placeholder="Nombre de usuario" required autofocus>
              <label for="inputPassword" class="sr-only">Contraseña</label>
              <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
              <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>
            </form>
<!--
 <form action="login.php" method="POST">
  Usuario: <input type="text" name="username"> <br>
  Contraseña: <input type="password" name="password"> <br>
  <input type="submit" value="Iniciar" name="submit">   <a href="register.php">Registrarme</a>
   </form> -->
</body>

<?php
session_start();
require ('config.php');
$username = @$_POST['username'];
$password = @$_POST['password'];
if (isset($_POST['submit'])){
 if ($username && $password){
  $check = mysql_query("SELECT * FROM users WHERE username='".$username."'");
  $rows = mysql_num_rows($check);
  if(mysql_num_rows($check) != 0){
   while ($row = mysql_fetch_assoc($check)){
    $db_username = $row['username'];
    $db_password = $row['password'];
   }
   if ($username==$db_username && sha1($password)==$db_password){
    @$_SESSION["username"] = $username;
    header("Location: index.php");
   }
   else{
    echo "La contraseña es incorrecta";
   }
  }
  else{
   die("No se pudo encontrar su nombre de usuario");
  }
 }
 else{
  echo "Complete los campos";
 }
}
?>