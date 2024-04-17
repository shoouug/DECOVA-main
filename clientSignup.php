<?php
session_start(); // Start the session 

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Decovaa";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Assuming the signup inserts data into the 'client' table
    $sql = "INSERT INTO client (firstName, LastName, emailAddress, password) VALUES ('$firstName', '$lastName', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        // Set session variables
        $_SESSION['user_id'] = $conn->insert_id; // User's ID
        $_SESSION['user_type'] = "client"; // User's type

        header("Location: clienthomepage.php");
        exit(); // Exit after redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
