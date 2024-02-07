<?php
include 'config_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
    $user_email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Open a new connection
    $conn = new mysqli("localhost", "root", "", "dala");

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the statement
    $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, password) VALUES (?, ?, ?)");

    if (!$stmt) {
        die("Error: " . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param("sss", $user_name, $user_email, $password);

    // Execute the prepared statement
    if ($stmt->execute()) {
        
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Close the connection
    $conn->close();
}
?>
