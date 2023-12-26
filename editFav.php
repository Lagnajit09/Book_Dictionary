<?php
include("db.php");
session_start();
if(isset($_SESSION['uname'])) 
{
  $userValid = TRUE;
} else {
  header('Location: ../Login_Page/login_page.php');
  echo "<script>alert('Plase Login first!')</script>";
}


  if($userValid)
  {
    $bid = $_GET["bid"];
    $id = $_GET["id"];
    $uid = $_GET["uid"];
    $genre = $_GET["genre"];
    $favBook = TRUE;


    $favBookSql = "SELECT * FROM `fav_books` WHERE `uid`='$uid' AND `bookID`='$bid'";
    $stmt1=$conn->prepare($favBookSql);
    $stmt1->execute();
    while($row1=$stmt1->fetch())
    {
      $favBookID = $row1[0];
      $favBook = FALSE;
    }

    if($favBook)
    {
      $sql = "INSERT INTO `fav_books`(`uid`, `bookID`) VALUES (?,?)";
      $stmt = $conn->prepare($sql);
      $stmt->execute(array($uid,$bid));
      echo "<script> history.go(-1); </script>";
    } else {
      $sql = "DELETE FROM `fav_books` WHERE `fav_bookID`='$favBookID'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      echo "<script> history.go(-1); </script>";
    }
  }
?>