let selectedSlotButton = null;

function handleSlotClick(button) {
  // Unselect the previously selected button (if any)
  if (selectedSlotButton) {
    selectedSlotButton.classList.remove("selected");
  }

  // Select the clicked button
  button.classList.add("selected");
  selectedSlotButton = button;

  // Optionally, do something with the selected slot (e.g., update a hidden input field)
  document.getElementById("time-slot-selected").value = button.textContent;
}
