<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {

include "Addb_conn.php";
include 'php/User.php';
$user = getUserById($_SESSION['id'], $conn);


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/adstyle.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php if ($user) { ?>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="AdminDashboard.php"><img src="logo.jpg" style="width:42px; height: 42px;"
        >GURNEY BOWL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="AdminDashboard.php">Dashboard</a></li>
        <li><a href="AdminBookingHistory.html">Booking History</a></li>
        <li><a href="#">Customer List</a></li>
        <li><a href="#section4">Events</a></li>
        <li><a href="#section5">Availability</a></li>
        <li><a href="AdminProfile.php">Profile</a></li>
        <li><a href="ADDAd.php">Add New Profile</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs" id="wuttheside">
      <h2><a href="AdminDashboard.php"><img src="logo.jpg" style="width:45px; height: 45px;"
        ></a>GURNEY BOWL</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="AdminDashboard.php">Dashboard</a></li>
        <li><a href="AdminBookingHistory.html">Booking History</a></li>
        <li><a href="#section3">Customer List</a></li>
        <li><a href="#section4">Events</a></li>
        <li><a href="#section5">Availability</a></li>
        <li><a href="AdminProfile.php">Profile</a></li>
        <li><a href="ADDAd.php">Add New Profile</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-10">
      <div class="well">
        <h4>Dashboard</h4>
        <p>Welcome to the Gurney Bowl Admin Dashboard!</p>
      </div>

      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Total Users</h4>
            <p>0</p>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="well">
            <h4>Feedback</h4>
            <p>0</p> 
          </div>
        </div>

        <div class="col-sm-3">
          <div class="well">
            <h4>Booking History</h4>
            <p>0</p>
          </div> 
        </div>

        <div class="col-sm-3">
          <div class="well">
            <h4>Services</h4>
            <p>0</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="well well-lg">
            <h1>Availability Slot</h1><br>
            <p></p> 
            <p></p> 
          </div>
        </div>

        <div class="col-sm-6">
          <div class="well well-lg">
            <h1>Events</h1><br>
            <p>No Events</p> 
            <p></p> 
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="footercopy">
  <div class="copyright">&copy;2024- <strong>Residensi UTMKL</strong></div>
</div>
</footer>
<?php }else { 
     header("Location: ADsignIn.php");
     exit;
    } ?>
</body>
</html>
<?php } else {
	header("Location: ADsignIn.php");
	exit;
} ?>
