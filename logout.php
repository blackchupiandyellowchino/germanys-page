<?php

session_start();

setcookie("logueado","");

session_destroy();

header("location: index.php");

?>