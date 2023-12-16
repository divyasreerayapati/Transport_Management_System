<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// var_dump($_POST);

session_start();

// Check if the user is logged in
if (!isset($_SESSION['employeeId'])) {
    // Redirect to the login page if not logged in
    header("Location: ../Registration.php");
    exit();
}

// Access user details from the session
$userDetails = $_SESSION['userDetails'];

// Get form data
$dateSelected = isset($_POST['dateSelected']) ? $_POST['dateSelected'] : '';
$timeSelected = isset($_POST['timeSelected']) ? $_POST['timeSelected'] : '';

$conn = new mysqli('localhost', 'root', '', 'TransportData');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve organization name and employee address from the 'employee' table
$employeeQuery = $conn->prepare("SELECT orgName, empaddress FROM employee WHERE employeeId = ?");
$employeeQuery->bind_param("s", $userDetails['employeeId']);
$employeeQuery->execute();
$employeeQuery->bind_result($organizationName, $employeeAddress);

// Fetch the result
if ($employeeQuery->fetch()) {
    $employeeQuery->close();
} else {
    // Handle the case where the organization name and address are not found
    $employeeQuery->close();
    $conn->close();
    $_SESSION['slotBookedMessage'] = "Error: Organization name or employee address not found.";
    header("Location: ../slot_Booking.php");
    exit();
}


$existingBookingsQuery = $conn->prepare("SELECT COUNT(*) FROM slot_booking WHERE employeeId = ? AND status = 0");
$existingBookingsQuery->bind_param("s", $userDetails['employeeId']);
$existingBookingsQuery->execute();
$existingBookingsQuery->bind_result($existingBookingsCount);
$existingBookingsQuery->fetch();
$existingBookingsQuery->close();

if ($existingBookingsCount > 0) {
    $response = new stdClass();
    $response->status = 'bad_request';
    $response->message = 'Cannot book a new slot. You have existing booking which are incomplete.';
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response);
    exit();
}

// Prepare and execute the SQL query to insert data into the slot_booking table
$stmt = $conn->prepare("INSERT INTO slot_booking (employeeId, employeeName, orgName, empaddress, timeSlot, dateSlot) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $userDetails['employeeId'], $userDetails['employeeName'], $organizationName, $employeeAddress, $timeSelected, $dateSelected);

$response = new stdClass(); // Initialize an object to store the response data

if ($stmt->execute()) {
    // Slot booked successfully
    $response->status = 'success';
    $response->message = 'Slot booked successfully!';
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

exit();
