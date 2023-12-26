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
    $Sql = "SELECT * FROM `fav_books`";
    $stmt = $conn->prepare($Sql);
    $stmt->execute();
?>



<!DOCTYPE html>
<html>
  <head>
    <title>Favourite Table</title>
    <link rel="stylesheet" href="favourite_tb.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
  </head>

  <body>
    <div class="container" id="blur">
      <div class="Fav-books">
        <h1>Favourite Book</h1>
      </div>

      <div class="f-table">
        <div class="col">ID</div>
        <div class="col">Book_ID</div>
        <div class="col">User_ID</div>
        <div class="col">Delete</div>
      </div>

      <?php 
            while($row=$stmt->fetch()) 
            {
      ?>
      <div class="p-ftable">
            <div class="col"><?php echo $row[0]; ?></div>
            <div class="col"><?php echo $row[1]; ?></div>
            <div class="col"><?php echo $row[2]; ?></div>
        <!-- <div class="col">
          <a href="../Edit/favb-e.php?id=">
              <i class="fa-solid fa-pen-to-square"></i>
          </a>
        </div> -->
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
      $sql = "DELETE FROM `fav_books` WHERE `fav_bookID`='$id'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      echo "<script>history.go(-1)</script>";
    }
?>