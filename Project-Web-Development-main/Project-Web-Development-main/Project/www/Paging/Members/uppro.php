<html>
<head><meta charset="utf-8"></head>

<?php
 include('ser.php');

$stmt = $pdo->prepare("SELECT * FROM customer WHERE `Phone_cus`=? ");
$stmt->bindParam(1, $_GET["Phone_cus"]);
$stmt->execute(); 
$row = $stmt->fetch();
?>

<body>
<form action="./Members/upro.php" method="post">
    <input type="hidden" name="Phone_cus" value="<?=$row ["Phone_cus"]?>">
    ชื่อ:<input type="text" name="name_cus" value="<?=$row ["name_cus"]?>"><br>
    นามสกุล: <input type="text" name="sur_cus" value="<?=$row ["sur_cus"]?>"><br>
    ที่อยู่:<input type="text" name="address" value="<?=$row ["address"]?>"><br>
    username:<input type="text" name="Username" value="<?=$row ["Username"]?>"><br>
    Password:<input type="password" name="Password" value="<?=$row ["Password"]?>"><br>

<input type="submit" value="แก้ไข้ ">
</form>

</body>
</html>