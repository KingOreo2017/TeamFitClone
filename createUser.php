<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login to TeamFit </title> 
    <link rel="stylesheet" href="styles.css"> <!-- Link to the CSS file -->
    <link href="layout.css" rel="stylesheet" >
    <script src="functions.js"></script>
    <style>
        body {
            background-image: url("Photos/Fit.png");
            background-size: cover; /* Ensures the image covers the entire background */
            background-repeat: no-repeat; /* Prevents the image from repeating */
            background-position: center; /* Centers the image */
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div style="text-align: center;">
            <h1>Log in to TeamFit</h1>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="sidebar"></div>
        <div class="content">
            <div class="box-container">
                <div class="box">
                    <h1> Login </h1>
                    <div class="login-container">
                        <form action="createUser.php" method="post"> <!-- Point to the PHP script -->
                            <input type="text" name="username" placeholder="Username" required> <!-- Add 'name' attributes -->
                            <input type="password" name="password" placeholder="Password" required> <!-- Add 'name' attributes -->
                            <button type="submit">Login</button> <!-- Update login-button to a standard button -->
                        </form>
                    </div>
                </div>
    
                <div class="box">
                    <h1>Create Account</h1>
                    <button> Create Account
                        <a href="createAccountPage.html"></a>
                    </button>
                </div>
            </div>
        </div>
        <div class="sidebar"></div>
    </div>

    <!-- Footer -->
    <footer>
        <p> TeamFit. </p>
    </footer>
</body>
</html>




<?php

// Database connection details
$host = "65.24.35.108:3360"; // Host address with port
$username = "WebApp";        // Database username
$password = "BPAteam123";    // Database password
$database = "schoolTeams";   // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user data from form
    $newUsername = $_POST['username'];
    $newPassword = $_POST['password'];

    // Sanitize input (important!)
    $newUsername = mysqli_real_escape_string($conn, $newUsername);
    $newPassword = mysqli_real_escape_string($conn, $newPassword);

    // Create user query
    $sql = "CREATE USER '$newUsername'@'%' IDENTIFIED BY '$newPassword'";

    if ($conn->query($sql) === TRUE) {
        echo "New user created successfully!";
    } else {
        echo "Error creating user: " . $conn->error;
    }
}

// Close connection
$conn->close();

?>

