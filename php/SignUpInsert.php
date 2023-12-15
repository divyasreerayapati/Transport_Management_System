<?php

    $employeeId = $_POST['empidregister'];
    $employeeName = $_POST['employeename'];
    $emailId = $_POST['emailregister'];
    $orgName = $_POST['orgNameregister'];
    $empaddress = $_POST['address'];
    $passwordEntered = $_POST['passwordtype1'];
    // Database Connection

    $conn = new mysqli('localhost', 'root', '', 'TransportData');
    if ($conn->connect_error) {
        echo "<h1>Connection error</h1>"; 
        die('Connection Failed : ' . $conn->connect_error);
    } else {
        echo "<h1>Successful</h1>"; 
        $stmt = $conn->prepare("INSERT INTO Employee (employeeId,employeeName, emialId,orgName,empaddress,passwordEntered) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $employeeId,$employeeName, $emailId,$orgName,$empaddress,$passwordEntered);
        $stmt->execute();
        // echo "<h1>Registration successfully done.</h1>";
        $stmt->close();
        $conn->close();
        echo"<h1>Registration Successfull, Please Login</h1>";
        header("refresh:2;url= ../Registration.php");
        
        exit();
    }
?>
