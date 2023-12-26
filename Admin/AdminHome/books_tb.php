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
    $Sql = "SELECT * FROM `book`";
    $stmt = $conn->prepare($Sql);
    $stmt->execute();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Table</title>
    <link rel="stylesheet" href="books_tb.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
  </head>

  <body>
    <div class="container" id="blur">
      <div class="books">
        <h1>Books</h1>
      </div>

      <div class="b-table">
        <div class="col1">Book-ID</div>
        <div class="col2">Title</div>
        <div class="col3">Author</div>
        <div class="col4">Pages</div>
        <div class="col5">Decription</div>
        <div class="col6">Genre</div>
        <div class="col7">Image</div>
        <div class="col8">Language</div>
        <div class="col9">Publisher</div>
        <div class="col10">Date</div>
        <div class="col11">Category</div>
        <div class="col12">Edit</div>
        <div class="col13">Delete</div>
      </div>

      <?php 
        while($row=$stmt->fetch())
        {
      ?>

      <div class="p-btable">
        <div class="col1"><?php echo $row[0]; ?></div>
        <div class="col2"><?php echo $row[1]; ?></div>
        <div class="col3"><?php echo $row[2]; ?></div>
        <div class="col4"><?php echo $row[3]; ?></div>
        <div class="col5"><?php echo $row[4]; ?></div>
        <div class="col6"><?php echo $row[5]; ?></div>
        <div class="col7"><?php echo $row[6]; ?></div>
        <div class="col8"><?php echo $row[7]; ?></div>
        <div class="col9"><?php echo $row[8]; ?></div>
        <div class="col10"><?php echo $row[9]; ?></div>
        <div class="col11"><?php echo $row[10]; ?></div>
        <div class="col12">
          <a href="../AdminBook/bookEdit.php?bid=<?php echo $row[0]; ?>">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
        </div>
        <div class="col13">
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
      $sql = "DELETE FROM `book` WHERE `bookID`='$id'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      echo "<script>history.go(-1)</script>";
    }
?>