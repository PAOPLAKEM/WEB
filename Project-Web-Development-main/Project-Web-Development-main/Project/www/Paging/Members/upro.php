<?php
 include('ser.php');

$stmt = $pdo->prepare("UPDATE customer SET `name_cus`=?,`sur_cus`=?,`address`=?,`Username`=?,`Password`=? WHERE `Phone_cus`=?");

$stmt->bindParam(6, $_POST["Phone_cus"]);
$stmt->bindParam(1, $_POST["name_cus"]);
$stmt->bindParam(2, $_POST["sur_cus"]);
$stmt->bindParam(3, $_POST["address"]);
$stmt->bindParam(4, $_POST["Username"]);
$stmt->bindParam(5, $_POST["Password"]);

if ($stmt->execute()) 
header("location: ../profile.php");

?>