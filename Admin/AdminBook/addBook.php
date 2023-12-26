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
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale-1.0" />
    <title>Addbook page</title>
    <link rel="stylesheet" href="adminBook.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
  </head>
  <body>
      <div class="bookExists">
            <p>Book already exists.</p>
            <i class="fa-regular fa-circle-xmark" onclick="document.querySelector('.bookExists').style.display='none'"></i>
      </div>
    <div class="maindiv">
      <h3>Add a book</h3>

      <form class="form-class" method="post" action="" autocomplete="off">
        <div>
          <input class="title" name="title" type="text" placeholder="Book Title" required="required" />
        </div>

        <div>
          <input class="author" name="author" type="text" placeholder="Author" required="required" />
        </div>
        <div>
          <input class="pages" name="pages" type="number" placeholder="Pages" required="required" />
        </div>

        <div>
          <textarea
            name="Description"
            id="Description"
            placeholder="Description"
            cols="82"
            rows="10"
          ></textarea>
        </div>

        <div>
          <input class="genre" name="genre" type="text" placeholder="Genre" required="required" />
        </div>

        <div>
          <input class="img" name="img" type="text" placeholder="Image Link" required="required" />
        </div>

        <div>
          <input class="lang" name="lang" type="text" placeholder="Language" required="required" />
        </div>

        <div>
          <input class="publisher" name="publisher" type="text" placeholder="Publisher" required="required" />
        </div>

        <div>
          <input class="publishedDate" name="publishedDate" type="text" placeholder="Published Date" required="required" />
        </div>

        <div>
          <input class="category" name="category" type="text" placeholder="Category" required="required" />
        </div>

        <button type="submit" name="add" class="buttonclass">ADD</button>
      </form>
    </div>

    <script src="../adminValidation.js"></script>
  </body>
</html>

<?php
  }
?>

<?php
    if(isset($_POST['add']))
    {
      $title = $_POST['title'];
      $author = $_POST['author'];
      $pages = $_POST['pages'];
      $Description = $_POST['Description'];
      $genre = $_POST['genre'];
      $img = $_POST['img'];
      $lang = $_POST['lang'];
      $publisher = $_POST['publisher'];
      $publishedDate = $_POST['publishedDate'];
      $category = $_POST['category'];

      $author_array = explode(",", $author);

      $sql = "SELECT `book_name` FROM `book`";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
    
      while($row=$stmt->fetch())
      {
        if($title === $row[0])
        {
          echo "<script>
            document.querySelector('.bookExists').style.display='block';
          </script>";
          exit();
        } 
      }

      $author_obj = json_decode(json_encode($author_array), FALSE);
      $authors = json_encode($author_obj);

      $sql = "INSERT INTO `book`(`book_name`, `author`, `pages`, `description`, `genres`, `book_img`, `language`, `publisher`, `publishedDate`, `category`) VALUES (?,?,?,?,?,?,?,?,?,?)";
      $stmt = $conn->prepare($sql);
      $stmt->execute(array($title, $authors, $pages, $Description, $genre, $img, $lang, $publisher, $publishedDate, $category));

      echo "<script>
      history.go(-1);
      alert('Book added successfully!');
      </script>";

    }

?>