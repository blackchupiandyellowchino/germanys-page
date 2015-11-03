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

<?php 

include_once ('header.php');

?>
<div id="myTabContent" class="tab-content">
	<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledBy="home-tab">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img class="first-slide" src="hg1.jpg" alt="First slide">
                <div class="container">
                  <div class="carousel-caption">
                    <p><a class="btn btn-lg btn-info" href="#" role="button">Comprar</a></p>
                  </div>
                </div>
              </div>
              <div class="item">
                <img class="second-slide" src="hg2.jpg" alt="Second slide">
                <div class="container">
                  <div class="carousel-caption">
                    <p><a class="btn btn-lg btn-info" href="#" role="button">Comprar</a></p>
                  </div>
                </div>
              </div>
              
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
	</div>
</div>

</style>
<?php 

include_once ('showallbooks.php');

?>

</body>
</html>