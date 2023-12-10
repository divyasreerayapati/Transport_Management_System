<?php

    $id = $_POST['empidregister'];
    $emialId = $_POST['emailregister'];
    $orgName = $_POST['orgNameregister'];
    $passwordEntered = $_POST['passwordtype1'];
    // Database Connection

    $conn = new mysqli('localhost', 'root', 'divyasree', 'TransportData ');
    if ($conn->connect_error) {
        echo "<h1>Connection error</h1>"; 
        die('Connection Failed : ' . $conn->connect_error);
    } else {
        echo "<h1>Successful</h1>"; 
        $stmt = $conn->prepare("INSERT INTO Employee (id, emialId,orgName,passwordEntered) VALUES (?, ?,?,?)");
        $stmt->bind_param("ssss", $id, $emialId,$orgName,$passwordEntered);
        $stmt->execute();
        echo "<h1>Registration successfully done.</h1>";
        $stmt->close();
        $conn->close();
    }
?>
