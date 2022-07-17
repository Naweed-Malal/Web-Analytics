<!DOCTYPE html>
<html>
<head>
    <style>
        body {color: #6d4691;}
    </style>
    <title>Hello World!</title>
</head>
<body>
    <h1>Hello World!</h1>
    <?php
	  $hello->date = date("Y-m-d");
      $hello->time = date("H:i:s");
	  $hello->ip = $_SERVER['REMOTE_ADDR'];
	  $hello_JSON = json_encode($hello);
      echo $hello_JSON;
     ?>
    
</body>
</html>