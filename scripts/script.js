function showSignInForm() {
  document.getElementById("sign-in-form").style.display = "none";
  document.getElementById("sign-up-form").style.display = "flex";
}

function showSignUpForm() {
  document.getElementById("sign-up-form").style.display = "none";
  document.getElementById("sign-in-form").style.display = "flex";
}

function pickUporDrop() {
  document.getElementById("slots-book").style.display = "flex";
  var x = document.getElementById("slot-booking").value;
  if (x === "pickup") {
    document.getElementById("drop-slot").style.display = "none";
    document.getElementById("pickup-slot").style.display = "grid";
  } else {
    document.getElementById("pickup-slot").style.display = "none";
    document.getElementById("drop-slot").style.display = "grid";
  }
}
