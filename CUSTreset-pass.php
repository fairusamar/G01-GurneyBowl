<?php 
session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
	<link rel="icon" type="image/x-icon" href="images/gbbslogo.png">
	<link rel="stylesheet" type="text/css" href="css/passstyle.css">
</head>
<body style="background:green;">
    <form action="CUSTforgot-pass.php" method="post">
     	<h2>Reset Password</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

     	<label>Confirmation Word</label>
     	<input type="email"
     	       name="email"
     	       placeholder="Email">
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
          <a href="SignIn.php" class="ca">HOME</a>
     </form>
</body>
</html>