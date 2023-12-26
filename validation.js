let uname = document.querySelector(".uname");
let email = document.querySelector(".email");
let password = document.querySelector(".password");
let confirm_pass = document.querySelector(".confirm-pass");
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

confirm_pass.addEventListener("blur", function () {
  if (confirm_pass.value != password.value) {
    document.querySelector(".err-cpass").innerHTML = "Passwords do not match!";
  } else {
    document.querySelector(".err-cpass").innerHTML = "";
  }
});
