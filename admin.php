<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/styles-slot.css" />
    <link rel="stylesheet" href="css/admin_style.css" />
    <script src="./scripts/admin_script.js" ></script>
    <link
      rel="shortcut icon"
      href="assets/shortcut-car.png"
      type="image/x-icon"
    />
    <title>admin</title>
  </head>
  <body>
    <nav class="container">
      <div style="height:100px" class="main-head">
        <div class="heading">
          <h3>Welcome to, Transport Management System</h3>
          <?php
            session_start();

            // Check if the user is logged in
            if (isset($_SESSION['adminId'])) {
              // Access user details from the session
              $userDetails = $_SESSION['userDetails'];

              // Display user details
              echo "<p>Hi👋, " . $userDetails['adminName'] . "!</p>";
            } else {
              // Redirect to the login page if not logged in
              header("Location: ../Registration.php");
              exit();
            }
          ?>
        
      </div>
      <div class="log-out" title="Logout">
        <a href="./Registration.php" target="_parent" class="log-out-butt">
          <img class="img-logout" src="./assets/logout.svg" alt="" />
        </a>
      </div>
    </nav>

    <article class="admin-body">
      <div class="side-nav">
        <ul>
          <li id="activeLi" onClick="handleSideNavAdmin('active')">Active</li>
          <li id="completedLi" onClick="handleSideNavAdmin('completed')">Completed</li>
        </ul>
      </div>

        <div class="booking-details" id="active">
          <h2>Employee Booking Details</h2>
        <?php
        // Assuming $empId holds the specific employeeId value
        $adminId = $_SESSION['adminId'];

        // Create a database connection
        $conn = new mysqli('localhost', 'root', '', 'transportdata');

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL query
        $query = $conn->prepare("SELECT  employeeId, employeeName, orgName,dateSlot,timeSlot,empaddress FROM slot_booking WHERE status = 0");
        $query->execute();
        $query->bind_result($employeeId, $employeeName, $orgName,$dateSlot, $timeSlot, $empaddress);

        // Output table structure
        echo '<table class="booking-table">
                <thead>
                  <tr>
                  <th>S.No</th>
                    <th>Employee Name</th>
                    <th>Organization</th>
                    <th>Date</th>
                    <th>Slot</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>';

        // Counter for serial number
        $serialNumber = 1;

        // Fetch and display results
        while ($query->fetch()) {
            echo '<tr>
                    <td>' . $serialNumber++ . '</td>
                    <td>' . $employeeName . '</td>
                    <td>' . $orgName . '</td>
                    <td>' . $dateSlot . '</td>
                    <td>' . $timeSlot . '</td>
                    <td>' . $empaddress . '</td>
                    <td><button class="done-button">Complete</button>
                  </tr>';
        }

        // Close the table structure
        echo '</tbody></table>';

        // Close the database connection
        $query->close();
        $conn->close();
?>

      </div>

      <div class="booking-details" id="completed">
          <h2>Booking Completed Records</h2>
        <?php
        // Assuming $empId holds the specific employeeId value
        $adminId = $_SESSION['adminId'];

        // Create a database connection
        $conn = new mysqli('localhost', 'root', '', 'transportdata');

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL query
        $query = $conn->prepare("SELECT  employeeId, employeeName, orgName,dateSlot,timeSlot,empaddress FROM slot_booking WHERE status = 1");
        $query->execute();
        $query->bind_result($employeeId, $employeeName, $orgName,$dateSlot, $timeSlot, $empaddress);

        // Output table structure
        echo '<table class="booking-table">
                <thead>
                  <tr>
                  <th>S.No</th>
                    <th>Employee Name</th>
                    <th>Organization</th>
                    <th>Date</th>
                    <th>Slot</th>
                    <th>Address</th>
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
                    <td>' . $employeeName . '</td>
                    <td>' . $orgName . '</td>
                    <td>' . $dateSlot . '</td>
                    <td>' . $timeSlot . '</td>
                    <td>' . $empaddress . '</td>
                    <td>Completed</td>
                  </tr>';
        }

        // Close the table structure
        echo '</tbody></table>';

        // Close the database connection
        $query->close();
        $conn->close();
?>

      </div>

    </article>
  </body>
</html>
