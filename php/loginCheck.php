<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the login form
    $employeeId = $_POST['id'];
    $password = $_POST['password'];
    $orgName = $_POST['orgName'];

    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'TransportData');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        // Prepare and execute the SQL query to check login credentials
        $stmt = $conn->prepare("SELECT * FROM Employee WHERE employeeId=? AND orgName=? AND passwordEntered=?");
        $stmt->bind_param("sss", $employeeId, $orgName, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if a matching record is found
        if ($result->num_rows > 0) {
            echo "<h1>Login Successful redirecting to Slot booking</h1>";
    $userDetails = $result->fetch_assoc();
    $_SESSION['employeeId'] = $employeeId;
    $_SESSION['userDetails'] = $userDetails;
    $_SESSION['userDetails'] = $userDetails; // Store user details in the session
            header("refresh:0;url= ../slot_Booking.php");
            // Perform additional actions if needed (e.g., session management, redirect)
        } else {
            echo "<h1>Login Failed. Invalid credentials</h1>";
            header("refresh:1;url= ../Registration.php");
        }

        $stmt->close();
        $conn->close();
    }
}
?>
