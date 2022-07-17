<?php 
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
        header("location: index.php");
        exit;
    }
    else{
      //make sure that this person has user privileges
      if($_SESSION["admin"] == false){
          header("location: index.php");
          exit;
      }
    }

    require_once "config.php";

    $mydata = []; /* will be used to store result array */

    if ($result = $link->query("SELECT * FROM users")) {
      $mydata = $result->fetch_all(MYSQLI_ASSOC);
      $result->close();
    }
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Management</title>
  <script src="https://cdn.zinggrid.com/zinggrid.min.js"></script>
  <style>
    * {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif
    }

    ul{
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
      
    li a:hover {
      background-color: #111;
    }
      
    header{
      margin-bottom: 25px;
    }
  </style>
</head>

<body>
    <header>
        <ul>
            <li> <a href="logout.php">Logout</a> </li>
            <li> <a href="admin.php">Home</a> </li>
        </ul>
    </header>
    <zing-grid editor-controls="all" pager>
    <zg-data>
      <zg-param name="src" value="https://reporting.krustykrew.site/api/users">
    </zg-data>
  </zing-grid>
</body>


