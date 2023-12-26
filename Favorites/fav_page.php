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
    $genre = $_GET['q'];

    if($genre == "all")
    {    
      $sql = "SELECT book.bookID, book.book_name, book.book_img, fav_books.fav_bookID
      FROM fav_books
      INNER JOIN book ON fav_books.bookID = book.bookID
      WHERE `uid`='$uid';";
    } else {
      $sql = "SELECT book.bookID, book.book_name, book.book_img, fav_books.fav_bookID
      FROM fav_books
      INNER JOIN book ON fav_books.bookID = book.bookID
      WHERE `uid`='$uid' AND book.category='$genre';";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Bookmania</title>
    <link rel="stylesheet" href="favpage_style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
  </head>

  <body>
    <div class="navbar">
    <a href="../Home/home.php?uid=<?php echo $uid; ?>" style="text-decoration:none; background-color:#eec373">
      <div class="logo">
        <i class="fa-solid fa-book"></i>
        <h3>Bookmania</h3>
      </div>
    </a>
      <div class="fav"><h3>Favorites</h3></div>
      <button type="submit" class="buttonclass" onclick="showIcon()">Edit</button>
    </div>
    <div class="content">
      <div class="genre">
        <h3>Filter</h3>

        <a href="fav_page.php?uid=<?php echo $uid; ?>&q=all"><div class="opt">All</div></a>
        <a href="fav_page.php?uid=<?php echo $uid; ?>&q=10"><div class="opt">Fantasy</div></a>
        <a href="fav_page.php?uid=<?php echo $uid; ?>&q=3"><div class="opt">Romance</div></a>
        <a href="fav_page.php?uid=<?php echo $uid; ?>&q=1"><div class="opt">Mystery/Thriller</div></a>
        <a href="fav_page.php?uid=<?php echo $uid; ?>&q=2"><div class="opt">Science fiction</div></a>
        <a href="fav_page.php?uid=<?php echo $uid; ?>&q=6"><div class="opt">Self help</div></a>
        <a href="fav_page.php?uid=<?php echo $uid; ?>&q=5"><div class="opt">Horror</div></a>
        <a href="fav_page.php?uid=<?php echo $uid; ?>&q=4"><div class="opt">Philosophy</div></a>
        <a href="fav_page.php?uid=<?php echo $uid; ?>&q=9"><div class="opt">Biography</div></a>
        <a href="fav_page.php?uid=<?php echo $uid; ?>&q=8"><div class="opt">Young adult</div></a>
        <a href="fav_page.php?uid=<?php echo $uid; ?>&q=7"><div class="opt-last">Poetry</div></a>
      </div>

      <div class="book-row">
        <?php
          $data = [];
          $favBooks = [];
          $index=0;
          while($row=$stmt->fetch())
          {
              $data += ["$index" => [ "$row[0]" => $row[2] ]];
              array_push($favBooks, $row[3]);
              $index++;
          }

          $i = 0;
          $index=0;
          if(count($data) % 6 == 0)
          {
            $rows = floor(count($data)/6);
          } else {
            $rows = floor(count($data)/6)+1;
          }
          while($i < $rows)
          {
        ?>
        
        <div class="shelf">
          <div class="shelf-c1">
            <?php
              $ctr=0;
              while($ctr < count($data) && $index < count($data))
              {
                foreach($data[$index] as $x => $x_value) {
            ?>
            <div class="book">
              <a href="../Book_Details/book_details.php?bid=<?php echo $x; ?>&uid=<?php echo $uid; ?>">
                <img
                  src="<?php echo "$x_value"; ?>"
                  alt="<?php  ?>"
                  height="100"
                  width="70"
                /></a>
                <form method="post" action="">
                    <input type="hidden" name="clear_input" value="<?php echo $favBooks[$index]; ?>" />
                    <button type="submit" name="submit"><i class="fa-regular fa-circle-xmark"></i>
                  </button>
                </form>
            </div>
            <?php
                }
                $index++;
                if($ctr == 5)
                {
                  break;
                }
                $ctr++;
              }
            ?>
          </div>
          <div class="shelf-c2"></div>
        </div>
        <?php
        $i++;
          }
        ?>
        </div>
      </div>
    </div>
    <script src="https://kit.fontawesome.com/12c4f48bb1.js" crossorigin="anonymous"></script>
    <script src="../script.js"></script>
  </body>
</html>
<?php
  }
?>

<?php
  if(isset($_POST['submit']))
  {
    $favBookID = $_POST['clear_input'];
    $sql = "DELETE FROM `fav_books` WHERE `fav_bookID`='$favBookID'";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    echo "<script>history.go(-1)</script>";
  }
?>