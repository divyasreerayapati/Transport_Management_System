<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the login form
    $adminId = $_POST['id'];
    $passwordInput = $_POST['password'];
   

    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'TransportData');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        // Prepare and execute the SQL query to check login credentials
        $stmt = $conn->prepare("SELECT * FROM admin WHERE adminId=?  AND passwordInput=?");
        $stmt->bind_param("ss", $adminId, $passwordInput);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if a matching record is found
        if ($result->num_rows > 0) {
            $userDetails = $result->fetch_assoc();
            echo "<h1>Login Successful</h1>";
            $_SESSION['adminId'] = $adminId;
            $_SESSION['userDetails'] = $userDetails; 
            header("refresh:0;url= ../admin.php");
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
