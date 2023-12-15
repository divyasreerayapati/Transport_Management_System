function handleDate() {
  const dateInput = document.getElementById("dateInput").value;
  myDate = dateInput.split("-");
  var newDate = new Date(myDate[0], myDate[1] - 1, myDate[2]);
  document.getElementById(
    "date-selected"
  ).value = `${myDate[2]}-${myDate[1]}-${myDate[0]}`;
}

let pickedSlotButton = null;
function handleSlotClick(event) {
  if (pickedSlotButton) {
    pickedSlotButton.style.backgroundColor = "#fff";
    pickedSlotButton.style.color = "#000";
  }
  const buttonText = event.target.textContent;
  event.target.style.backgroundColor = "#00aeff66";
  event.target.style.color = "#000";
  pickedSlotButton = event.target;
  let selectedvalue = document.getElementById("slot-booking").value;
  document.getElementById(
    "time-slot-selected"
  ).value = `${selectedvalue}-${buttonText}`;
}

function handleInputChange() {
  const dateInput = document.getElementById("dateInput").value;
  myDate = dateInput.split("-");
  var newDate = new Date(myDate[0], myDate[1] - 1, myDate[2]);
  document.getElementById(
    "date-selected"
  ).value = `${myDate[2]}-${myDate[1]}-${myDate[0]}`;
  const buttonText = pickedSlotButton.textContent;
  let selectedvalue = document.getElementById("slot-booking").value;
  document.getElementById(
    "time-slot-selected"
  ).value = `${selectedvalue}-${buttonText}`;
}
