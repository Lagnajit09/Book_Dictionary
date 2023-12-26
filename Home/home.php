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
    if(isset($_GET['uid']))
    {
      $uid = $_GET['uid'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bookmania</title>
    <link rel="stylesheet" href="home.css" />
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

    <div class="slider-1">
      <div class="sub-slider1">
        <div
          class="sub-slider1-img"
          style="background-image: url('../images/image1.jpg')"
        ></div>
        <div class="sub-slider1-con">
          <div class="book-img">
            <img
              src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1320399351i/1885.jpg"
              alt="pride-and-prejudice"
              height="400"
              width="300"
            />
          </div>

          <div class="book-con">
            <h1>Pride and Prejudice</h1>
            <h3>Jane Austen</h3>
            <p>
              Pride and Prejudice is a classic novel that tells the story of
              Elizabeth Bennet, a young woman who faces the challenges of
              society, family, and love in the early 19th century England. She
              meets Mr. Darcy, wealthy and proud gentleman, who initially
              dislikes her for her lively and independent spirit. However, as
              they encounter each other more often, they gradually overcone
              their pride and prejudice and develop a mutual respect and
              affection. The novel is famous for its witty and ironic style, its
              realistic portrayal of manners and morals, and its memorable
              characters and themes.
            </p>
            <a href="../Book_Details/book_details.php?bid=31&uid=<?php echo $uid; ?>">Read more →</a>
          </div>
          <div class="slider-1-bu">
            <button onclick="prevSlide()">
              <i class="fa-solid fa-arrow-left"></i>
            </button>
            <button onclick="nextSlide()">
              <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>
        </div>
      </div>

      <div class="sub-slider1">
        <div
          class="sub-slider1-img"
          style="background-image: url('../images/image2.jpg')"
        ></div>
        <div class="sub-slider1-con">
          <div class="book-img">
            <img
              src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1598823299i/42844155.jpg"
              alt="harry-potter-and-the-sorcerer's-stone"
              height="400"
              width="300"
            />
          </div>

          <div class="book-con">
            <h1>Harry Potter and the Sorcerer's Stone</h1>
            <h3>J.K. Rowling</h3>
            <p>
              “Harry Potter and the Sorcerer's Stone” is the first book in J.K.
              Rowling's renowned “Harry Potter” series. The story introduces us
              to Harry Potter, an orphaned boy who discovers on his eleventh
              birthday that he is a wizard. He is invited to attend Hogwarts
              School of Witchcraft and Wizardry, where he befriends Ron Weasley
              and Hermione Granger. Throughout the book, Harry learns about the
              magical world, his parents' mysterious past, and the dark wizard
              who seeks to destroy him, Lord Voldemort.
            </p>
            <a href="../Book_Details/book_details.php?bid=133&uid=<?php echo $uid; ?>">Read more →</a>
          </div>
          <div class="slider-1-bu">
            <button onclick="prevSlide()">
              <i class="fa-solid fa-arrow-left"></i>
            </button>
            <button onclick="nextSlide()">
              <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>
        </div>
      </div>

      <div class="sub-slider1">
        <div
          class="sub-slider1-img"
          style="background-image: url('../images/image3.jpg')"
        ></div>
        <div class="sub-slider1-con">
          <div class="book-img">
            <img
              src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1684638853i/2429135.jpg"
              alt="the-girl-with-the-dragon-tattoo"
              height="400"
              width="300"
            />
          </div>

          <div class="book-con">
            <h1>The Girl with the Dragon Tattoo</h1>
            <h3>Stieg Larsson</h3>
            <p>
              A gripping mystery that follows journalist Mikael Blomkvist and
              hacker Lisbeth Salander as they investigate a wealthy family's
              dark secrets on a remote island. The plot weaves financial
              intrigue, family drama, and a cold case into a thrilling
              narrative. As they delve deeper, they uncover shocking truths that
              intertwine with Salander's troubled past. Larsson's compelling
              storytelling and complex characters make this novel a compelling
              and intense read.
            </p>
            <a href="../Book_Details/book_details.php?bid=1&uid=<?php echo $uid; ?>">Read more →</a>
          </div>
          <div class="slider-1-bu">
            <button onclick="prevSlide()">
              <i class="fa-solid fa-arrow-left"></i>
            </button>
            <button onclick="nextSlide()">
              <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>
        </div>
      </div>

      <div class="sub-slider1">
        <div
          class="sub-slider1-img"
          style="background-image: url('../images/image4.jpg')"
        ></div>
        <div class="sub-slider1-con">
          <div class="book-img">
            <img
              src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1408303130i/375802.jpg"
              alt="ender-game"
              height="400"
              width="300"
            />
          </div>

          <div class="book-con">
            <h1>Ender's Game</h1>
            <h3>Orson Scott Card</h3>
            <p>
              Ender's Game is a classic science fiction novel that follows the
              story of Andrew Ender Wiggin, a young boy recruited into a highly
              competitive military training program to prepare for an impending
              alien invasion. Ender exhibits exceptional strategic and tactical
              skills, making him a key player in humanity's defense. Orson Scott
              Card's novel explores themes of leadership, empathy, and the
              consequences of war.
            </p>
            <a href="../Book_Details/book_details.php?bid=23&uid=<?php echo $uid; ?>">Read more →</a>
          </div>
          <div class="slider-1-bu">
            <button onclick="prevSlide()">
              <i class="fa-solid fa-arrow-left"></i>
            </button>
            <button onclick="nextSlide()">
              <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="sub-slider1">
        <div
          class="sub-slider1-img"
          style="background-image: url('../images/image5.jpg')"
        ></div>
        <div class="sub-slider1-con">
          <div class="book-img">
            <img
              src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1570393096i/44646576.jpg"
              alt="bird-box"
              height="400"
              width="300"
            />
          </div>
          <div class="book-con">
            <h1>Bird Box</h1>
            <h3>Josh Malerman</h3>
            <p>
              "Bird Box" is a thrilling post-apocalyptic novel written by Josh
              Malerman. Set in a world where mysterious creatures drive people
              to madness when they are seen, the story follows Malorie, a young
              woman who must navigate a treacherous journey blindfolded to
              protect herself and her children. The suspenseful narrative
              explores themes of survival, fear, and the lengths a person will
              go to protect their loved ones. It's a gripping and intense read
              that will keep you on the edge of your seat!
            </p>
            <a href="../Book_Details/book_details.php?bid=64&uid=<?php echo $uid; ?>">Read more →</a>
          </div>
          <div class="slider-1-bu">
            <button onclick="prevSlide()">
              <i class="fa-solid fa-arrow-left"></i>
            </button>
            <button onclick="nextSlide()">
              <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="gen">Genre</div>

    <div class="slider-2">
      <div class="genre1">
        <div class="row1">
          <div class="box">
            <a href="../Book_List/book_list.php?id=10&genre=Fantasy&uid=<?php echo $uid; ?>">
              <img
                src="https://images.pexels.com/photos/6023533/pexels-photo-6023533.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt="fantasy-bg"
              />
            </a>
          </div>
          <div class="box">
          <a href="../Book_List/book_list.php?id=3&genre=Romance&uid=<?php echo $uid; ?>">
            <img
              src="https://images.pexels.com/photos/1024984/pexels-photo-1024984.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
              alt="rom-bg"
            />
            </a>
          </div>
          <div class="box">
          <a href="../Book_List/book_list.php?id=2&genre=Science Fiction&uid=<?php echo $uid; ?>">
            <img
              src="https://images.pexels.com/photos/8150290/pexels-photo-8150290.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
              alt="sciFi-bg"
            />
            </a>
          </div>
          <div class="box">
          <a href="../Book_List/book_list.php?id=1&genre=Mystery/Thriller&uid=<?php echo $uid; ?>">
            <img
              src="https://images.pexels.com/photos/5724011/pexels-photo-5724011.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
              alt="mystery-bg"
            />
            </a>
          </div>
          <div class="box">
          <a href="../Book_List/book_list.php?id=5&genre=Horror&uid=<?php echo $uid; ?>">
            <img
              src="https://images.pexels.com/photos/5407935/pexels-photo-5407935.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
              alt="horror-bg"
            />
            </a>
          </div>
        </div>
        <div class="row2">
          <div class="box">
          <a href="../Book_List/book_list.php?id=10&genre=Fantasy&uid=<?php echo $uid; ?>">
            <h2>Fantasy</h2>
          </a>
          </div>
          <div class="box">
          <a href="../Book_List/book_list.php?id=3&genre=Romance&uid=<?php echo $uid; ?>">
            <h2>Romance</h2>
          </a>
          </div>
          <div class="box">
          <a href="../Book_List/book_list.php?id=2&genre=Science Fiction&uid=<?php echo $uid; ?>">
            <h2>Science Fiction</h2>
          </a>
          </div>
          <div class="box">
          <a href="../Book_List/book_list.php?id=1&genre=Mystery/Thriller&uid=<?php echo $uid; ?>">
            <h2>Mystery/Thriller</h2>
          </a>
          </div>
          <div class="box">
          <a href="../Book_List/book_list.php?id=5&genre=Horror&uid=<?php echo $uid; ?>">
            <h2>Horror</h2>
          </a>
          </div>
        </div>
      </div>

      <div class="genre2">
        <div class="row1">
          <div class="box">
          <a href="../Book_List/book_list.php?id=8&genre=Young Adult&uid=<?php echo $uid; ?>">
            <img
              src="https://images.pexels.com/photos/4861364/pexels-photo-4861364.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
              alt="youngAdult-bg"
            />
          </a>
          </div>
          <div class="box">
          <a href="../Book_List/book_list.php?id=6&genre=Self-help&uid=<?php echo $uid; ?>">
            <img
              src="https://images.pexels.com/photos/4325476/pexels-photo-4325476.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1 "
              alt="self-help-bg"
            />
          </a>
          </div>
          <div class="box">
          <a href="../Book_List/book_list.php?id=9&genre=Biography&uid=<?php echo $uid; ?>">
            <img
              src="https://images.pexels.com/photos/2350665/pexels-photo-2350665.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
              alt="bio-bg"
            />
          </a>
          </div>
          <div class="box">
          <a href="../Book_List/book_list.php?id=4&genre=Philosophy&uid=<?php echo $uid; ?>">
            <img
              src="https://images.pexels.com/photos/12113242/pexels-photo-12113242.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
              alt="philo-bg"
            />
          </a>
          </div>
          <div class="box">
          <a href="../Book_List/book_list.php?id=7&genre=Poetry&uid=<?php echo $uid; ?>">
            <img
              src="https://images.pexels.com/photos/6752321/pexels-photo-6752321.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
              alt="poetry-bg"
            />
          </a>
          </div>
        </div>
        <div class="row2">
          <div class="box">
            <a href="../Book_List/book_list.php?id=8&genre=Young Adult&uid=<?php echo $uid; ?>">
            <h2>Young Adult</h2>
            </a>
          </div>
          <div class="box">
            <a href="../Book_List/book_list.php?id=6&genre=Self-help&uid=<?php echo $uid; ?>">
            <h2>Self-Help</h2>
            </a>
          </div>
          <div class="box">
            <a href="../Book_List/book_list.php?id=9&genre=Biography&uid=<?php echo $uid; ?>">
            <h2>Biography</h2>
            </a>
          </div>
          <div class="box">
            <a href="../Book_List/book_list.php?id=4&genre=Philosophy&uid=<?php echo $uid; ?>">
            <h2>Philosophy</h2>
            </a>
          </div>
          <div class="box">
            <a href="../Book_List/book_list.php?id=7&genre=Poetry&uid=<?php echo $uid; ?>">
            <h2>Poetry</h2>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="rec">Recommend</div>

    <div class="suggest">
      <div class="sug-img">
        <img src="../images/image6.jpg" alt="book image" />
      </div>
      <form class="sug-con" method="post" action="" autocomplete="off">
        <h1>Suggest a Book</h1>
        <input type="text" name="bookname" placeholder="Book name" required/>
        <input type="text" name="author" placeholder="Author name" required/>
        <input type="text" name="genre" placeholder="Genre" required/>
        <button type="submit" name="submit" class="sug">Submit</button>
      </form>
    </div>

    <div class="footer">
      <div class="col1">
        <h4>Links</h4>
        <p>FAQ</p>
        <p>Pages</p>
        <p>Stores</p>
        <p>Compare</p>
        <p>Cookies</p>
      </div>

      <div class="col2">
        <h4>About Us</h4>
        <p>
          A Book Dictionary Project by students of ITM of roll number 21DIT004,
          21DIT005, 21DIT006, 21DIT007, 21DIT008 from Ravenshaw University.
        </p>
      </div>

      <div class="col3">
        <h4>Contact</h4>
        <p>1234567890</p>
        <p>store.ctc@gmail.com</p>
        <p>Cuttack</p>
      </div>

      <div class="col4">
        <h4>Subscribe to our newsletter</h4>
        <input type="email" placeholder="abc@gmail.com" />
        <button type="button" class="bu">Join</button>
        <h4>Follow Us</h4>
        <div class="foot-icon">
          <i class="fa-brands fa-x-twitter"></i>
          <i class="fa-brands fa-instagram"></i>
          <i class="fa-brands fa-facebook"></i>
          <i class="fa-solid fa-envelope"></i>
          <i class="fa-brands fa-linkedin"></i>
        </div>
        <span>© Copyright 2023 PLAFD. All rights reserved.</span>
      </div>
    </div>

    <script src="../script.js" type="text/javascript"></script>
  </body>
</html>

<?php
    } else {
      echo "<center><h1>Error 400:Bad request.Please check the URL!</h1></center>";
    }
  }
?>

<?php
  if(isset($_POST['submit']))
  {
    $bname=$_POST['bookname'];
    $author=$_POST['author'];
    $genre=$_POST['genre'];

    $sql = "SELECT `uname` FROM `users` WHERE `uid`='$uid'";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    if($row=$stmt->fetch())
    {
      $username=$row[0];
    }

    $sql = "INSERT INTO `recommendaions`(`uid`, `username`, `book_name`, `author`, `genre`) VALUES (?,?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->execute(array($uid,$username,$bname,$author,$genre));
    echo "<script>history.go(-1)</script>";
  }
?>