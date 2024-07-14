<?php  
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {

    if(isset($_POST['old_pp'])){

        include "../Addb_conn.php";

        $old_pp = $_POST['old_pp'];
        $id = $_SESSION['id'];

        if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
            
            $img_name = $_FILES['pp']['name'];
            $tmp_name = $_FILES['pp']['tmp_name'];
            $error = $_FILES['pp']['error'];
            
            if($error === 0){
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);

                $allowed_exs = array('jpg', 'jpeg', 'png');
                if(in_array($img_ex_to_lc, $allowed_exs)){
                    $new_img_name = uniqid('pp_', true).'.'.$img_ex_to_lc;
                    $img_upload_path = '../upload/'.$new_img_name;
                    
                    // Delete old profile pic
                    $old_pp_des = "../upload/$old_pp";
                    if(file_exists($old_pp_des)){
                        unlink($old_pp_des);
                    }
                    
                    // Upload new profile pic
                    move_uploaded_file($tmp_name, $img_upload_path);

                    // Update the Database
                    $sql = "UPDATE service SET pp=? WHERE profile_id=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$new_img_name, $id]);

                    header("Location: ../Adservice.php?success=Profile picture updated successfully");
                    exit;
                } else {
                    $em = "You can't upload files of this type";
                    header("Location: ../Adservice.php?error=$em");
                    exit;
                }
            } else {
                $em = "unknown error occurred!";
                header("Location: ../Adservice.php?error=$em");
                exit;
            }

        } else {
            $em = "No file uploaded!";
            header("Location: ../Adservice.php?error=$em");
            exit;
        }

    } else {
        header("Location: ../Adservice.php?error=Missing old profile picture information");
        exit;
    }

} else {
    header("Location: AdminDashboard.php");
    exit;
} 
?>