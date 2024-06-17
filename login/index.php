<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<section id="top">
    <div class="top-box container-fluid">
        <div class="login-box">
            <div class="login">
                <h1 id="login-text">Login</h1>
            </div>
            <br>
            <form method="post" action=" "> <!-- Assuming process_login.php is the PHP file to handle form submission -->
                <div class="details">
                    <label id="user-text">username -  </label>
                    <input type="text" id="username" name="username"> <!-- Add name attribute for accessing in PHP -->
                </div>
                <div class="details2">
                    <label id="pass-text">password -  </label>
                    <input type="password" id="password" name="password"> <!-- Add name attribute for accessing in PHP and change input type to password for security -->
                </div>
                <div>
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</section>

</body>

</html>
<?php
// Start session to store user login status
session_start();

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

    // Prepare SQL statement to fetch user details based on username
    $sql = "SELECT id, username, password FROM login WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user with the given username exists
    if ($result->num_rows == 1) {
        // Fetch the user details
        $row = $result->fetch_assoc();

        // Verify the password
       // if (password_verify($password, $row["password"])) {
            // Password is correct, set session variables and redirect to dashboard or any other page
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            header("Location: blog"); // Redirect to dashboard page
            exit;
       // } else {
            // Password is incorrect
            echo "<script>alert('Password is incorrect');</script>"; // Corrected syntax
       // }
    } else {
        // No user found with the given username
        echo "User not found!";
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
