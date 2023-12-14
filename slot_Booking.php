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
              header("Location: ../Registration.html");
              exit();
            }
          ?>
        </div>
      </div>

      <div class="log-out" title="Logout">
        <a href="php/logout.php" target="_parent" class="log-out-butt">
          <img class="img-logout" src="./assets/logout.svg" alt="" />
        </a>
      </div>
    </nav>

    <div class="slot-selection">
      <label for="slot" style="margin-right: 15px">Book your slot :</label>

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
                <td> <input type="text" disabled="true" id="date-selected" value="" name="dateSelected"></td>
              </tr>
              <tr>
                <td> <label for="timeSelected">Slot:</label></td>
                <td>  <input type="text" disabled="true" id="time-slot-selected" value="" name="timeSelected"></td>
              </tr>
            </table>

            <div>
              <button type="submit" class="bookking-btn">Book</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
