<!DOCTYPE html>
<html>
<head>
    <style>
        body {color: #6d4691;}
        * {background-color: black}
    </style>
    <title>Get Echo</title>
</head>
<body>
    <h1>Get Echo</h1>
    <?php
     echo "Query String: ";
     if (array_key_exists("QUERY_STRING", $_SERVER)){
         echo  $_SERVER['QUERY_STRING'] ;
     }
     echo "<br>";
      foreach ((array) $_GET as $key => $val) {
        echo "<p>" . $key .": " . $val ."</p>";
        echo "<br>";
        }
     ?>
    
</body>
</html>
