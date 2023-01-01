<?php 

$pdo = new PDO("mysql:host=db;port=3306 ;dbname=myDb;charset=utf8", "root", "test");
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn = mysqli_connect('db', 'user', 'test', 'myDb', 3306);
    

?>