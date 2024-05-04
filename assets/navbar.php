<div class="navbar">
    <a href="../Home/home.php?uid=<?php echo $uid; ?>" style="text-decoration:none; background-color:#eec373">
      <div class="logo">
        <i class="fa-solid fa-book"></i>
        <h3>Bookmania</h3>
      </div>
    </a>

      <form class="search-section" id="searchForm" action="home.php" method="post" autocomplete="off" onsubmit="getBooksDebounced(event, <?php echo $uid; ?>)">
        <input
          type="text"
          id="bookSearch"
          name="bookSearch"
          placeholder="Search"
          class="search-bar"
          oninput="getBooksDebounced(event, <?php echo $uid; ?>)"
        />
        <div class="search-icon">
          <i class="fa-solid fa-magnifying-glass" id="search"></i>
        </div>
        <div class="search-r" id="searchResults"></div>
      </form>

      <a href="../Favorites/fav_page.php?uid=<?php echo $uid; ?>&q=all">
        <div class="favourite">
          <i class="fa-regular fa-heart" id="fav"></i>
        </div>
      </a>

      <div class="profile">
        <div class="sub-pro1" id="nav_pro" onclick="showProfileMenu()">
          <i class="fa-regular fa-user" id="pro"></i>
        </div>
        <div class="sub-pro2">
          <a href="../Login_Page/logout.php" style="text-decoration:none;">
            <div class="sub-pro2-c1">
            <i class="fa-solid fa-right-to-bracket" id="pro-icon"></i>
            <p id="pro-para">Log out</p>
          </div>
          </a>
          <div class="sub-pro2-c2">
            <i class="fa-solid fa-user" id="pro-icon"></i>
            <p id="pro-para">Profile</p>
          </div>
          <div class="sub-pro2-c3">
            <i class="fa-solid fa-gear" id="pro-icon"></i>
            <p id="pro-para">Settings</p>
          </div>
          <a href="../Help/help.php?uid=<?php echo $uid; ?>" style="text-decoration:none;">
          <div class="sub-pro2-c4">
            <i class="fa-regular fa-circle-question" id="pro-icon"></i>
            <p id="pro-para">Help</p>
          </div>
          </a>
        </div>
      </div>
    </div>

