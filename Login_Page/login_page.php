<?php 
include("../db.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Bookmania</title>
    <link rel="stylesheet" type="text/css" href="login_style.css" />
  </head>

  <body>
    <div class="no-user">
      <p>No user found. Please check your username and password.</p>
      <i class="fa-regular fa-circle-xmark" onclick="document.querySelector('.no-user').style.display='none'"></i>
    </div>
    <div class="maincontainer">
      <div class="subdiv1">
        <h3>Log in</h3>
        <form class="login-form" name="login-form" method="post">
          <input type="text" placeholder="Username" class="uname" name="uname" required />
          <p class="err-uname"></p>

          <input type="email" placeholder="Email" name="email" class="email" required />
          <p class="err-email"></p>

          <input
            type="password"
            placeholder="Password"
            class="password"
            name="pass"
            required
          />
          <p class="err-pass"></p>

          <button type="submit" name="submit" class="buttonclass1">Log in</button>
        </form>
        <!-- <p class="forgot-pass">Forgot password? <a href="../Reset_Password_Page/reset_password.php">Click here!</a></p> -->
      </div>

      <div class="subdiv2">
        <img src="../images/loginPage.jpg" alt="book" />

        <p class="paraclass1">
          “A reader lives a thousand lives before he dies.”
        </p>

        <p class="paraclass2">Don't have an account?</p>

        <a href="../Signup_Page/signup_page.php">Sign up</a>
      </div>
    </div>
    <script type="text/javascript" src="../validation.js"></script>
    <script
      src="https://kit.fontawesome.com/12c4f48bb1.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>




<?php 

  if(isset($_POST['submit']))
  {
    $uname = $_POST['uname'];
    $pass = md5($_POST['pass']);
    $email = strtolower($_POST['email']);

    $_SESSION['uname'] = $uname;
    $_SESSION['pwd'] = $pass;

    $sl = 0;
    $sql = "SELECT `uname`,`email`,`password`,`uid`, `admin` FROM `users`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
  
    while($row=$stmt->fetch())
    {
      // echo $row[0];
      // echo $row[1];
      // echo $row[2];
      // echo "\n";
      if($uname === $row[0])
      {
        if($email === strtolower($row[1]))
        {
          if($pass === $row[2])
          {
            echo "<script>
            document.querySelector('.no-user').style.display='none';
            </script>";
            if($row[4] == 1)
            {
              header("Location: ../Admin/AdminHome/admin_page.php?uid={$row[3]}");
            } else {
              header("Location: ../Home/home.php?uid={$row[3]}");
            }
          } else {
            echo "<script>
            document.querySelector('.err-pass').innerHTML=`<a href='../Reset_Password_Page/reset_password.php'>Forgot password?</a>`;
            </script>";
            $_SESSION["uname"] = "";
          }

        }
      } else {
        $_SESSION["uname"] = "";
      }
    }
    echo "<script>
    document.querySelector('.no-user').style.display='block';
  </script>";
  $_SESSION["uname"] = "";
  }

?>

<!-- username existss or not -->
<!-- if exists then match email and password -->
<!-- if not found then error -->
<!-- if email and password matchees then homepage -->