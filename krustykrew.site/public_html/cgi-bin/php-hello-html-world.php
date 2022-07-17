<!DOCTYPE html>
<html>
<head>
    <style>
        body {color: #6d4691;}
    </style>
    <title>Hello World</title>
</head>
<body>
    <h1>Hello, World</h1>
    <?php
	  echo "Date: ";
      echo date("Y-m-d");
      echo "<br>Time: ";
      echo date("H:i:s");
	  echo "<br>Your IP: ";
      echo $_SERVER['REMOTE_ADDR'];
     ?>
    
</body>
</html>