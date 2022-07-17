
<!DOCTYPE html>
<html>
<head>
    <style>
        * {background-color: black}
        body {color: #E6E6FA;}
    </style>
    <title>Post Echo</title>
</head>
<body>
    <h1>Post Echo</h1>
    <?php
      if(empty($_POST)){
        parse_str(file_get_contents('php://input'), $_POST);
      }
      
      echo "<p>Message Body: </p>";
      echo "<br>";
      foreach ($_POST as $key => $val) {
        echo $key .": " . $val;
        echo "<br>";
       }
     ?>
    
</body>
</html>