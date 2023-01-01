<html>
<head><meta charset="utf-8"></head>

<?php
 include('ser.php');

$stmt = $pdo->prepare("SELECT * FROM pond WHERE Pond=? ");
$stmt->bindParam(1, $_GET["Pond"]);
$stmt->execute(); 
$row = $stmt->fetch();
?>

<body>
<form action="ed_t.php" method="post">
   <input type="hidden" name="Pond" value="<?=$row ["Pond"]?>">
    ค่า O2%:<input type="text" name="Pond_O2%" value="<?=$row ["Pond_O2 %"]?>"><br>
    ค่า Mg%: <input type="text" name="Pond_Mg%" value="<?=$row ["Pond_Mg %"]?>" ><br>
  <br>
    ค่า Ca%:<input type="text" name="Pond_Ca%" value="<?=$row ["Pond_Ca %"]?>"><br>
    ค่า Na%:<input type="text" name="Pond_Na%" value="<?=$row ["Pond_Na %"]?>"><br>

<input type="submit" value="แก้ไข้ ">
</form>

</body>
</html>