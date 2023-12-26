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
    $id = $_GET['bid'];
    $uid = $_GET['uid'];
    $deleteReview = FALSE;
    $sql = "SELECT * FROM `book` WHERE `bookID` = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    
    $currentUser = "SELECT * FROM `users` WHERE `uid`='$uid'";
    $stmt10=$conn->prepare($currentUser);
    $stmt10->execute();
    while($row=$stmt10->fetch())
    {
      $uname = $row[1];
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bookmania</title>
    <link rel="stylesheet" href="bookD.css" />
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

    <?php
      while($row=$stmt->fetch())
      {
        $favID = $row[0];
        $favBook=0;

        $favBookSql = "SELECT * FROM `fav_books` WHERE `uid`='$uid' AND `bookID`='$id'";
        $stmt1=$conn->prepare($favBookSql);
        $stmt1->execute();
        while($row1=$stmt1->fetch())
        {
          $favBook = $row[0];
        }

        $count_rvw = "SELECT COUNT(*) FROM `reviews` WHERE `bookID`=?";
        $stmt2=$conn->prepare($count_rvw);
        $stmt2->execute(array($id));

        $count_rate = "SELECT COUNT(*) FROM `ratings` WHERE `bookID`=?";
        $stmt3=$conn->prepare($count_rate);
        $stmt3->execute(array($id));
        while($rateCtr=$stmt3->fetch()) 
        { 
          $ratings = $rateCtr[0];
        }

        $sum_rate = "SELECT SUM(`ratings`) AS 'Total Rating' FROM `ratings` WHERE `bookID`='$id'";
        $stmt4=$conn->prepare($sum_rate);
        $stmt4->execute();
        while($sumRate=$stmt4->fetch())
        {
          $totalRate = $sumRate[0];
        }

        if($ratings === 0)
        {
          $avgRate = 0;
        }
        else 
        {
          $avgRate = round(($totalRate / $ratings), 2);
        }
    ?>
    <div class="bookDt">
      <div class="bookDt-img">
        <img
          src="<?php echo $row[6]; ?>"
          alt="<?php echo $row[1]; ?>-image"
          height="450"
          width="300"
        />
      </div>
      <div class="bookDt-con">
        <h1><?php echo $row[1]; ?></h1>
        <h2>
        <?php echo $row[2]; ?>
        </h2>
        <h4>Genre: <span><?php echo $row[5]; ?></span></h4>
        <div class="bookDt-icon">
          
          <div class="stars__outer">
            <div class="stars__inner"></div>
          </div>

          <span><?php echo $ratings; ?> ratings</span>
          <span><?php while($rvwCtr=$stmt2->fetch()) { echo $rvwCtr[0]; } ?> reviews</span>
        </div>
        <h5>Language: <span><?php echo $row[7]; ?></span></h5>
        <h5>Pages: <span><?php echo $row[3]; ?></span></h5>
        <h5>Published Date: <span><?php echo $row[9]; ?></span></h5>
        <h5>Publisher: <span><?php echo $row[8]; ?></span></h5>
      </div>
      <div class="book-heart">
        <!-- <i class="fa-regular fa-heart" id="<?php echo $fav; ?>" onclick="addFavorite(<?php echo $fav; ?>)"></i> -->

        <a href="../editFav.php?bid=<?php echo $id ?>&uid=<?php echo $uid; ?>&genre=<?php echo $row[5]; ?>&id=<?php echo $row[10]; ?>" style="text-decoration:none;background-color: #eec373;">
          <?php if($favBook == $favID) { ?>
          <i class="fa-solid fa-heart fav" id="<?php echo $favID; ?>" onclick="addFavorite(<?php echo $favID; ?>)"></i>
          <?php } else { ?>
          <i class="fa-regular fa-heart fav" id="<?php echo $favID; ?>" onclick="addFavorite(<?php echo $favID; ?>)"></i>
          <?php } ?>
          </a>
      </div>
    </div>

    <div class="book-des">
      <p>
      <?php echo $row[4]; ?>
      </p>
    </div>

    <div class="book-r">
      <div class="book-r1">
        <?php
          $rateSql = "SELECT * FROM `ratings` WHERE `uid`='$uid' AND `bookID`='$id'";
          $rateStmt = $conn->prepare($rateSql);
          $rateStmt->execute();

          if($rateRow=$rateStmt->fetch())
          {
            $noOfRatings = $rateRow[4];
        ?>
      <div class="user_rates">
      <?php
        $i = 0;
          while($i < $noOfRatings)
          {
            echo '<i class="fa-solid fa-star" style="font-size:25px"></i>';
            $i++;
          }
          $i=5;
          while($i > $noOfRatings)
          {
            echo '<i class="fa-regular fa-star" style="font-size:25px"></i>';
            $i--;
          }
        ?>
        <form action="" method="post">
            <button class="clr_ratings" type="submit" name="clear_ratings">Clear</button>
        </form>
        </div>

        <?php } else { ?>
        <h4>Rate this Book</h4>
        <form action="" method="post">
            <button type="submit" name="rate_1">
            <i class="fa-regular fa-star uRating" onclick="userRatings(0)"></i>
            </button>
            <button type="submit" name="rate_2">
            <i class="fa-regular fa-star uRating" onclick="userRatings(1)"></i>
            </button>
            <button type="submit" name="rate_3">
            <i class="fa-regular fa-star uRating" onclick="userRatings(2)"></i>
            </button>
            <button type="submit" name="rate_4">
            <i class="fa-regular fa-star uRating" onclick="userRatings(3)"></i>
            </button>
            <button type="submit" name="rate_5">
            <i class="fa-regular fa-star uRating" onclick="userRatings(4)"></i>
          </button>
        </form>
        <?php } ?>
      </div>

      <div class="book-r2">
        <form method="post" action="" autocomplete="off">
          <h4>Give a review</h4>
          <input type="text" id="rvwInput" name="review" value="" required />
          <button type="submit" name="submit">Submit</button>
        </form>
      </div>

      <div class="book-r3">
        <h4>Reviews</h4>
        <?php
        $rvwSql = "SELECT * FROM `reviews` WHERE `bookID`='$id'";
        $rvwStmt = $conn->prepare($rvwSql);
        $rvwStmt->execute();
        $rvwCtr = 0;
  
        while ($rvwRow = $rvwStmt->fetch()) 
        {
          $rvwCtr = 1;
          $timestamp = strtotime($rvwRow[5]);
          $new_date = date("d-m-Y", $timestamp);
        ?>
        <div class="book-rvw">
        <div class="book-rv">
          <h6><?php echo $rvwRow[2]; ?></h6>
          <p><?php echo $new_date; ?></p>
          <p><?php echo $rvwRow[4]; ?></p>
        </div>
        <?php if($uid == $rvwRow[1]) { ?>
        <form action="" method="post" autocomplete="off">
          <input type="hidden" name="review_id" value="<?php echo $rvwRow[0]; ?>" />
          <button type="submit" name="delete_review">
            <i class="fa-solid fa-minus"></i>
          </button>
        </form>
        <?php } ?>
        </div>
        <?php 
        } 

        if($rvwCtr === 0) {
          echo "<p>No Reviews yet!</p>";
        }
        ?>

      </div>
    </div>
    <script>
      document.querySelector(".stars__inner").style.width = (<?php echo $avgRate; ?> / 5) * 100 + "%";
    </script>
    <script src="../script.js"></script>
  </body>
</html>


<?php
      }
}
?>

