<?php
include 'connection.php';
session_start();
// Get the user ID from the session
$uid = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    

    // Get the form data from the POST request
    $name = $_POST['name'];
    $course = $_POST['course'];
    $username = $_POST['username'];

    // Update the user information in the database
    $updateQuery = "UPDATE users SET name=?, course=?, username=? WHERE id=?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("sssi", $name, $course, $username, $uid);

    if ($stmt->execute()) {
        // Database update was successful
        $response = ["success" => true];
    } else {
        // Database update failed
        $response = ["success" => false];
    }

    // Return the response in JSON format
    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    // Handle non-POST requests or direct script access
    header("HTTP/1.0 403 Forbidden");
    echo "Access Denied";
}
?>
