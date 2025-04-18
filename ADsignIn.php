<!doctype html>
<!--
	Fox by FreeHTML5.co
	Twitter: https://twitter.com/fh5co
	Facebook: https://fb.com/fh5co
	URL: https://freehtml5.co
-->
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sign In - Gurney Bowl Booking System</title>
    <link rel="shortcut icon" href="adminpages/ADsignIn/images/gbbslogo.png">

  <!-- Bootstrap CSS -->
  <link href="adminpages/ADsignIn/css/animate.css" rel="stylesheet">
  <link rel="stylesheet" href="adminpages/ADsignIn/css/bootstrap.min.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="adminpages/ADsignIn/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
<div class="container-fluid pl-0 pr-0 bg-img clearfix parallax-window2" data-parallax="scroll" >
  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="container"> 
      <!-- Brand --> 
      <a class="navbar-brand mr-auto" href="index.php"><img src="signIn/images/gbbslogo.png" alt="GBBS" width="100px" height="100px"/></a>
        
      
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon"></span> </button>
      
      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"> <a class="nav-link" href="eventpromo.html">Events &amp; Promotions</a> </li>
          <li class="nav-item"> <a class="nav-link" href="about.html">About Us</a> </li>
          <li class="nav-item"> <a class="nav-link" href="service.html">Services</a> </li>
          <li class="nav-item"> <a class="nav-link" href="index.php"#contact>Contact Us</a> </li>
           
        
        </ul>
        
      </div>
    </div>
  </nav>
</div>
    

    <!-- LOGIN FORM-->
<div class="containerLogin" id="containerLogin">
	
	<div class="form-container sign-in-container">
  <form action="php/login.php" method="post">
		<form action="#">
			<h1><i class="fa fa-user"></i></h1>
			<h1>Admin Sign In</h1>

      <?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>
        
			<input type="email" placeholder="Email" name="uname"
      value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>"> 
			<input type="password" placeholder="Password" name="pass">
			<a href="Adreset-pass.php"><i>Forgot your password?</i></a>
			<button type="submit">Sign In</button>
			<p>Not an admin?<a href="SignIn.php"> Sign In as User</a></p>
		</form>
  </form>2
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				
				<h1>Welcome, Admin!</h1>
				<p>To manage the system, please log in with your admin credentials.</p>
               <p class="pNext"><br><br><br>Access is limited to authorized personnel.</p>
                
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