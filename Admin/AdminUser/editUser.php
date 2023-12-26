<?php 
include("../../db.php");
session_start();
if(isset($_SESSION['uname'])) 
{
  $userValid = TRUE;
} else {
  header('Location: ../../Login_Page/login_page.php');
  echo "<script>alert('Plase Login first!')</script>";
}
?>

<?php
  if($userValid)
  {
    $uid = $_GET['uid'];

    $Sql = "SELECT * FROM `users` WHERE `uid`='$uid'";
    $stmt = $conn->prepare($Sql);
    $stmt->execute();
?>

<!DOCTYPE html>

<head>
  <title>Bookmania</title>
  <link rel="stylesheet" href="adminUser.css" />
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
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
  <div class="main-div">
    <h3>Edit User Information</h3>

    <?php
      while($row=$stmt->fetch())
      {
        $unamePrev = $row[1];
        $emailPrev = $row[3];
    ?>
    <form class="form-class" method="post" action="" autocomplete="off">
      <input class="uid" type="text" name="uid" placeholder="UserID" value="<?php echo $row[0]; ?>" readonly="readonly"/>            <p class="err-uname"></p>
      <input class="uname" type="text" name="uname" placeholder="Name" value="<?php echo $row[1]; ?>" readonly="readonly"/>            <p class="err-uname"></p>

      <input class="password" type="text" name="pass"  placeholder="Password" value="<?php echo $row[2]; ?>" readonly="readonly"/>            <p class="err-pass"></p>

      <input class="email" type="email" name="email"  placeholder="Email" value="<?php echo $row[3]; ?>" readonly="readonly"/>            <p class="err-email"></p>

      <input class="phone" type="tel" name="phn" placeholder="+91-9876123498" value="<?php echo $row[4]; ?>" pattern="+[0-9]{2}-[0-9]{10}"/>
      <input class="admin" type="text" name="admin" placeholder="Admin?" value="<?php echo $row[5]; ?>"/>            <p class="err-admin"></p>

      <button type="submit" name="save" class="buttonclass">Save</button>
    </form>
    <?php
      }
    ?>
  </div>
  <script src="../adminValidation.js"></script>
</body>


<?php
  }
?>

<?php
    if(isset($_POST['save']))
    {
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $phn = $_POST['phn'];
        $admin = $_POST['admin'];
    
        if($unamePrev != $uname || $emailPrev != $email)
        {
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
      }

        $sql = "UPDATE `users` SET `uname`=?,`password`=?,`email`=?,`phn`=?,`admin`=? WHERE `uid`='$uid'";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($uname, $password, $email, $phn, $admin));

        echo "<script>
        history.go(-1);
        alert('User information updated successfully!');
        </script>";
    }
?>