<?php  
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {



if(isset($_POST['fname']) && 
   isset($_POST['uname'])){

    include "../Addb_conn.php";

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $old_pp = $_POST['old_pp'];
    $conw = $_POST['conw'];
    $id = $_SESSION['id'];

    if (empty($fname)) {
    	$em = "Full name is required";
    	header("Location: ../EditAdminProf.php?error=$em");
	    exit;
    }else if(empty($uname)){
    	$em = "User name is required";
    	header("Location: ../EditAdminProf.php?error=$em");
	    exit;
      }else if(empty($conw)){
         $em = "Confirmation Word is required";
         header("Location: ../EditAdminProf.php?error=$em");
         exit;
    }else {

      if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
         
        
         $img_name = $_FILES['pp']['name'];
         $tmp_name = $_FILES['pp']['tmp_name'];
         $error = $_FILES['pp']['error'];
         
         if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($img_ex_to_lc, $allowed_exs)){
               $new_img_name = uniqid($uname, true).'.'.$img_ex_to_lc;
               $img_upload_path = '../upload/'.$new_img_name;
               // Delete old profile pic
               $old_pp_des = "../upload/$old_pp";
               if(unlink($old_pp_des)){
               	  // just deleted
               	  move_uploaded_file($tmp_name, $img_upload_path);
               }else {
                  // error or already deleted
               	  move_uploaded_file($tmp_name, $img_upload_path);
               }
               

               // update the Database
               $sql = "UPDATE users 
                       SET fname=?, username=?, pp=?,plain_password=?
                       WHERE id=?";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$fname, $uname, $new_img_name, $conw, $id]);
               $_SESSION['fname'] = $fname;
               header("Location: ../EditAdminProf.php?success=Your account has been updated successfully");
                exit;
            }else {
               $em = "You can't upload files of this type";
               header("Location: ../EditAdminProf.php?error=$em&$data");
               exit;
            }
         }else {
            $em = "unknown error occurred!";
            header("Location: ../EditAdminProf.php?error=$em&$data");
            exit;
         }

        
      }else {
       	$sql = "UPDATE users 
       	        SET fname=?, username=?, plain_password=?
                WHERE id=?";
       	$stmt = $conn->prepare($sql);
       	$stmt->execute([$fname, $uname, $conw, $id]);

       	header("Location: ../EditAdminProf.php?success=Your account has been updated successfully");
   	    exit;
      }
    }


}else {
	header("Location: ../EditAdminProf.php?error=error");
	exit;
}


}else {
	header("Location: ADsignIn.php");
	exit;
} 

