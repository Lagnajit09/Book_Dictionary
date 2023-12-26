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

    $Sql = "SELECT * FROM `recommendaions`";
    $stmt = $conn->prepare($Sql);
    $stmt->execute();
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Bookmania</title>
    <link rel="stylesheet" href="recom_style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    
  </head>

  <body>
  <div class="container" id="blur">
    <div class="recommendation">
     <h1>Recommendation</h1>
    </div>

    <div class="r-table">
      <div class="col">User-ID</div>
      <div class="col">Username</div>
      <div class="col">Bookname</div>
      <div class="col">Author</div>
      <div class="col">Genre</div>
      <div class="col">Delete</div>
    </div>

    <?php
      while($row=$stmt->fetch())
      {
    ?>
      <div class="p-rtable">
        <div class="col"><?php echo $row[1]; ?></div>
        <div class="col"><?php echo $row[2]; ?></div>
        <div class="col"><?php echo $row[3]; ?></div>
        <div class="col"><?php echo $row[4]; ?></div>
        <div class="col"><?php echo $row[5]; ?></div>
        <div class="col">
          <button type="button" class="delete-btn" data-id="<?php echo $row[0]; ?>">
            <i class="fa-solid fa-trash"></i>
            </button>
        </div>
      </div>
    <?php
      }
    ?>
    </div>

    <div id="pop-up">
      <h3>Are you sure you want to delete?</h3>
      <div class="btn">
      <form method="post" action="">
        <input type="hidden" name="id" value="">
        <button type="submit" name="del_row">Yes</button>
      </form>
        <button onclick="toggle()">Cancel</button>
      </div>
    </div>

    <script src="pop-up.js"></script>
  </body>
</html>


 <?php
  }
?>

<?php
    if(isset($_POST['del_row']))
    {
      $id = $_POST['id'];
      $sql = "DELETE FROM `recommendaions` WHERE `recommend_id`='$id'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      echo "<script>history.go(-1)</script>";
    }
?>