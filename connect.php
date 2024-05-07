<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function connectToDatabase() {
    $host = "localhost"; // Change this if your database is hosted on a different server
    $database = "the_musineers";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function closeDatabaseConnection($conn) {
    // Close the database connection
    $conn->close();
}

function loginUser() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login-sub-btn"])) {
        $email = $_POST["email"] ?? "";
        $password = $_POST["password"] ?? "";

        if (empty($email) || empty($password)) {
            echo "Email and password fields are required.";
            return;
        }

        $conn = connectToDatabase();

        // Prepare and bind a statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM registration WHERE email=? AND password=?");
        $stmt->bind_param("ss", $email, $password);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Login successful, redirect to home page
            header("Location: home.html"); // Change "home.html" to the correct path of your home page
            exit;
        } else {
            echo "Invalid login credentials.";
        }

        // Close the prepared statement and database connection
        $stmt->close();
        closeDatabaseConnection($conn);
    }
}

function registerUser() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register-sub-btn"])) {
        $fullname = $_POST["fullname"] ?? "";
        $email = $_POST["email"] ?? "";
        $password = $_POST["password"] ?? "";

        if (empty($fullname) || empty($email) || empty($password)) {
            echo "All fields are required.";
            return;
        }

        $conn = connectToDatabase();

        // Prepare and bind a statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO registration (fullname, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fullname, $email, $password);

        if ($stmt->execute()) {
            // Registration successful, redirect to login page
            header("Location: index.html#dhacc"); // Change "index.html" to the correct path of your login page
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement and database connection
        $stmt->close();
        closeDatabaseConnection($conn);
    }
}

// Check if the script is accessed via the web server
if (isset($_SERVER["REQUEST_METHOD"])) {
    loginUser();
    registerUser();
}
?>
