<?php
 include('ser.php');

$stmt = $pdo->prepare("UPDATE customer SET `PAID`=? WHERE `Phone_cus`=?");

$stmt->bindParam(1, $_POST["PAID"]);
$stmt->bindParam(2, $_POST["Phone_cus"]);

$stmt->execute(); // เริ่มเพิ่มข้อมูล

if ($stmt->execute()) 
header("location: paid.php");
?>