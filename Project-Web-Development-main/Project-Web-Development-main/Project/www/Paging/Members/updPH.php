<?php
 include('ser.php');

 
	$arr = $_GET["Pond"] ;
	$list = explode(",",$arr);
	for ($i= 0 ; $i < count($list); $i++) {
		$stmt1 = $pdo->prepare("UPDATE pond SET `Phnumber`=?
		WHERE `Pond`=?");
		$stmt1->bindParam(1, $_GET["Phnumber"]);
		$stmt1->bindParam(2, $list[$i]);
		$stmt1->execute();
		
		
		$stmt = $pdo->prepare("INSERT INTO receipt (Pond,Phone_cus) VALUE (?,?)");
		$stmt->bindParam(2, $_GET["Phnumber"]);
		$stmt->bindParam(1, $list[$i]);
		
		
		
		if ($stmt->execute()) {
			header("location: ../../pol.php");
		}
		
		
	}


	

?>