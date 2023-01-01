<?php
 include('ser.php');

$stmt = $pdo->prepare("UPDATE farm SET `Name_Comp`=?,`DATE`=? WHERE `Pond`=?");


$stmt->bindParam(1, $_POST["Name_Comp"]);
$stmt->bindParam(2, $_POST["DATE"]);
$stmt->bindParam(3, $_POST["Pond"]);

$stmt->execute(); // เริ่มเพิ่มข้อมูล

if ($stmt->execute()) 
header("location: farm.php");

?>