<?php 

  if(isset($_POST['submit']))
  {
    $review = $_POST['review'];


    $sql = "INSERT INTO `reviews`(`uid`, `uname`, `bookID`, `text`) VALUES (?,?,?,?)";
    $stmt1=$conn->prepare($sql);
    $stmt1->execute(array($uid, $uname, $id, $review));
    echo "<script>history.go(-1);</script>";
  }

  if(isset($_POST['delete_review']))
  {
    echo "<script> console.log('Clicked!') </script>";
    $reviewID = $_POST['review_id'];
    $delReview = "DELETE FROM `reviews` WHERE `reviews_id`=?";
    $stmt2=$conn->prepare($delReview);
    $stmt2->execute(array($reviewID));
    echo "<script>history.go(-1);</script>";
  }

  if(isset($_POST['rate_1']) || isset($_POST['rate_2']) || isset($_POST['rate_3']) || isset($_POST['rate_4']) || isset($_POST['rate_5']))
  {
      $postnames = array_keys($_POST);
      $u_rating = (int)(substr($postnames[0],5));

      $count_rate = "SELECT COUNT(*) FROM `ratings` WHERE `bookID`=?";
      $stmt1=$conn->prepare($count_rate);
      $stmt1->execute(array($id));
      while($rateCtr=$stmt1->fetch()) 
      { 
        $ratings = $rateCtr[0] + 1;
      }

      $sum_rate = "SELECT SUM(`ratings`) AS 'Total Rating' FROM `ratings` WHERE `bookID`='$id'";
      $stmt1=$conn->prepare($sum_rate);
      $stmt1->execute();
      while($sumRate=$stmt1->fetch())
      {
        $totalRate = $sumRate[0] + $u_rating;
      }

      $avgRate = round(($totalRate / $ratings), 2);

      $updtRatingInBookTable = "UPDATE `book` SET `ratings`=? WHERE `bookID`=?";
      $stmt2=$conn->prepare($updtRatingInBookTable);
      $stmt2->execute(array($avgRate,$id));

      $rateSql = "INSERT INTO `ratings`(`uid`, `uname`, `bookID`, `ratings`) VALUES (?,?,?,?)";
      $stmt3=$conn->prepare($rateSql);
      $stmt3->execute(array($uid,$uname,$id,$u_rating));


      echo "<script>history.go(-1);</script>";
  }

  if(isset($_POST['clear_ratings']))
  {

    $rateSql = "DELETE FROM `ratings` WHERE  `uid`='$uid'";
    $stmt4=$conn->prepare($rateSql);
    $stmt4->execute();

    
    $count_rate = "SELECT COUNT(*) FROM `ratings` WHERE `bookID`=?";
    $stmt1=$conn->prepare($count_rate);
    $stmt1->execute(array($id));
    while($rateCtr=$stmt1->fetch()) 
    { 
      $ratings = $rateCtr[0];
    }

    $sum_rate = "SELECT SUM(`ratings`) AS 'Total Rating' FROM `ratings` WHERE `bookID`='$id'";
    $stmt1=$conn->prepare($sum_rate);
    $stmt1->execute();
    while($sumRate=$stmt1->fetch())
    {
      $totalRate = $sumRate[0];
    }

    if($ratings === 0)
    {
      $avgRate = 0;
    }
    else 
    {
      $avgRate = round(($totalRate / $ratings), 2);
    }

    $updtRatingInBookTable = "UPDATE `book` SET `ratings`=? WHERE `bookID`=?";
    $stmt2=$conn->prepare($updtRatingInBookTable);
    $stmt2->execute(array($avgRate,$id));

      echo "<script>history.go(-1);</script>";
  }

?>