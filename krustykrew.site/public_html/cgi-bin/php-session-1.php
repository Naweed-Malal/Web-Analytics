<!DOCTYPE html>
<html>
<head>
    <title>Session Page 1</title>
</head>
<body>
    <h1>Session Page 1</h1>
    <?php
      $var = $_POST['fname'];
      echo "Name: " . $var;
      echo "<br>";
      echo "<a href='https://www.krustykrew.site/'>Home</a><br>";
     ?>
     <input type="hidden" name="name" value="<?php echo $_POST['fname']?>">   
</body>
</html>