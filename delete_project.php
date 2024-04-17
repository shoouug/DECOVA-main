<?php
// Check if project_id is set in the URL
if(isset($_GET['project_id'])) {
    // Get the project ID from the URL parameter
    $projectID = $_GET['project_id'];

    // Connect to the database
    $connection = mysqli_connect('localhost', 'root', 'root', 'decova');

    // Check connection
    if(!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Construct the SQL query to delete the project
    $sql = "DELETE FROM DesignPortoflioProject WHERE id = '$projectID'";

    // Execute the query
    if(mysqli_query($connection, $sql)) {
        // Project deleted successfully
        // Redirect back to the designer's homepage
        header("Location: Designer.php");
        exit(); // Make sure nothing else is executed after the redirection
    } else {
        // Error occurred while deleting the project
        echo "Error deleting project: " . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    // Redirect back to the designer's homepage if project_id is not set in the URL
    header("Location: Designer.php");
    exit(); // Make sure nothing else is executed after the redirection
}
?>
