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
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bookmania</title>
    <link rel="stylesheet" href="adminUser.css">
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
        <h3>Add User</h3>

        <form class="form-class" action="" method="post" autocomplete="off">
            <input class="uname" type="text" name="uname" placeholder="Name" required />
            <p class="err-uname"></p>
            <input class="password" type="password" name="pass" placeholder="Password" required />
            <p class="err-pass"></p>
            <input class="email" type="email" name="email" placeholder="Email" required />
            <p class="err-email"></p>
            <input class="phone" type="tel" name="phn" placeholder="Phone Number" />
            <input class="admin" type="text" name="admin" placeholder="Admin?" required />
            <p class="err-admin"></p>
            <button type="submit" name="add" class="buttonclass">Add</button>
        </form>

    </div>

    <script src="../adminValidation.js"></script>
</body>
<?php
  }
?>

<?php
    if(isset($_POST['add']))
    {
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $password = md5($_POST['pass']);
        $phn = $_POST['phn'];
        $admin = $_POST['admin'];
    
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

        $sql = "INSERT INTO `users`(`uname`, `password`, `email`, `phn`, `admin`) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($uname, $password, $email, $phn, $admin));

        echo "<script>
        history.go(-1);
        alert('User added successfully!');
        </script>";
    }
?>