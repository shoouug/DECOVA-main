<?php
session_start();

$connection = mysqli_connect('localhost', 'root', 'root', 'decova');
if(mysqli_connect_errno()) {
    die('Connection failed: ' . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input data
    $projectName = $_POST['name'];
    $designCategory = $_POST['category'];
    $designDescription = $_POST['designDescription'];

    // File upload handling
    $targetDirectory = "uploads/";

    // Append designer ID and timestamp to the filename
    $designerID = $_SESSION['designerID'];
    $filename = $designerID . '_' . time() . '_' . basename($_FILES["image"]["name"]);
    $targetFile = $targetDirectory . $filename;

    // Move the uploaded image to the target directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // Add project to the database
        //------------------------------------------------------------------------------------------------------
        // Retrieve designer's specialty design category ID
        $sql1 = "SELECT designCategoryID FROM DesignerSpeciality WHERE designerID = '$designerID'";
        $result = mysqli_query($connection, $sql1);
        $row = mysqli_fetch_assoc($result);
        $designCategoryID = $row['designCategoryID'];
        //------------------------------------------------------------------------------------------------------

        $sql = "INSERT INTO DesignPortoflioProject (designerID, projectName, projectImgFileName, description, designCategoryID)
                VALUES ('$designerID', '$projectName', '$filename', '$designDescription', '$designCategoryID')";

        if(mysqli_query($connection, $sql)) {
            header("location: Designer.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    mysqli_close($connection);
}
?>
