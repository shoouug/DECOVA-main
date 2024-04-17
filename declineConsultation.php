<?php
session_start();

// Establish database connection
$connection = mysqli_connect('localhost', 'root', 'root', 'decova');
if(mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Check if the requestID is set in the URL
if(isset($_GET['statusID'])) {
    // Sanitize the input to prevent SQL injection
    $statusID = $_GET['statusID'];
    
    $sql = "UPDATE requeststatus 
    SET status='consultation declined'
    WHERE id='$statusID'";



    // Execute the query
    if(mysqli_query($connection, $sql)) {
        // Redirect to the designer's homepage
        header("Location: Designer.php");
        exit();
    } else {
        // Display error message if the query fails
        echo "Error updating record: " . mysqli_error($connection);
    }
} else {
    // Redirect to homepage if requestID is not provided
    header("Location: Designer.php");
    exit();
}

?>