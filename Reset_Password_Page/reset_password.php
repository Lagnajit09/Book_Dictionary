<?php
include("../db.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Bookmania</title>
    <link rel="stylesheet" href="reset_password.css" />
  </head>
  <body>
    <div class="box">
      <form name="reset_pass_form" action="" method="post">
        <h2>Reset Password</h2>
        <div class="inputBox">
          <input
            type="text"
            class="uname"
            placeholder="Username"
            name="uname"
            required="required"
          />
          <p class="err-uname"></p>
        </div>
        <div class="inputBox">
          <input
            type="email"
            class="email"
            placeholder="Email"
            name="email"
            required="required"
          />
          <p class="err-email"></p>
        </div>
        <div class="inputBox">
          <input
            type="password"
            class="password"
            placeholder="Password"
            name="pass"
            required="required"
          />
          <p class="err-pass"></p>
        </div>
        <div class="inputBox">
          <input
            type="password"
            class="confirm-pass"
            placeholder="Confirm Password"
            name="cpass"
            required="required"
          />
          <p class="err-cpass"></p>
        </div>
        <input type="submit" name="submit" value="Reset" />
      </form>
    </div>
    <script type="text/javascript" src="../validation.js"></script>
      <?php 

if(isset($_POST['submit']))
{
  $uname = $_POST['uname'];
  $pass = md5($_POST['pass']);
  $email = $_POST['email'];

  $sql = "SELECT `uname`,`email`,`password` FROM `users`";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  while($row=$stmt->fetch())
  {
    if($uname === $row[0])
    {
      if($email === $row[1])
      {
        // update password
        $sql1 = "UPDATE `users` SET `password` = '$pass' WHERE `users`.`uname` = '$uname'";
        $stmt2 = $conn->prepare($sql1);
        $stmt2->execute();
        header('Location: ../Login_Page/login_page.php');

        echo "<script>alert('Password Updated Successfully!')</script>";
      }
    } else {
      // error
    }
  }
}

?>
  </body>
</html>


