<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="icon" type="image/x-icon" href="images/gbbslogo.png">
	<link rel="stylesheet" type="text/css" href="css/passstyle.css">
</head>
<body>
    <form action="Adchange-p.php" method="post">
     	<h2>Change Password</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

     	<label>Old Password</label>
     	<input type="password" 
     	       name="op" 
     	       placeholder="Old Password">
     	       <br>

     	<label>New Password</label>
     	<input type="password" 
     	       name="np" 
     	       placeholder="New Password">
     	       <br>

     	<label>Confirm New Password</label>
     	<input type="password" 
     	       name="c_np" 
     	       placeholder="Confirm New Password">
     	       <br>

     	<button type="submit">CHANGE</button>
          <a href="AdminProfile.php" class="ca">HOME</a>
     </form>
</body>
</html>

<?php 
}else{
     header("Location: AdminProfile.php");
     exit();
}
 ?>