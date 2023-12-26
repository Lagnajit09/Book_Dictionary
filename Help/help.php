<?php 
  include("../db.php");
  session_start();
  if(isset($_SESSION['uname'])) 
  {
    $userValid = TRUE;
  } else {
    header('Location: ../Login_Page/login_page.php');
    echo "<script>alert('Plase Login first!')</script>";
  }
?>


<?php
  if($userValid)
  {
    $uid = $_GET['uid'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Bookmania</title>
    <link rel="stylesheet" href="help.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
  </head>
  <body>      
    <?php 
        $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/";
        include($IPATH."navbar.php");
      ?>

    <div class="help-heading">Need Help?</div>
    <form class="help" method="post" action="" autocomplete="off">
      <div class="help-con">
        <input type="text" name="username" placeholder="Username" />
        <input type="text" name="email" placeholder="Email Id" />
        <div class="query">
          <h3>Enter your query</h3>
          <textarea name="query" rows="4" cols="36" class="queries" required></textarea>
          <button type="submit" name="submit" class="help-b">Submit</button>
        </div>
      </div>
    </form>
    
    <script src="../script.js" type="text/javascript"></script>

  </body>
</html>


<?php
  }
?>

<?php
  if(isset($_POST['submit']))
  {
    $uname=$_POST['username'];
    $email=$_POST['email'];
    $query=$_POST['query'];

    $sql = "INSERT INTO `queries`(`uid`, `username`, `email`, `query`) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($uid,$uname,$email,$query));
    echo "<script>history.go(-1);</script>";
    echo "<script>alert('Query Submitted Successfully')</script>";
  }
?>
