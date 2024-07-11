<?php 
session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['Email'])) {

    include "custpass_dbconn.php";

    if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $op = validate($_POST['op']);
        $np = validate($_POST['np']);
        $c_np = validate($_POST['c_np']);
        
        if(empty($op)){
            header("Location: CUSTchgpass.php?error=Old Password is required");
            exit();
        } else if(empty($np)){
            header("Location: CUSTchgpass.php?error=New Password is required");
            exit();
        } else if($np !== $c_np){
            header("Location: CUSTchgpass.php?error=The confirmation password does not match");
            exit();
        } else {
            $ID = $_SESSION['ID'];

            // Fetch the current hashed password from the database
            $sql = "SELECT Password FROM customers WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $ID);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $hashed_password = $row['Password'];

                // Verify the old password
                if (password_verify($op, $hashed_password)) {
                    // Hash the new password
                    $new_hashed_password = password_hash($np, PASSWORD_DEFAULT);

                    // Update the password in the database
                    $sql_2 = "UPDATE customers SET Password=? WHERE ID=?";
                    $stmt_2 = $conn->prepare($sql_2);
                    $stmt_2->bind_param("si", $new_hashed_password, $ID);
                    $stmt_2->execute();

                    header("Location: CUSTchgpass.php?success=Your password has been changed successfully");
                    exit();
                } else {
                    header("Location: CUSTchgpass.php?error=Incorrect old password");
                    exit();
                }
            } else {
                header("Location: CUSTchgpass.php?error=User not found");
                exit();
            }
        }
    } else {
        header("Location: CUSTchgpass.php");
        exit();
    }
} else {
    header("Location: CUSTviewprofile.php");
    exit();
}