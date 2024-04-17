<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "Decovaa";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];

    // Prepare SQL statement to check user credentials
    $stmt = $conn->prepare("SELECT id, password FROM " . ($userType === "Interior Designer" ? "designer" : "client") . " WHERE emailAddress = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_type'] = $userType;
            
            // Redirect to appropriate homepage
            if ($userType === "Interior Designer") {
                header("Location: Designer.html");
            } else {
                header("Location: clienthomepage.html");
            }
            exit;
            
        } else {
            // Incorrect password, redirect back with error message
            $_SESSION['login_error'] = "Incorrect email or password.";
            header("Location: LoginPage.php");
            exit;
        }
    } else {
        // User not found, redirect back with error message
        $_SESSION['login_error'] = "User not found.";
        header("Location: LoginPage.php");
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>