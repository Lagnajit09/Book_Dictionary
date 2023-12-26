function toggle() {
  let blur = document.getElementById("blur");
  blur.classList.toggle("active");
  let show = document.getElementById("pop-up");
  show.classList.toggle("show");
}

document.addEventListener("DOMContentLoaded", function () {
  var deleteButtons = document.querySelectorAll(".delete-btn");
  var popup = document.getElementById("pop-up");
  var popupForm = popup.querySelector("form");
  var hiddenInput = popupForm.querySelector('input[name="id"]');

  deleteButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      var bookID = button.getAttribute("data-id");
      hiddenInput.value = bookID;
      toggle(); // Implement the togglePopup() function as needed
    });
  });

  popupForm.addEventListener("submit", function (event) {
    // Prevent the form from submitting for now
    // event.preventDefault();

    // Implement any additional logic you need, e.g., AJAX request
    // The book ID is available as hiddenInput.value

    // After processing, close the pop-up if needed
    toggle();
  });
});
