function showPasswordCheckbox() {
  let passwordInput = document.getElementById("passwordInput");
  const showPasswordCheckbox = document.getElementById("showPassword").checked;
  passwordInput.type = showPasswordCheckbox ? "text" : "password";
}
function showEmployee() {
  document.getElementById("adminLogin").style.display = "none";
  document.getElementById("employeeLogin").style.display = "flex";
  document.getElementById("employee").style.backgroundColor = "#bbbabab6";
  document.getElementById("admin").style.backgroundColor = "#edededbf";
}

function showAdmin() {
  document.getElementById("employeeLogin").style.display = "none";
  document.getElementById("adminLogin").style.display = "flex";
  document.getElementById("employee1").style.backgroundColor = "#edededbf";
  document.getElementById("admin1").style.backgroundColor = "#bbbabab6";
  console.log(document.getElementById("employee").style);
}
function showSignInForm() {
  document.getElementById("sign-in-form").style.display = "none";
  document.getElementById("sign-up-form").style.display = "flex";
}

function showSignUpForm() {
  document.getElementById("sign-up-form").style.display = "none";
  document.getElementById("sign-in-form").style.display = "flex";
}

let slotButtons = [];
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
  slotButtons = document.querySelectorAll(".slot");
  slotButtons.forEach((button) => {
    button.addEventListener("click", handleSlotClick);
  });
}
