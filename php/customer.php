<?php 

function getUserById($ID, $db){
    $sql = "SELECT * FROM customers WHERE ID = ?";
	$stmt = $db->prepare($sql);
	$stmt->execute([$ID]);
    
    if($stmt->rowCount() == 1){
        $user = $stmt->fetch();
        return $user;
    }else {
        return 0;
    }
}

 ?>