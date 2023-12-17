<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// var_dump($_POST);

session_start();

// Check if the user is logged in
if (!isset($_SESSION['adminId'])) {
    // Redirect to the login page if not logged in
    header("Location: ../Registration.php");
    exit();
}

$employeeId = isset($_POST['employeeId']) ? $_POST['employeeId'] : '';

$conn = new mysqli('localhost', 'root', '', 'TransportData');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$stmt = $conn->prepare("Update slot_booking set status = 1 where employeeId = ?");
$stmt->bind_param("s", $employeeId);

$response = new stdClass(); // Initialize an object to store the response data

if ($stmt->execute()) {
    // Slot booked successfully
    $response->status = 'success';
    $response->message = 'Updated successfully!';
} else {
    // Slot booking failed
    $response->status = 'error';
    $response->message = 'Error:' .$stmt->error;
}

$stmt->close();
$conn->close();

// Send the JSON response
header('Content-Type: application/json; charset=utf-8');
header('Content-Length: ' . strlen(json_encode($response)));
echo json_encode($response);
exit();