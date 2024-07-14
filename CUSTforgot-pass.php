<?php 
session_start();

include "custpass_dbconn.php";

if (isset($_POST['email']) && isset($_POST['np']) && isset($_POST['c_np'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $np = validate($_POST['np']);
    $c_np = validate($_POST['c_np']);
    
    if(empty($email)){
        header("Location: CUSTreset-pass.php?error=Email is required");
        exit();
    } else if(empty($np)){
        header("Location: CUSTreset-pass.php?error=New Password is required");
        exit();
    } else if($np !== $c_np){
        header("Location: CUSTreset-pass.php?error=The confirmation password does not match");
        exit();
    } else {
        // Fetch the user with the confirmation number
        $sql = "SELECT ID, Email FROM customers WHERE Email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $id = $row['ID'];
            $Email = $row['Email'];

            // Verify the email
            if ($email === $Email) {
                // Hash the new password
                $new_hashed_password = password_hash($np, PASSWORD_DEFAULT);

                // Update the hashed password in the database
                $sql_2 = "UPDATE customers SET Password=? WHERE ID=?";
                $stmt_2 = $conn->prepare($sql_2);
                $stmt_2->bind_param("si", $new_hashed_password, $id);
                $stmt_2->execute();

                header("Location: CUSTreset-pass.php?success=Your password succesfully changed!!");
                exit();
            } else {
                header("Location: CUSTreset-pass.php?error=Incorrect confirmation word");
                exit();
            }
        } else {
            header("Location: CUSTreset-pass.php?error=User not found");
            exit();
        }
    }
} else {
    header("Location: CUSTreset-pass.php");
    exit();
}
?>