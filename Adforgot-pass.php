<?php 
session_start();

include "Adpass_dbcon.php";

if (isset($_POST['cw']) && isset($_POST['np']) && isset($_POST['c_np'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $cw = validate($_POST['cw']);
    $np = validate($_POST['np']);
    $c_np = validate($_POST['c_np']);
    
    if(empty($cw)){
        header("Location: Adreset-pass.php?error=Confirmation Number is required");
        exit();
    } else if(empty($np)){
        header("Location: Adreset-pass.php?error=New Password is required");
        exit();
    } else if($np !== $c_np){
        header("Location: Adreset-pass.php?error=The confirmation password does not match");
        exit();
    } else {
        // Fetch the user with the confirmation number
        $sql = "SELECT id, plain_password FROM users WHERE plain_password=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $cw);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $plain_password = $row['plain_password'];

            // Verify the confirmation word (plain text)
            if ($cw === $plain_password) {
                // Hash the new password
                $new_hashed_password = password_hash($np, PASSWORD_DEFAULT);

                // Update the hashed password in the database
                $sql_2 = "UPDATE users SET password=?, plain_password=NULL WHERE id=?";
                $stmt_2 = $conn->prepare($sql_2);
                $stmt_2->bind_param("si", $new_hashed_password, $id);
                $stmt_2->execute();

                header("Location: Adreset-pass.php?success=Your password has been changed !!<br>Please Re-enter Your New Confirmation Number In Profile!!");
                exit();
            } else {
                header("Location: Adreset-pass.php?error=Incorrect confirmation word");
                exit();
            }
        } else {
            header("Location: Adreset-pass.php?error=User not found");
            exit();
        }
    }
} else {
    header("Location: Adreset-pass.php");
    exit();
}
?>
