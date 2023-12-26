let uname = document.querySelector(".uname");
let email = document.querySelector(".email");
let password = document.querySelector(".password");
let admin = document.querySelector(".admin");
let loginButton = document.querySelector(".buttonclass1");

uname.addEventListener("blur", function () {
  if (uname.value == "") {
    document.querySelector(".err-uname").innerHTML = "Username is required!";
  } else {
    document.querySelector(".err-uname").innerHTML = "";
  }
});

email.addEventListener("blur", function () {
  if (email.value == "") {
    document.querySelector(".err-email").innerHTML = "Email is required!";
  } else {
    if (email.value.includes("@") && email.value.includes(".")) {
      document.querySelector(".err-email").innerHTML = "";
    } else {
      document.querySelector(".err-email").innerHTML = "Invalid email address!";
    }
  }
});

password.addEventListener("blur", function () {
  if (password.value == "") {
    document.querySelector(".err-pass").innerHTML = "Password is required!";
  } else {
    if (password.value.length >= 8) {
      document.querySelector(".err-pass").innerHTML = "";
    } else {
      document.querySelector(".err-pass").innerHTML =
        "Password must be at least 8 characters long!";
    }
  }
});

admin.addEventListener("blur", function () {
  if (admin.value == "") {
    document.querySelector(".err-admin").innerHTML = "This field is required!";
  } else {
    if (admin.value == 0 || admin.value == 1) {
      document.querySelector(".err-admin").innerHTML = "";
    } else {
      document.querySelector(".err-admin").innerHTML =
        "Expected value: 0 or 1 only.";
    }
  }
});

// //-------------------------- add book ---------------------------------
// let title = document.querySelector(".title");
// let author = document.querySelector(".author");
// let pages = document.querySelector(".pages");
// let desc = document.querySelector("#Description");
// let genre = document.querySelector(".genre");
// let lang = document.querySelector(".lang");
// let publisher = document.querySelector(".publisher");
// let publishedDate = document.querySelector(".publishedDate");
// let category = document.querySelector(".category");
