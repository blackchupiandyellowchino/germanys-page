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
		<form action="register.php" method="POST">
		Username: <input type="text" name="username" > <br />
		Password: <input type="password" name="password" ><br />
		Confirm password: <input type="password" name="repassword" ><br />
		 <input type="submit" name="submit" value="Register"> or <a href="login.php">Login</a>
		</form>
	</body>
</html>
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
						echo "Success";
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
		
	}
?>
<!--if (strlen($username) >= 5 && strlen($username) =<25 && strlen($password) > 6)
		}
		else{
			if (strlen($username)<=5 || strlen($username)>=25){
				echo "El numbre de usuario tiene que tener entre 5 y 25";
			}
			if (strlen($password)<6){
				echo "La contraseña debe tener mas de 6 caracteres";
			}-->
