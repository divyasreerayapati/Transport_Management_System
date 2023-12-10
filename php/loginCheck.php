<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the login form
    $id = $_POST['id'];
    $password = $_POST['password'];
    $orgName = $_POST['orgName'];

    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'TransportData');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        // Prepare and execute the SQL query to check login credentials
        $stmt = $conn->prepare("SELECT * FROM Employee WHERE id=? AND orgName=? AND passwordEntered=?");
        $stmt->bind_param("sss", $id, $orgName, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        // $rows = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        $conn->close();
        // Check if a matching record is found
        if ($result->num_rows > 0) {
            echo "<h1>Login Successful</h1>";
            $_SESSION['employee_id'] = $id;
            $employee_id = $_SESSION['employee_id'];
            header("refresh:10;url= ../slot_Booking.html");
        
            // Perform additional actions if needed (e.g., session management, redirect)
        } else {
            echo "<h1>Login Failed. Invalid credentials</h1>";
            header("refresh:1;url= ../Registration.html");
        }


    }
}

?>
