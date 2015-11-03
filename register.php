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

		<form class="form-signin" action="register.php" method="POST">
              <h2 class="form-signin-heading"><span style="color: #306EFF;">Regístrese</span></h2>
              <label for="inputUser" class="sr-only">Nombre de usuario</label>
              <input type="user" name="username" class="form-control" placeholder="Nombre de usuario" required autofocus>
              <label for="inputPassword" class="sr-only">Contraseña</label>
              <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
              <label for="inputPassword" class="sr-only">Confirmar contraseña</label>
              <input type="password" name="repassword" class="form-control" placeholder="Confirmar contraseña" required>
               <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Register">
            </form>

<?php
	require('config.php');
	$username = @$_POST['username'];
	$password = @$_POST['password'];
	$repass = @$_POST['repassword'];
	$pass_en = sha1($password);
	if (isset($_POST['submit'])){
		if ($username && $password && $repass){
			$check = mysql_query("SELECT * FROM users WHERE username='".$username."'");
			$rows = mysql_num_rows($check);
			if(mysql_num_rows($check) == 0){
				if ($repass==$password){
					if($query= mysql_query("INSERT INTO users (`id`,`username`, `password`) VALUES ('', '".$username."', '".$pass_en."')")){
						header("Location: index.php");
					}
					else{
					echo "Fail";
					}	
					}
				else{
				echo "Las contraseñas no coinciden";
				}
			}
			else{
				echo "El usuario ya existe";
			}
		}
		else{
			echo "Complete todos los campos";
		}
		#header("Location: index.php");
	}
?>
	</body>
</html>

<!--if (strlen($username) >= 5 && strlen($username) =<25 && strlen($password) > 6)
		}
		else{
			if (strlen($username)<=5 || strlen($username)>=25){
				echo "El numbre de usuario tiene que tener entre 5 y 25";
			}
			if (strlen($password)<6){
				echo "La contraseña debe tener mas de 6 caracteres";
			}-->