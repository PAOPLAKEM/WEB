<?php

	mb_language('uni');
	mb_internal_encoding('UTF-8');

    $con = mysqli_connect('db', 'user', 'test', 'myDb', 3306);
    if (!$con) {
     die("Connection failed: " . mysqli_connect_error());
    }

    $chartQuery = "SELECT * FROM pond";
    $chartQueryRecords = mysqli_query($con,$chartQuery);

	
?>