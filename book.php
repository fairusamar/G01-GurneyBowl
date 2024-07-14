<?php 
session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['Email'])) {

include "custdb_conn.php";
include "php/customer.php";
$user = getUserById($_SESSION['ID'], $conn);


 ?>
<!doctype html>
<!--
	Fox by FreeHTML5.co
	Twitter: https://twitter.com/fh5co
	Facebook: https://fb.com/fh5co
	URL: https://freehtml5.co
-->
<html lang="en">
<head>
 
 <style type="text/css">
    	
  /*BOOKING CSS*/   
     
     body {
    margin: 0;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
     }
     
     .row{
         justify-content: center;
     }
     .container{
         padding-bottom: 50px;
     }    

     .account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
     }

     .account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
     }

     .account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
     }

     .account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
     }

     .account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
     }

     .account-settings .about {
    margin: 1rem 0 0 0;
    text-align: center;
     }
     
     .account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #dc3545;
         font-size: 17px;
     }
     .account-settings .about a h5:hover{
    color: midnightblue;
         text-decoration: underline;
         font-weight: bold;
         transition: 0.5s;
     }

     .account-settings .about p {
    font-size: 0.825rem;
     }

     .form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
     }
     
     .form-group i{
         padding-right: 10px;
         font-size: 20px;
         
         color: #8F0040;
     }
     .form-group label{
         font-weight: bold;
         text-transform: uppercase;
         font-size: 16px;
         letter-spacing: 1px;
     }
     
     
     .form-group .time span{
         font-weight: normal;
         text-transform: capitalize;
         letter-spacing: normal;
         font-size: 15px;
         justify-content: space-evenly;
         color: #2e323c;
     }

     .card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
     }
     .row .gutters .userheader h6{
         padding-bottom: 20px;
         font-size: 30px;
         font-weight: 800;
         color: #dc3545 !important;
         font-weight: bolder !important;
     }
     
     .btn{
         position: relative;
         bottom: 10px;
         right: 10px;
     }
     .btn-primary {
         font-weight: bold !important;
        color: black!important;
        background-color: #FFC800 !important;
        border-color: #FFC800 !important;
         
     }
     .btn-primary:hover{
         font-weight: bold;
        color: red!important;
        background-color: #FFD747 !important;
        border-color: #FFD747!important;
         transition: 0.2s;
     }
     .btn-secondary:hover{
         color: black !important;
        background-color: lightgrey!important;
        border-color: lightgrey !important;
         transition: 0.2s;
     }
     
     /*TIME RADIO BUTTON CSS*/
     
     .timeradio{
         display: flex;
     }
     input[type="radio"]{
         display: none;
     }
     label{
         display: block;
         cursor: pointer;
         font-weight: 400;
         margin-bottom: 10px;
     }
     label span{
         display: inline-flex;
         align-items: center;
         padding: 10px 20px 10px 10px;
         border-radius: 59px;
         transition: .25s ease;
     }
     label span:hover{
         background-color: #d6d6e5;
     }
     label span:before{
         content: "";
         background-color: white;
         width: 15px;
         height: 15px;
         border-radius: 50%;
         margin-right: 10px;
         transition: .25s ease;
         box-shadow: inset 0 0 0 2px #00005c;
     }
     input[type="radio"]:checked + span:before{
         box-shadow: inset 0 0 0 10px #00005c;
         
     }
     
     /*RESPONSIVE WEB DESIGN*/
     @media only screen and (min-width: 600px) {
  /* For tablets: */
  .col-s-1 {width: 8.33%;}
  .col-s-2 {width: 16.66%;}
  .col-s-3 {width: 25%;}
  .col-s-4 {width: 33.33%;}
  .col-s-5 {width: 41.66%;}
  .col-s-6 {width: 50%;}
  .col-s-7 {width: 58.33%;}
  .col-s-8 {width: 66.66%;}
  .col-s-9 {width: 75%;}
  .col-s-10 {width: 83.33%;}
  .col-s-11 {width: 91.66%;}
  .col-s-12 {width: 100%;}
}
@media only screen and (min-width: 768px) {
  /* For desktop: */
  .col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
  .col-3 {width: 25%;}
  .col-4 {width: 33.33%;}
  .col-5 {width: 41.66%;}
  .col-6 {width: 50%;}
  .col-7 {width: 58.33%;}
  .col-8 {width: 66.66%;}
  .col-9 {width: 75%;}
  .col-10 {width: 83.33%;}
  .col-11 {width: 91.66%;}
  .col-12 {width: 100%;}
}
     


    </style>
 
 
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Profile - Gurney Bowl Booking System</title>
    <link rel="shortcut icon" href="about/images/gbbslogo.png">

  <!-- Bootstrap CSS -->
  <link href="customerpages/profile/css/animate.css" rel="stylesheet">
  <link rel="stylesheet" href="customerpages/profile/css/bootstrap.min.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="customerpages/profile/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    
    
