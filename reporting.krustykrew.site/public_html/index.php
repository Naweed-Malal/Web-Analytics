<?php 
  session_start();

  // check if already logged in 
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    // check if logged in as admin or user
    if($_SESSION["admin"] == true){
      header("location: admin.php");
      exit;
    }
    if($_SESSION["user"] == true){
      header("location: user.php");
      exit;
    }
  }

  // allow connection to server
  require_once "config.php";

  // set placeholders 
  $username = "";
  $password = "";
  $login_error = "";

  // check if user has completed login
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // error check
    if($username == "" || $password == ""){
      $login_error = "Invalid username or password\n";
    }
    else{
      // prepare sql command
      $cmd = "SELECT password, admin FROM users WHERE username = ? OR email = ?";
      $stmt_handle = mysqli_prepare($link, $cmd);

      if($stmt_handle != false){
        mysqli_stmt_bind_param($stmt_handle, "ss", $username, $username);
        if(mysqli_stmt_execute($stmt_handle)){

            // get query result
            mysqli_stmt_store_result($stmt_handle);

            if(mysqli_stmt_num_rows($stmt_handle) == 1){
              // username exists, now we check password
              $hashPass = "";
              $userAdmin;
              mysqli_stmt_bind_result($stmt_handle, $hashPass, $userAdmin);
              // $userPass = password_hash($userPass, PASSWORD_DEFAULT);
              // or
              // password_verify($password ,$hashPass)

              if(mysqli_stmt_fetch($stmt_handle)){
                if(password_verify($password ,$hashPass)){
                  if($userAdmin){
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["admin"] = true;
                    $_SESSION["user"] = false;
                    header("location: admin.php");
                    exit;
                  }
                  else{
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["admin"] = false;
                    $_SESSION["user"] = true;
                    header("location: user.php");
                    exit;
                  }
                } 
                else{
                  $login_error = "Invalid username or password.\n";
                }
              }
            }
            else{
              $login_error = "Invalid username or password.\n";
            }
        }
        else{
          echo "Invalid sql statment";
        }
      }

      // we're finished 
      mysqli_stmt_close($stmt_handle);
      mysqli_close($link);
    }
  }
?>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <!--Link to CSS file-->
  <link rel="stylesheet" href="assets/styles/login.css"/>
</head>

<body>
  <div class="login">
    <h1 id="heading">
      Sign-in:
    </h1>
    <form class="boxinfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post">
      <?php
        if($login_error != ""){
          echo "<label  style='color:red;'> {$login_error} </label><br>";
        }
      ?>
      <label>Email or Username </label> <br>
      <input type = "text" name = "username"/> 
      <br><br>
      <label>Password</label> <br>
      <input type = "password" name = "password"/> 
      <br><br><br>
      <input id="submit" type="submit" value =" Submit "/><br />
    </form>
  </div>
</body>

</html>
