<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/shortcut-car.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/styles-slot.css" />
    <script src="scripts/script.js"></script>
    <script src="scripts/slot_script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Your script comes after including jQuery -->
<script>
  function handleSlotSubmit() {
    const dateSelected = document.getElementById("date-selected").value;
    const timeSelected = document.getElementById("time-slot-selected").value;
    $.ajax({
      type: "POST",
      url: "./php/book_slot.php",
      data: { dateSelected, timeSelected },
      dataType: 'json',
      success: function (response) {
        if (response.status === 'success') {
            alert(response.message);
        } else {
            // Error during slot booking, handle error case
            alert(response.message);
        }
      },
      error: function(xhr, status, error) {
        // Handle AJAX error
        alert("Something went wrong!")
        console.error(xhr.responseText);
    }
    });
  }
</script>
    <style>
       table {
        border-spacing: 3px; /* Add spacing between cells */
        }
      td {
        padding: 3px; /* Add padding inside cells */
        }
       input[disabled] {
        outline: none; 
        border: none;
  }
    </style>
    <title>Slot Booking</title>
  </head>
  <body>
    <nav class="container">
      <div style="height:100px" class="main-head">
        <div class="heading">
          <h3>Transport Management System</h3>
          <?php
            session_start();

            // Check if the user is logged in
            if (isset($_SESSION['employeeId'])) {
              // Access user details from the session
              $userDetails = $_SESSION['userDetails'];

              // Display user details
              echo "<p>Hi👋, " . $userDetails['employeeName'] . "!</p>";
            } else {
              // Redirect to the login page if not logged in
              header("Location: ../Registration.php");
              exit();
            }
          ?>
        </div>
      </div>

      <div class="log-out" title="Logout">
        <a href="./php/logout.php" target="_parent" class="log-out-butt">
          <img class="img-logout" src="./assets/logout.svg" alt="" />
        </a>
      </div>
    </nav>

    <div class="slot-container">
        <div class="side-nav">
              <ul>
                <li id="book" onClick="handleSideNav('book')">Book</li>
                <li id="bookings" onClick="handleSideNav('bookings')">Bookings</li>
              </ul>
        </div>  
    <div class="slot-body">
    
      <div class="slot-selection" id="slot-date-selection">
      <!-- <h3>Book Your Slot!</h3> -->
      <label for="slot" style="margin-right: 15px">PickUp type :</label>

      <select onchange="pickUporDrop()" name="slot-booking" id="slot-booking">
        <option value="" selected hidden>Choose here</option>
        <option value="pickup">Pick-Up Slot</option>
        <option value="drop">Drop Slot</option>
      </select>
    </div>

    <div class="date-slot" id="slots-book" name="slots-book">
      <div class="date-picker">
        <h3>Choose Date</h3>
        <input type="date" class="form-input" id="dateInput" onchange="handleDate()" />
      </div>
      <div class="slot-book">
        <h3>Please choose your slot!</h3>
        <div class="contain" id="pickup-slot">
          <button class="slot" >8 : 00 AM</button>
          <button class="slot" >8 : 30 AM</button>
          <button class="slot" >9 : 00 AM</button>
          <button class="slot" >9 : 30 AM</button>
          <button class="slot" >10 : 00 AM</button>
          <button class="slot" >10 : 30 AM</button>
        </div>

        <div class="contain" id="drop-slot">
          <button class="slot" >6 : 00 PM</button>
          <button class="slot" >6 : 30 PM</button>
          <button class="slot" >7 : 00 PM</button>
          <button class="slot" >7 : 30 PM</button>
          <button class="slot" >8 : 00 PM</button>
          <button class="slot" >8 : 30 PM</button>
        </div>

        <div class="view-details">
          <form class="form-group">
            <table class="tableData" >
              <tr>
                <td> <label for="dateSelected">Date:</label></td>
                <td> <input type="text" onchange="handleInputChange()"  id="date-selected" value="" name="dateSelected"></td>
              </tr>
              <tr>
                <td> <label for="timeSelected">Slot:</label></td>
                <td><input type="text" onchange="handleInputChange()" id="time-slot-selected" value="" name="timeSelected"></td>
              </tr>
            </table>

            <div>
              <button type="button" onClick="handleSlotSubmit()" class="bookking-btn">Book</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="employee-bookings-table">
    <?php
// Assuming $empId holds the specific employeeId value
$empId = $_SESSION['employeeId'];

// Create a database connection
$conn = new mysqli('localhost', 'root', '', 'transportdata');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query
$query = $conn->prepare("SELECT  dateSlot, timeSlot, status FROM slot_booking WHERE employeeId = ?");
$query->bind_param("s", $empId);
$query->execute();
$query->bind_result($dateSlot, $timeSlot, $status);

// Output table structure
echo '<table class="booking-table">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Date</th>
            <th>Time-Slot</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>';

// Counter for serial number
$serialNumber = 1;

// Fetch and display results
while ($query->fetch()) {
    echo '<tr>
            <td>' . $serialNumber++ . '</td>
            <td>' . $dateSlot . '</td>
            <td>' . $timeSlot . '</td>
            <td>' . $status . '</td>
          </tr>';
}

// Close the table structure
echo '</tbody></table>';

// Close the database connection
$query->close();
$conn->close();
?>

    </div>

          </div>
          </div>
  </body>
</html>
