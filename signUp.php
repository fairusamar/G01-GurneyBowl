<?php
// Check if the form was submitted
if (isset($_POST["submit"])) {
    // Validate and sanitize input data (you should improve validation as needed)
    $user = $_POST['Username'];
    $email = $_POST['Email'];
    $pass = password_hash($_POST ['Password'], PASSWORD_DEFAULT); // Hash the password for security
    $confirmpassword = $_POST['confirmPassword'];

    // Database connection settings
    $servername = "localhost"; // Change this if your database is on a different server
    $username = "root"; // Database username
    $password = ""; // Database password (consider storing securely)
    $dbname = "accounts"; // Database name
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into database
    $stmt = $conn->prepare("INSERT INTO customers (Username, Email, Password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $email, $pass);
    if ($stmt->execute()) {
      echo "<script>alert('Email registered');</script>";
  } else {
      echo "Error: " . $stmt->error;
  }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sign Up - Gurney Bowl Booking System</title>
    <link rel="shortcut icon" href="signIn/images/gbbslogo.png">

  <!-- Bootstrap CSS -->
  <link href="signUp/css/animate.css" rel="stylesheet">
  <link rel="stylesheet" href="signUp/css/bootstrap.min.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="signUp/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
<div class="container-fluid pl-0 pr-0 bg-img clearfix parallax-window2" data-parallax="scroll" >
  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="container"> 
      <!-- Brand --> 
      <a class="navbar-brand mr-auto" href="index.html"><img src="signUp/images/gbbslogo.png" alt="GBBS" width="100px" height="100px"/></a>
        
      
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon"></span> </button>
      
      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"> <a class="nav-link" href="eventpromo.html">Events &amp; Promotions</a> </li>
          <li class="nav-item"> <a class="nav-link" href="about.html">About Us</a> </li>
          <li class="nav-item"> <a class="nav-link" href="service.html">Services</a> </li>
          <li class="nav-item"> <a class="nav-link" href="index.html"#contact>Contact Us</a> </li>
            <div class="nav-booknow-btn">
            <li><a href="signup.html" class="btn text-uppercase btn-outline-danger btn-lg mb-3 wow"><b>BOOK NOW</b></a></li>
            </div>
        
        </ul>
        
      </div>
    </div>
  </nav>
</div>
    

  
  <!-- LOGIN FORM-->
  

<div class="containerLogin" id="containerLogin">
	<div class="form-container sign-up-container">
  <form id="signUp" action="" method="post" enctype="multipart/form-data">
    <h1>Sign Up</h1>

    <input type="text" name="Username" placeholder="Username" required>
    <input type="email" name="Email" placeholder="Email" required>
    <input type="password" name="Password" placeholder="Password" required>
    <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
    <button type = "submit" name = "submit" >Sign Up</button>
</form>

	</div>
	
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Join Us Today!</h1>
				<p>Join our community! Fill in your details to start your journey with us.</p>
				<p class="pNext"><br><br><br>Already a member? Sign in to access your account.</p>
				<a href="signIn.html"><button class="ghost" id="signIn" >Sign In</button></a>
			</div>
			
		</div>
	</div>
</div>
   

    

  <!-- FOOTER -->
    
<footer>
    <div class="footerContainer" id="contact">
        <h3><b>Contact us</b></h3>
        <a href="https://maps.app.goo.gl/wwUPAxJHTh6NFNvn8" target="_blank"><p>Level 6 Residensi UTMKL, Jalan Maktab, Kg. Datuk Keramat, 54100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p></a>
        
        <div class="socialIcons"> 
            <a href="https://www.facebook.com/GurneyBowl/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/gurneybowl/?hl=en" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.tiktok.com/@gurneybowlutmkl?_t=8na1alVKxHQ&_r=1" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
            <a href="https://api.whatsapp.com/send?phone=019-980%207821&text=Hi,%20Contacting%20for%20you%20listing" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
        <div class="footerNav">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="eventpromo.html">Events &amp; Promotions</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="service.html">Services</a></li>
                <li><a href="index.html#contact">Contact Us</a></li>
            </ul>
        </div>
    </div>
    <div class="footerBottom">
        <p>Copyright &copy;2024 - Gurney Bowl</p>
    </div>
</footer>

<!-- Optional JavaScript --> 
<!-- jQuery first, then Bootstrap JS, ... -->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/parallax.js"></script>
<script src="js/wow.js"></script>
<script src="js/main.js"></script>

<script>
    
    const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

    </script>
    
</body>
</html>