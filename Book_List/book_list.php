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
    $id = $_GET['id'];
    $genre = $_GET['genre'];
    $uid = $_GET['uid'];
    $sql = "SELECT `book_name`,`author`,`description`,`book_img`, `bookID`, `ratings` FROM `book` WHERE `category` = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bookmania</title>
    <link rel="stylesheet" href="book_list.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <script>
      var avg = 0;
      var id;
    </script>
  </head>
  <body>

  <?php 
        $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/";
        include($IPATH."navbar.php");
  ?>

    <div class="gen"><?php echo $genre; ?></div>
    <?php
        while($row=$stmt->fetch())
        {
          $favID = $row[4];
          $favBook=0;

          $favBookSql = "SELECT * FROM `fav_books` WHERE `uid`='$uid' AND `bookID`='$row[4]'";
          $stmt1=$conn->prepare($favBookSql);
          $stmt1->execute();
          while($row1=$stmt1->fetch())
          {
            $favBook = $row[4];
          }
      ?>
    <div class="gen-l">
      <div class="bookd">
      <a href="../Book_Details/book_details.php?bid=<?php echo $row[4] ?>&uid=<?php echo $uid; ?>" style="text-decoration:none; background-color: #eec373">
        <div class="book-img">
          <img
            src="<?php echo $row[3]; ?>"
            alt="book-image"
            height="150"
            width="100"
          />
        </div>
        </a>

        <a href="../Book_Details/book_details.php?bid=<?php echo $row[4] ?>&uid=<?php echo $uid; ?>" style="text-decoration:none; background-color: #eec373; margin-left:20px">
        <div class="book-con">
          <h3><?php echo $row[0]; ?></h3>
          <h5><?php echo $row[1]; ?></h5>
          <div class="gen-star">
            <div class="stars__outer">
              <div class="stars__inner" id="<?php echo $row[4]; ?>"></div>
            </div>
          </div>
          <p>
              <?php 
                $desc = explode(" ",$row[2]);
                $a=0;
                while ($a <= 35) {
                  echo $desc[$a]. " ";
                  $a = $a+1;
                }
                echo ". . .";
              ?>
          </p>
        </div>
        </a>
        <div class="gen-heart">
          <a href="../editFav.php?bid=<?php echo $row[4] ?>&uid=<?php echo $uid; ?>&genre=<?php echo $genre; ?>&id=<?php echo $id; ?>" style="text-decoration:none;background-color: #eec373;">
          <?php if($favBook == $favID) { ?>
          <i class="fa-solid fa-heart fav" id="<?php echo $favID; ?>" onclick="addFavorite(<?php echo $favID; ?>)"></i>
          <?php } else { ?>
          <i class="fa-regular fa-heart fav" id="<?php echo $favID; ?>" onclick="addFavorite(<?php echo $favID; ?>)"></i>
          <?php } ?>
          </a>
      </div>
      </div>
    </div>
    <script>
      avg = <?php echo ($row[5] / 5) * 100; ?>;
      console.log(avg);
      document.getElementById("<?php echo $row[4]; ?>").style.width = avg + "%";
    </script>
    <?php
      }
    ?>
    <script src="../script.js"></script>
  </body>
</html>
<?php
  }
?>