<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate the input (you can add more validation as needed)
    if (empty($username) || empty($password)) {
        echo "Username and password are required!";
        exit;
    }

    // Connect to MySQL database
    $servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
    $username_db = "root"; // Change this to your MySQL username
    $password_db = ""; // Change this to your MySQL password
    $dbname = "a1training";

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement to insert data into the users table
    $sql = "INSERT INTO login (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Redirect to the blog folder
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
