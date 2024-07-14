<?php  
session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['Email'])) {

    include "../custpass_dbconn.php";

    $Email = $_POST['Email'];
    $d_play = $_POST['dp'];
    $time = $_POST['time'];
    $pax = $_POST['pax'];
    $bshoes = $_POST['bowlshoes'];
    $num_lane = $_POST['num_lane'];
    //$ID = $_SESSION['ID'];

    if (empty($d_play)) {
    	$em = "Date is required";
    	header("Location: ../book.php?error=$em");
	    exit;
        }else if(empty($Email)){
    	$em = "Email name is required";
    	header("Location: ../book.php?error=$em");
	    exit;
        }else if(empty($pax)){
         $em = "Phone Number is required";
         header("Location: ../book.php?error=$em");
         exit;
        } else if(empty($bshoes)){
            $em = "Number of shoes is required";
            header("Location: ../book.php?error=$em");
            exit;
        } else if(empty($num_lane)){
            $em = "Number of lane is required";
            header("Location: ../book.php?error=$em");
            exit;
        } else if(empty($time)){
            $em = "Time is required";
            header("Location: ../book.php?error=$em");
            exit;
        } else {
       	$sql = "INSERT INTO booking 
       	        (email, play_date, Time, pax_player, bowl_shoes, num_lane)
                VALUES (?, ?, ?, ?, ?, ?)";
       	$stmt = $conn->prepare($sql);
           if ($stmt === false) {
               die("Error preparing statement: " . $conn->error);
           }
           $stmt->bind_param("ssssss", $Email, $d_play, $time, $pax, $bshoes, $num_lane);
       
           if ($stmt->execute()) {
               header("Location: ../book.php?success=Booking successfully updated");
           } else {
               die("Error executing statement: " . $stmt->error);
           }
       
           $stmt->close();
           $conn->close();
           exit;
      }
    
   


} else {
	header("Location: ../book.php?error=error");
	exit;
}


/*} else {
	header("Location: CUSTindex.php");
	exit;
} */