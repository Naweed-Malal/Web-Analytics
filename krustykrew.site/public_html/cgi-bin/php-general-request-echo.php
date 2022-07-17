<!DOCTYPE html>
<html>
<head>
    <style>
        * {background-color: black}
        body {color: #E6E6FA;}
    </style>
    <title>General Echo</title>
</head>
<body>
    <h1>General Echo</h1>
    <?php
      echo "Request type: ";
      echo $_SERVER['REQUEST_METHOD'];
      echo "<br>";
      echo "Protocol: ";
      echo $_SERVER['SERVER_PROTOCOL'] . "<br>";
      echo "Query: ";

      if (array_key_exists("QUERY_STRING", $_SERVER)){
        echo "<ul>";
        $q = array();
        parse_str($_SERVER['QUERY_STRING'], $q);
        foreach ((array) $q as $k => $v) {
          echo "<li><strong>" . $k .":</strong> " . $v ."</li>";
        }
        echo "</ul>";
      }

      echo "Request Contents: ";
      if(empty($_POST)){
        parse_str(file_get_contents('php://input'), $_POST);
      }
      foreach ($_POST as $key => $val) {
        echo $key;
        echo ": ";
        echo $val;
      }
      
     ?>
    
</body>
</html>