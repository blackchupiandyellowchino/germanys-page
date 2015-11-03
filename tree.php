<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>jstree basic demos</title>
  <style>
  html { margin:0; padding:0; font-size:62.5%; }
  body { max-width:800px; min-width:300px; margin:0 auto; padding:20px 10px; font-size:14px; font-size:1.4em; }
  h1 { font-size:1.8em; }
  .demo { overflow:auto; border:1px solid silver; min-height:100px; }
  </style>
  <link rel="stylesheet" href="jstree/dist/themes/default/style.min.css" />
</head>
<body>
  <h1>HTML demo</h1>
  <div id="html" class="demo">
    <ul>
      <li data-jstree='{ "opened" : true }'>Libros
        <ul>
          <li data-jstree='{ "selected" : true }'>Child node 1</li>
          <li>Child node 2</li>
        </ul>
      </li>
    </ul>
  </div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="jstree/dist/jstree.min.js"></script>
  
  <script>
  // html demo
  $('#html').jstree();

  </script>
</body>
</html>