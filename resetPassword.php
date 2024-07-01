<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data (you should improve validation as needed)
    $username = htmlspecialchars($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    // Database connection settings
    $servername = "localhost"; // Change this if your database is on a different server
    $username_db = "root"; // Database username
    $password_db = ""; // Database password (consider storing securely)
    $dbname = "accounts"; // Database name

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into database
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Signup successful!"; // Success message to be displayed on the page
    } else {
        echo "Error: " . $stmt->error; // Error message in case of failure
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!doctype html>
<html lang="en-US">
<head>
    <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GBBS - Gurney Bowl Booking System</title>
    <link rel="shortcut icon" href="images/gbbslogo.png">

  <!-- Bootstrap CSS -->
  <link href="css/animate.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<!-- Main Container -->
<div class="container"> 
    <!-- Navigation -->
    <header> 
        <a href="">
            <h5 class="logo">GURNEY BOWL</h5>
        </a>
        <nav>
            <ul>
                <li><a href="#about" style="font-family: 'Courier New', monospace; font-size: 25px; color: white;">ABOUT</a></li>
                <li><a href="#services" style="font-family: 'Courier New', monospace; font-size: 25px; color: white;">SERVICES</a></li>
                <li><a href="#contact" style="font-family: 'Courier New', monospace; font-size: 25px; color: white;">CONTACT US</a></li>
            </ul>
        </nav>
    </header>

    <!-- Centered Sign-Up Form -->
    <div class="center">
        <div class="form-container">
            <h1>Sign Up</h1>
            <form id="signUpInForm" onsubmit="handleSubmit(event)" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('password')">👁</span>

                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('confirmPassword')">👁</span>
                
                <input type="submit" value="Sign Up">
                <p id="message" style="display:none; color: rgb(88, 0, 0);"></p>
            </form>
        </div>
    </div>
    
    <!-- About Section -->
    <section class="about" id="about">
        <h2 class="hidden">About</h2>
    </section>
    
    <!-- Stats Gallery Section -->
    <!-- Parallax Section -->
    <!-- More Info Section -->
    <footer>
        <article class="footer_column">
        </article>
    </footer>
    
    <!-- Footer Section -->
    <section class="footer_banner" id="contact">
        <h2 class="hidden">Footer Banner Section </h2>
        <p class="hero_header">VIEW EVENTS & PROMOTIONS</p>
        <div class="button">subscribe</div>
    </section>
    
    <!-- Copyrights Section -->
    <div class="copyright">&copy;2024- <strong>Residensi UTMKL</strong></div>

    <div class="location">
        <p>Address</p>
    </div>
</div>
<!-- Main Container Ends -->

<script>
function handleSubmit(event) {
    event.preventDefault(); // Prevent form from submitting the traditional way
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    fetch('/signup', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ username, email, password })
    })
    .then(response => response.text())
    .then(data => {
        const message = document.getElementById('message');
        message.style.display = 'block';
        message.textContent = data;
        document.getElementById('signUpInForm').reset();
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function togglePasswordVisibility(id) {
    const passwordField = document.getElementById(id);
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
    } else {
        passwordField.type = 'password';
    }
}
</script>
<php>
    </php>
</body>
</html>
