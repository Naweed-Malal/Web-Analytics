<!DOCTYPE html>
<html>
<head>
    <style>
        * {background-color: black}
        body {color: #E6E6FA;}
    </style>
    <title>Environment</title>
</head>
<body>
    <h1>Environment Variables</h1>
    <?php

	  echo "<h3>Environment Variables</h3>";
	  
	  foreach (getenv() as $key => $val) {
        echo $key .": " . $val ."<br>";
      }
      
	  echo "<h3>Server Variables</h3>";

	  foreach ($_SERVER as $key => $val) {
        echo $key .": " . $val ."<br>";
      }

     ?>
    
</body>
</html>