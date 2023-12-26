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
    <link rel="stylesheet" type="text/css" href="signup.css" />
  </head>

  <body>
  <div class="userExists uname-exists">
      <p>Username already exists</p>
      <i class="fa-regular fa-circle-xmark" onclick="document.querySelector('.uname-exists').style.display='none'"></i>
    </div>
    <div class="userExists email-exists">
      <p>EmailID already exists</p>
      <i class="fa-regular fa-circle-xmark" onclick="document.querySelector('.email-exists').style.display='none'"></i>
    </div>
    <div class="maincontainer">
      <div class="subdiv1">
        <h1>Sign up</h1>
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

          <input
            type="password"
            placeholder="Confirm Password"
            class="confirm-pass"
            name="cpass"
            required
          />
          <p class="err-cpass"></p>

          <input type="tel" placeholder="Phone number" class="phn" name="phn" />

          <button type="submit" name="submit" class="buttonclass1">Sign up</button>
        </form>
      </div>

      <div class="subdiv2">
        <img src="../images/signupPage.jpg" alt="book" height="600"/>

        <p class="paraclass1">
          “Books are the mirrors of the soul.”
        </p>

        <p class="paraclass2">Already have an account? <a href="../Login_Page/login_page.php"> Log in</a></p>
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
    $uid = time();
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $password = md5($_POST['pass']);
    $phn = $_POST['phn'];

    $sql = "SELECT `uname`,`email` FROM `users`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
  
    while($row=$stmt->fetch())
    {
      if($uname === $row[0])
      {
        echo "<script>
          document.querySelector('.uname-exists').style.display='block';
        </script>";
        exit();
      } 
      elseif($email === $row[1])
      {
        echo "<script>
          document.querySelector('.email-exists').style.display='block';
        </script>";
        exit();
      }
    }

    $_SESSION['uname'] = $uname;
    $_SESSION['pwd'] = $password;

    $sql = "INSERT INTO `users`(`uid`, `uname`, `password`, `email`, `phn`) VALUES (?,?,?,?,?)";
    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($uid, $uname, $password, $email, $phn));

    header('Location: ../Home/home.php?uid='.$uid);
  }

?>
