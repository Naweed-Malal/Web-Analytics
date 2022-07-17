<?php 
  session_start();
  $_SESSION = array();
  session_destroy();
?>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Success!</title>
  <!--Link to CSS file-->
  <link rel="stylesheet" href="assets/styles/login.css"/>
</head>

<body>
  <div class="logout">
    <h1 id="success"> Success! </h1>
    <h2 id="complete"> Account logout complete </h2>
    <div id="linkback">
      <a id="return" href="index.php"> Home </a>
    </div>
  </div>
</body>

</html>