</head>
<body>
<?php if ($user) { ?>

<div class="container-fluid pl-0 pr-0 bg-img clearfix parallax-window2" data-parallax="scroll" >
  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="container"> 
      <!-- Brand --> 
      <a class="navbar-brand mr-auto" href="CUSTindex.php"><img src="about/images/gbbslogo.png" alt="GBBS" width="100px" height="100px"/></a>
        
      
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon"></span> </button>
      
      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"> 
              <a class="nav-link" href="CUSTeventpromo.html">Events &amp; Promotions</a> 
          </li>
          <li class="nav-item"> 
              <a class="nav-link" href="CUSTabout.html">About Us</a> 
          </li>
          <li class="nav-item"> 
              <a class="nav-link" href="CUSTservice.html">Services</a> 
          </li>
          <li class="nav-item"> 
              <a class="nav-link" href="#contact">Contact Us</a> 
            </li>  
              <li class="nav-item"> 
              <a class="nav-link" href="CUSTviewprofile.php"><i class="userdropdown fa fa-user-circle" style = "font-size: 35px"></i></a> 
            </li>      
        </ul>
        
      </div>
    </div>
  </nav>

</div>


<!--BOOKING-->

<div class="container">
    <div class="row gutters">
       
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="userheader">
                        <form action="php/bookfunc.php" 
                            method="post">
                       <h6 class="mb-2 text-primary" style="text-align: center;">BOOK YOUR LANE<hr></h6>
                       <!-- error -->
                        <?php if(isset($_GET['error'])){ ?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['error']; ?>
                        </div>
                        <?php } ?>
            
                        <!-- success -->
                        <?php if(isset($_GET['success'])){ ?>
                        <div class="alert alert-success" role="alert">
                        <?php echo $_GET['success']; ?>
                        </div>
                        <?php } ?>
                   </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                       <i class="fa fa-calendar"></i>
                        <label for="date">Preferred Date</label>
                        <div class="DOB">
                            <input type="date" class="form-control" name="dp">
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                       <i class="fa fa-user"></i>
                        <label for="number">Number of Pax</label>
                        <input type="number" class="form-control" id="quantity" min="1" max="100" 
                        placeholder="Enter number of people" name="pax">
                    </div>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                    <i class="fa fa-clock"></i>
                    <label for="website">Preferred Time</label>
                        <div class="timeradio">
                           <div class="form-group">
                            <label class="time">
                                <input type="radio" id="male" name="time" value="10:00 AM">
                                <span>10:00 AM</span>
                            </label>
                            <label class="time">
                                <input type="radio" id="male" name="time" value="10:30 AM">
                                <span>10:30 AM</span>
                            </label>
                            <label class="time">
                                <input type="radio" id="female" name="time" value="11:00 AM">
                                <span>11:00 AM</span>
                            </label>
                            <label class="time">
                                <input type="radio" id="female" name="time" value="11:30 AM">
                                <span>11:30 AM</span>
                            </label>
                            <label class="time">
                                <input type="radio" id="female" name="time" value="12:00 PM">
                                <span>12:00 PM</span>
                            </label>
                            <label class="time">
                                <input type="radio" id="female" name="time" value="12:30 PM">
                                <span>12:30 PM</span>
                            </label>
                            <label class="time">
                                <input type="radio" id="female" name="time" value="1:30 PM">
                                <span>1:30 PM</span>
                            </label>
                            <label class="time">
                                <input type="radio" id="female" name="time" value="2:30 PM">
                                <span>2:30 PM</span>
                            </label>
                            <label class="time">
                                <input type="radio" id="female" name="time" value="4:00 PM">
                                <span>4:00 PM</span>
                            </label>
                            <label class="time">
                                <input type="radio" id="female" name="time" value="6:30 PM">
                                <span>6:30 PM</span>
                            </label>
                        </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                       <i class="fas fa-shoe-prints"></i>
                        <label for="number">Number of Bowling Shoes</label>
                        <input type="number" class="form-control" id="quantity"min="1" max="100"
                        placeholder="Enter number of bowling shoes" name="bowlshoes">
                    </div>

                      <div class="form-group">
                       <i class="fa fa-bowling-ball"></i>
                        <label for="number">Number of Lane</label>
                        <input type="number" class="form-control" id="quantity"min="1" max="10" 
                        placeholder="Enter number of lane" name="num_lane">
                    </div>
                    
                    <div class="form-group">
                    <i class="fa fa-envelope"></i>
                        <label for="eMail">Email Address</label>
                        <input type="email" class="form-control" id="eMail" placeholder="Enter email address"
                        name="Email">
                    </div>
                </div>
                
                
                </div>
               
                
                
                
            </div>
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                            <button type="button" id="submit" name="cancel" class="btn btn-secondary"><a href="CUSTindex.php">Cancel</a></button>
                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Continue</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- FOOTER -->
    
<footer>
    <div class="footerContainer" id="contact">
        <h3><b>Contact us</b></h3>
        <a class="address" href="https://maps.app.goo.gl/wwUPAxJHTh6NFNvn8" target="_blank"><p>Level 6 Residensi UTMKL, Jalan Maktab, Kg. Datuk Keramat, 54100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p></a>
        
        <div class="socialIcons"> 
            <a href="https://www.facebook.com/GurneyBowl/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/gurneybowl/?hl=en" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.tiktok.com/@gurneybowlutmkl?_t=8na1alVKxHQ&_r=1" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
            <a href="https://api.whatsapp.com/send?phone=019-980%207821&text=Hi,%20Contacting%20for%20you%20listing" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
        <div class="footerNav">
            <ul>
                <li><a href="CUSTindex.html">Home</a></li>
                <li><a href="CUSTeventpromo.html">Events &amp; Promotions</a></li>
                <li><a href="CUSTabout.html">About Us</a></li>
                <li><a href="CUSTservice.html">Services</a></li>
                <li><a href="CUSTindex.html#contact">Contact Us</a></li>
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

<?php }else { 
     header("Location: CUSTindex.php");
     exit;
    } ?>

</body>
</html>

<?php } else {
	header("Location: index.php");
	exit;
} ?>