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
    $brandName = $_POST['brandName'];
    $targetFile = "";

    // File upload handling
    if(isset($_FILES["brandLogo"]) && $_FILES["brandLogo"]["error"] == 0) {
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($_FILES["brandLogo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check file size
        if ($_FILES["brandLogo"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow only specific file types
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedExtensions)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["brandLogo"]["tmp_name"], $targetFile)) {
                echo "The file " . htmlspecialchars(basename($_FILES["brandLogo"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file uploaded for brandLogo.";
    }

    // Process categories
    if (isset($_POST['categories'])) {
        $categories = implode(", ", $_POST['categories']); 
    } else {
        $categories = ""; 
    }

    // Insert data into database
    $sql = "INSERT INTO designer (firstName, lastName, email, password, brandName, designCategories, brandLogo)
    VALUES ('$firstName', '$lastName', '$email', '$hashedPassword', '$brandName', '$categories', '$targetFile')";

    if ($conn->query($sql) === TRUE) {
        // Set session variables
        $_SESSION['user_id'] = $conn->insert_id; // User's ID
        $_SESSION['user_type'] = "designer"; // User's type

        header("Location: Designer.php");
        exit(); // Exit after redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
 