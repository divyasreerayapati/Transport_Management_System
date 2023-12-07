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
function handleDate() {
  const dateInput = document.getElementById("dateInput").value;
  myDate = dateInput.split("-");
  var newDate = new Date(myDate[0], myDate[1] - 1, myDate[2]);
  document.getElementById(
    "date-selected"
  ).innerText = `Date: ${myDate[2]}-${myDate[1]}-${myDate[0]}`;
}

let pickedSlotButton = null;
function handleSlotClick(event) {
  if (pickedSlotButton) {
    pickedSlotButton.style.backgroundColor = "#00aeff66";
    pickedSlotButton.style.color = "#000";
  }
  const buttonText = event.target.textContent;
  event.target.style.backgroundColor = "#00aeffe6";
  event.target.style.color = "#fff";
  pickedSlotButton = event.target;
  document.getElementById(
    "time-slot-selected"
  ).innerText = `Time Slot: ${buttonText}`;
}
