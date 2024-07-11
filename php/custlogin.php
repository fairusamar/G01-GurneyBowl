<?php 
session_start();

if(isset($_POST['username']) && 
   isset($_POST['password'])){

    include "../custdb_conn.php";

    $usname = $_POST['username'];
    $passw = $_POST['password'];

    $data = "username=".$usname;
    
    if(empty($usname)){
    	$em = "User name is required";
    	header("Location: ../SignIn.php?error=$em&$data");
	    exit;
    }else if(empty($passw)){
    	$em = "Password is required";
    	header("Location: ../SignIn.php?error=$em&$data");
	    exit;
    }else {

    	$sql = "SELECT * FROM customers WHERE Email = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$usname]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          $username =  $user['Username'];
          $password =  $user['Password'];
          $Email =  $user['Email'];
          $ID =  $user['ID'];
          //$pp =  $user['pp'];

          if($Email === $usname){
             if(password_verify($passw, $password)){
                 $_SESSION['ID'] = $ID;
                 $_SESSION['Email'] = $Email;
                 //$_SESSION['pp'] = $pp;

                 header("Location: ../CUSTindex.php");
                 exit;
             }else {
               $em = "Incorect User name or password";
               header("Location: ../SignIn.php?error=$em&$data");
               exit;
            }

          }else {
            $em = "Incorect User name or password";
            header("Location: ../SignIn.php?error=$em&$data");
            exit;
         }

      }else {
         $em = "Incorect User name or password";
         header("Location: ../SignIn.php?error=$em&$data");
         exit;
      }
    }


}else {
	header("Location: ../SignIn.php?error=error");
	exit;
}