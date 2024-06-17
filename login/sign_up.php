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
                <h1 id="login-text">Sign Up</h1>
            </div>
            <br>
            <form method="post" action="process_login.php"> <!-- Assuming process_login.php is the PHP file to handle form submission -->
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