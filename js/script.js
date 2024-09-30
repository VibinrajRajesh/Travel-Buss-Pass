/*Navbar Login Modal*/
// Get modal elements
var modal = document.getElementById('myModal');
var modal2 = document.getElementById('myModal2');

// Get buttons to trigger modals
var btn = document.getElementById('myBtn');
var modalBtn = document.getElementById('myModalBtn');

// Get close elements
var span = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close1")[0];

// Open modals
if (btn) {
    btn.onclick = function() {
        modal.style.display = 'block';
    }
}
if (modalBtn) {
    modalBtn.onclick = function() {
        modal2.style.display = 'block';
    }
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
span1.onclick = function() {
  modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modals, close them
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  } else if (event.target == modal2) {
    modal2.style.display = "none";
  }
}



// Login Switch
var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");
var a = document.querySelectorAll(".toggle-btn");

a[0].style.color = "#fff"; // Initial color for Login button
a[1].style.color = "#000"; // Initial color for Register button

x.style.display = "block";
y.style.display = "none";

function login() {
    // Change color of both toggle buttons
    a[0].style.color = "#fff";  // Login button color
    a[1].style.color = "#000";  // Register button color

    // Move forms
    x.style.left = "52%";  // Set login form to left 27%
    y.style.left = "76%";  // Set register form to left 76%

    // Move slider button
    z.style.left = "0";  // Move the slider button left

    x.style.display = "block";
    y.style.display = "none";
}

function register() {
    // Change color of both toggle buttons
    a[1].style.color = "#fff";  // Register button color
    a[0].style.color = "#000";  // Login button color

    // Move forms
    x.style.left = "27%";  // Move login form out of the view
    y.style.left = "52%";  // Set register form to left 27%

    // Move slider button
    z.style.left = "110px";  // Move the slider button right

    x.style.display = "none";
    y.style.display = "block";
}

