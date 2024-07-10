<?php  
session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['Email'])) {



if(isset($_POST['username']) && 
   isset($_POST['Email'])){

    include "../custdb_conn.php";

    $fname = $_POST['username'];
    $Email = $_POST['Email'];
    $old_pp = $_POST['old_pp'];
    $phone_num = $_POST['phone_num'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $ID = $_SESSION['ID'];

    if (empty($fname)) {
    	$em = "Full name is required";
    	header("Location: ../CUSTeditprofile.php?error=$em");
	    exit;
        }else if(empty($Email)){
    	$em = "Email name is required";
    	header("Location: ../CUSTeditprofile.php?error=$em");
	    exit;
      }else if(empty($phone_num)){
         $em = "Phone Number is required";
         header("Location: ../CUSTeditprofile.php?error=$em");
         exit;
        } else {

      if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
         
        
         $img_name = $_FILES['pp']['name'];
         $tmp_name = $_FILES['pp']['tmp_name'];
         $error = $_FILES['pp']['error'];
         
         if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($img_ex_to_lc, $allowed_exs)){
               $new_img_name = uniqid($Email, true).'.'.$img_ex_to_lc;
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
               $sql = "UPDATE customers
                       SET Username=?, Email=?, phone_number=?, date_of_birth=?, gender=?, pp=?
                       WHERE ID=?";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$fname, $Email, $phone_num, $dob, $gender, $new_img_name, $ID]);
               $_SESSION['username'] = $fname;
               header("Location: ../CUSTeditprofile.php?success=Your account has been updated successfully");
                exit;
            }else {
               $em = "You can't upload files of this type";
               header("Location: ../CUSTeditprofile.php?error=$em&$data");
               exit;
            }
         }else {
            $em = "unknown error occurred!";
            header("Location: ../CUSTeditprofile.php?error=$em&$data");
            exit;
         }

        
      }else {
       	$sql = "UPDATE customers 
       	        SET Username=?, Email=?, phone_number=?, date_of_birth=?, gender=?
                WHERE ID=?";
       	$stmt = $conn->prepare($sql);
       	$stmt->execute([$fname, $Email, $phone_num, $dob, $gender, $ID]);

       	header("Location: ../CUSTeditprofile.php?success=Your account has been updated successfully");
   	    exit;
      }
    }
   


}else {
	header("Location: ../CUSTeditprofile.php?error=error");
	exit;
}


}else {
	header("Location: SignIn.php");
	exit;
} 