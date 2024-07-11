<?php
$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "accounts";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

session_start();

// Fetch feedback data from the database
$query = "SELECT FeedbackID, Email, Suggestion FROM feedback";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/x-icon" href="css/adminpages/ADsignIn/images/gbbslogo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/adstyle.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    .feedback-box {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    .feedback-box table {
        width: 100%;
        border-collapse: collapse;
    }
    .feedback-box th, .feedback-box td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .feedback-box th {
        background-color: lightblue;
    }

    .feedback-box tr {
        background-color: lightgrey;
    }
    .email-column {
        width: 20%;
    }
  </style>

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
      <a class="navbar-brand" href="AdminDashboard.php"><img src="css/adminpages/ADsignIn/images/gbbslogo.png" style="width:42px; height: 42px;"
        >GURNEY BOWL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="AdminDashboard.php">Dashboard</a></li>
        <li><a href="AdminBookingHistory.html">Booking History</a></li>
        <li><a href="#">Customer List</a></li>
        <li><a href="#section4">Events</a></li>
        <li><a href="#section5">Availability</a></li>
        <li class="active"><a href="Adfeedback.php">Feedback</a></li>
        <li><a href="AdminProfile.php">Profile</a></li>
        <li><a href="ADDAd.php">Add New Profile</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs" id="wuttheside">
      <h2><a href="AdminDashboard.php"><img src="css/adminpages/ADsignIn/images/gbbslogo.png" style="width:45px; height: 45px;"
        ></a>GURNEY BOWL</h2>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="AdminDashboard.php">Dashboard</a></li>
        <li><a href="AdminBookingHistory.html">Booking History</a></li>
        <li><a href="#">Customer List</a></li>
        <li><a href="#section4">Events</a></li>
        <li><a href="#section5">Availability</a></li>
        <li class="active"><a href="Adfeedback.php">Feedback</a></li>
        <li><a href="AdminProfile.php">Profile</a></li>
        <li><a href="ADDAd.php">Add New Profile</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-10">
      <div class="row">
        <div class="col-sm-10" style="width:100%;">
          <div class="well">
            <h3 style="text-align:center;">Customers Feedback</h3>
            <br>
            <table class="feedback-box table">
                        <thead>
                            <tr>
                                <th class="email-column">Email</th>
                                <th>Suggestion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['Suggestion']) . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>No feedback available</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
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
</body>
</html>