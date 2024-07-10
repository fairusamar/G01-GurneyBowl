<!DOCTYPE html>
<html lang="en">
<head>
  <title>Adding New Admin</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/x-icon" href="css/adminpages/ADsignIn/images/gbbslogo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/adstyle.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <li><a href="AdminDashboard.php">Dashboard</a></li>
        <li><a href="AdminBookingHistory.php">Booking History</a></li>
        <li><a href="#section3">Customer List</a></li>
        <li><a href="#section4">Events</a></li>
        <li><a href="#section5">Availability</a></li>
        <li><a href="Adfeedback.php">Feedback</a></li>
        <li><a href="AdminProfile.php">Profile</a></li>
        <li class="active"><a href="ADDAd.php">Add New Admin</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs" id="wuttheside">
      <h2><a href="AdminDashboard.php"><img src="images/gbbslogo.png" style="width:45px; height: 45px;"
        ></a>GURNEY BOWL</h2>
        <ul class="nav nav-pills nav-stacked">
        <li><a href="AdminDashboard.php">Dashboard</a></li>
        <li><a href="AdminBookingHistory.php">Booking History</a></li>
        <li><a href="#section3">Customer List</a></li>
        <li><a href="#section4">Events</a></li>
        <li><a href="#section5">Availability</a></li>
        <li><a href="Adfeedback.php">Feedback</a></li>
        <li><a href="AdminProfile.php">Profile</a></li>
        <li class="active"><a href="ADDAd.php">Add New Admin</a></li>
      </ul><br>
    </div>
    <br>

    <div class="col-sm-10">
        <div class="well well-lg">
          <form action="php/signup.php"
                method="post"
                enctype="multipart/form-data">
            <h1>ADDING NEW ADMIN</h1>

            <?php if(isset($_GET['error'])){ ?>
    		    <div class="alert alert-danger" role="alert">
			        <?php echo $_GET['error']; ?>
			      </div>
		        <?php } ?>

            <?php if(isset($_GET['success'])){ ?>
    		    <div class="alert alert-success" role="alert">
			      <?php echo $_GET['success']; ?>
			      </div>
		        <?php } ?>
            <br>

		      <div class="mb-3">
            <div class="well well-md" style="background-color:lightslategrey">
              <div class="mb-3">
              <label id="adprof">Profile Picture:</label>
              <input type="file"
		           class="form-control"
		           name="pp">
            </div>
            <br>
              <div class="bm-3">
              <label id="adprof">Name:</label>
              <input type="text" 
		                  class="form-control"
		                  name="fname"
		                  value="<?php echo (isset($_GET['fname']))?$_GET['fname']:"" ?>">
            </div>
            <br>

            <div class="bm-3">
              <label id="adprof">Email:</label>
              <input type="email" 
		                class="form-control"
		                name="uname"
		                value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
            </div>
            <br>

            <div class="bm-3">
              <label id="adprof">Password:</label>
              <input type="password" 
                      class="form-control"
		                  name="pass">
		        </div>
            <br>
           </div>

            <button type="submit" class="btn btn-primary">ADD</button>
            <a href="AdminDashboard.html" class="btn btn-link"><u>RETURN</u></a>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="footercopy">
  <div class="copyright">&copy;2024- <strong>Residensi UTMKL</strong></div>
</div>
</footer>

</body>
</html>