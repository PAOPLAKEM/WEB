<?php
 include('ser.php');

$stmt = $pdo->prepare("UPDATE pond SET `Pond_O2 %`=?,`Pond_Mg %`=?,`Pond_Ca %`=?,`Pond_Na %`=?
WHERE `Pond`=?");

$stmt->bindParam(1, $_POST["Pond_O2%"]);
$stmt->bindParam(2, $_POST["Pond_Mg%"]);
$stmt->bindParam(3, $_POST["Pond_Ca%"]);
$stmt->bindParam(4, $_POST["Pond_Na%"]);
$stmt->bindParam(5, $_POST["Pond"]);
$stmt->execute(); // เริ่มเพิ่มข้อมูล

if ($stmt->execute()) 

header("location: admin.php");
?>