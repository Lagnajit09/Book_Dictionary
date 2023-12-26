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

    $Sql = "SELECT COUNT(*) FROM `users`";
    $stmt = $conn->prepare($Sql);
    $stmt->execute();
    $userCount = $stmt->fetchColumn();

    $Sql = "SELECT COUNT(*) FROM `book`";
    $stmt = $conn->prepare($Sql);
    $stmt->execute();
    $bookCount = $stmt->fetchColumn();

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bookmania</title>
    <link rel="stylesheet" href="admin_page.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
  </head>
  <body>
    <div class="navbar">
      <div class="logo">
        <i class="fa-solid fa-book"></i>
        <h3>Bookmania</h3>
      </div>
      <a href="../../Login_Page/logout.php" style="text-decoration:none; background-color:#eec373;">
      <div class="logout">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
      </div>
      </a>
    </div>

    <div class="top-row">
      <div class="box">
        <h2>User count:</h2>
        <h2><?php echo $userCount; ?></h2>
      </div>
      <div class="box">
        <h2>Genre count:</h2>
        <h2>10</h2>
      </div>
      <div class="box">
        <h2>Book count:</h2>
        <h2><?php echo $bookCount; ?></h2>
      </div>
      <div class="boxl" onclick="showAddOptions()">
        <div class="l1">
          <h2>+ Add</h2>
        </div>
        <div class="l2">
          <a href="../AdminUser/addUser.php" style="text-decoration:none;"><p>Add User</p></a>
          <a href="../AdminBook/addBook.php" style="text-decoration:none;"><p>Add Book</p></a>
        </div>
      </div>
    </div>

    <div class="t-heading">
      <h1>Tables</h1>
    </div>

    <div class="bot-row">
      <a class="bbox" href="user_tb.php" style="text-decoration:none; background-color:#eec373;">
       <div>
          <h2>Users</h2>
        </div>
      </a>

      <a class="bbox" href="books_tb.php" style="text-decoration:none; background-color:#eec373;">
        <div>
          <h2>Books</h2>
        </div>
      </a>

      <a class="bbox" href="favourite_tb.php" style="text-decoration:none; background-color:#eec373;">
        <div>
          <h2>Favourite Books</h2>
        </div>
      </a>

      <a class="bbox" href="rating_tb.php" style="text-decoration:none; background-color:#eec373;">
        <div>
          <h2>Ratings</h2>
        </div>
      </a>

      <a class="bbox" href="review_tb.php" style="text-decoration:none; background-color:#eec373;">
        <div>
          <h2>Reviews</h2>
        </div>
      </a>
    </div>

    <div class="bot-row-2">
    <a class="bbox" href="help_tb.php" style="text-decoration:none; background-color:#eec373;">
        <div>
          <h2>Queries</h2>
        </div>
      </a>

      <a class="bbox" href="recommendation.php" style="text-decoration:none; background-color:#eec373;">
        <div>
          <h2>Recommendations</h2>
        </div>
      </a>
    </div>

    <script src="../../script.js"></script>
  </body>
</html>


<?php
  }
?>