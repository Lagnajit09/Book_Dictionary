// const header = document.querySelector(".header");
// fetch("/LibraryMS/assets/navbar.php")
//   .then((res) => res.text())
//   .then((data) => {
//     header.innerHTML = data;
//   });

// document.body.querySelector(".slider-1").style.transform =
//   "translate(-400vw, 0)";

// -----------------------------------------------------------------------------------------------

var currentSlide = 0;
var profileClicked = false;

function prevSlide() {
  console.log("prev button clicked!");
  currentSlide = currentSlide === 0 ? 4 : currentSlide - 1;
  console.log(currentSlide);
  document.body.querySelector(".slider-1").style.transform = `translate(-${
    currentSlide * 98.9
  }vw, 0)`;
}

function nextSlide() {
  console.log("next button clicked!");
  currentSlide = currentSlide === 4 ? 0 : currentSlide + 1;
  console.log(currentSlide);
  document.body.querySelector(".slider-1").style.transform = `translate(-${
    currentSlide * 98.9
  }vw, 0)`;
}

// --------------------------------Nav bar profile menu------------------------------------

function showProfileMenu() {
  document.querySelector(".sub-pro2").classList.toggle("open-menu");
}

// Get the modal
const box = document.querySelector(".sub-pro2");
const nav_pro = document.querySelector("#nav_pro");

// Add an event listener for clicks outside the modal
document.onclick = function (e) {
  if (!nav_pro.contains(e.target) && !box.contains(e.target)) {
    box.classList.remove("open-menu");
  }
};

// --------------------------------Like button------------------------------------------

function addFavorite(id) {
  document.getElementById(`${id}`).classList.toggle("fa-regular");
  document.getElementById(`${id}`).classList.toggle("fa-solid");
}

// --------------------------------Book details page user ratings form-------------------------------------------

function userRatings(id) {
  userStars = document.querySelectorAll(".uRating");
  // console.log(userStars[0]);
  for (let i = 0; i <= id; i++) {
    userStars[i].classList.remove("fa-regular");
    userStars[i].classList.add("fa-solid");
  }
  for (let i = 4; i > id; i--) {
    userStars[i].classList.add("fa-regular");
    userStars[i].classList.remove("fa-solid");
  }
  // console.log(document.querySelectorAll(".uRating")[0].classList[0]);
}

// -----------------------------Admin home page +Add button-----------------------------------------------

function showAddOptions() {
  document.querySelector(".l2").classList.toggle("l2__disp");
}

// ------------------------------Fav book page Clear button----------------------------------------

function showIcon() {
  let icons = document.querySelectorAll(".fa-regular");
  let i = 0;
  while (i < icons.length) {
    icons[i].classList.toggle("show");
    i++;
  }
}

// --------------------------------Search bar results-------------------------------------

var debounceTimer;
var userID;

function getBooksDebounced(event, uid) {
  userID = uid;
  event.preventDefault(); // Prevent default form submission
  var query = document.getElementById("bookSearch").value;
  clearTimeout(debounceTimer);
  debounceTimer = setTimeout(function () {
    fetchBooks(query);
  }, 500); // Adjust the delay (in milliseconds) as needed
}

function fetchBooks(query) {
  if (query.length === 0) {
    document.getElementById("searchResults").innerHTML = "";
    return;
  }

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      var results = JSON.parse(this.responseText);
      displayResults(results);
    }
  };
  xhr.open("GET", "../Home/search.php?q=" + query, true);
  xhr.send();
}

function displayResults(results) {
  document.getElementById("searchResults").style.display = "flex";
  var searchResultsDiv = document.getElementById("searchResults");
  searchResultsDiv.innerHTML = ""; // Clear previous results

  if (results.length === 0) {
    resultHtml = "<p>No results found.</p>";
    searchResultsDiv.innerHTML = resultHtml;
  }
  // Loop through results and build HTML
  results.forEach(function (result) {
    var resultHtml =
      "<a href='../Book_Details/book_details.php?bid=" +
      result.bookID +
      "&uid=" +
      userID +
      "'>" +
      '  <div class="search-dd">' +
      '    <div class="search-dd-c1">' +
      '      <img src="' +
      result.book_img +
      '" alt="' +
      result.book_name +
      '" height="50" width="40" />' +
      "    </div>" +
      '    <div class="search-dd-c2">' +
      "      <h3>" +
      result.book_name +
      "</h3>" +
      "      <h5> by " +
      result.author +
      "</h5>" +
      "    </div>" +
      "  </div>" +
      "</a>";

    searchResultsDiv.innerHTML += resultHtml;
  });
}

// Add event listener for form submission
document
  .getElementById("searchForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    getBooksDebounced(event, userID);
  });
