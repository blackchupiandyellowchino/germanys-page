<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Arbolito</title>
  <style>
  html { margin:0; padding:0; font-size:62.5%; }
  body { max-width:800px; min-width:300px; margin:0 auto; padding:20px 10px; font-size:14px; font-size:1.4em; }
  h1 { font-size:1.8em; }
  .demo { overflow:auto; border:1px solid silver; min-height:100px; }
  </style>
  <link rel="stylesheet" href="jstree/dist/themes/default/style.min.css" />
  <link href="favicon.ico" rel="icon" type="image/x-icon" />
</head>

<?php

session_start();

require ('config.php');
$registro = mysql_query("SELECT * FROM libros") or die ("No se encontro la base con los libros");

?>


<body>
  <h1>HTML demo</h1>
  <div id="html" class="demo">
    <ul>
      <li data-jstree='{ "opened" : true }'>Libros
        <ul>
        <?php
while($reg=mysql_fetch_array($registro)){
?>
          <li><a href="findbook.php?dato=<?php echo $reg['titulo']; ?>" > <?php echo $reg['titulo']; ?> </a></li>
          <?php

}
?>
        </ul>
      </li>
    </ul>
  </div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="jstree/dist/jstree.min.js"></script>
  
  <script>
  // html demo
  $('#html').jstree({
           "plugins": ["core", "themes", "html_data", "search"] 
    }).on("select_node.jstree", function (e, data) {
           document.location = data.instance.get_node(data.node, true).children('a').attr('href');
    });

  </script>
</body>
</html>