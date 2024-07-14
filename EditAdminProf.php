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
  <title>Edit Admin Profile</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/x-icon" href="images/gbbslogo.png">
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
        <li><a href="AdminDashboard.php">Dashboard</a></li>
        <li><a href="AdminBookingHistory.php">Booking History</a></li>
        <li><a href="Adcustlist.php">Customer List</a></li>
        <li><a href="Adservice.php">Service</a></li>
        <li><a href="Adfeedback.php">Feedback</a></li>
        <li class="active"><a href="AdminProfile.php" class="Profile">Profile</a></li>
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
        <li><a href="AdminDashboard.php">Dashboard</a></li>
        <li><a href="AdminBookingHistory.php">Booking History</a></li>
        <li><a href="Adcustlist.php">Customer List</a></li>
        <li><a href="Adservice.php">Service</a></li>
        <li><a href="Adfeedback.php">Feedback</a></li>
        <li class="active"><a href="AdminProfile.php" class="Profile">Profile</a></li>
        <li><a href="ADDAd.php">Add New Profile</a></li>
      </ul><br>
    </div>
    <br>

    <div class="col-sm-8">
        <div class="well well-lg">
        <form class="shadow w-450 p-3" 
              action="php/edit.php" 
              method="post"
              enctype="multipart/form-data">

            <h1>Edit Admin Profile</h1>
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
            <br>
            <div class="well well-md" style="background-color:lightslategrey">
              <div class="mb-3">
              <label id="adprof">Profile Picture:</label><br>
              <img src="upload/<?=$user['pp']?>" alt="avatar" id="imgp">
              <br><br>
            <input type="file"
                   class="form-control"
                   name="pp">
            <input type="text"
                   hidden="hidden" 
                   name="old_pp"
                   value="<?=$user['pp']?>" >
            </div>
            <br>
              <div class="bm-3">
              <label id="adprof">Name:</label>
              <input type="text" 
                   class="form-control"
                   name="fname"
                   value="<?php echo $user['fname']?>">
            </div>
            <br>
            <div class="bm-3">
              <label id="adprof">Email:</label>
              <input type="email" 
                   class="form-control"
                   name="uname"
                   value="<?php echo $user['username']?>">
                   <b><p style="color:#000000;">
                    NOTE!! REMEMBER EMAIL CHANGES FOR LOG IN!!</p></b>
            </div>
            <br>
            <div class="bm-3">
              <label id="adprof">Admin ID:</label>
              <p class="form-control"><?php echo $user['id']?></p>
            </div>
            <br>
            <div class="bm-3">
              <label id="adprof">Confirmation Number:</label>
              <input type="text" 
                   class="form-control"
                   name="conw"
                   value="<?php echo $user['plain_password']?>">
            </div>
            <br>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          <a href="AdminProfile.php" class="link-secondary"><u>RETURN</u></a>
            </form>
        </div>
      </div>
  </div>
</div>
<footer class="footercopy">
  <div class="copyright">&copy;2024- <strong>Residensi UTMKL</strong></div>
</div>
</footer>

<?php 
}else{ 
  header("Location: AdminProfile.php");
  exit;

    } ?>
</body>
</html>

<?php }else {
	header("Location: login.php");
	exit;
} ?>