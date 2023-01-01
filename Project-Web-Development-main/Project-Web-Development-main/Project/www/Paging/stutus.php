<?php 
	session_start();
?>
<html>
<head><meta charset="utf-8">
<style>
		table, th, td {
			border: 5px solid white;
			border-radius: 10px;
			border-collapse: collapse;
			padding: 15px;
			text-align: center;
			color: white;
			
		}
		th{
			color: aqua;
		}
		td{
			color: wheat;
		}
	</style>
</head>

<?php
include('./Members/ser.php');

$Phone=$_SESSION["Phone"];
$stmt = $pdo->prepare("SELECT * FROM `receipt`,`pond`,`supplier`,`transport`,`farm` WHERE `receipt`.`Pond`=`pond`.`Pond` AND `pond`.`COMPANY`=`supplier`.`COMPANY` AND `pond`.`Pond`=`farm`.`Pond` AND `farm`.`Name_Comp`=`transport`.`Name_Comp` AND `Num_re`=? ");
$stmt->bindParam(1, $_GET["Num_re"]);
$stmt->execute(); 

$stmt1 = $pdo->prepare("SELECT * FROM `receipt`,`pond`,`supplier`,`transport`,`farm` WHERE `receipt`.`Pond`=`pond`.`Pond` AND `pond`.`COMPANY`=`supplier`.`COMPANY` AND `pond`.`Pond`=`farm`.`Pond` AND `farm`.`Name_Comp`=`transport`.`Name_Comp` AND `Phone_cus`=? ");
$stmt1->bindParam(1,$Phone);
$stmt1->execute(); 
?>	

<body>

<table>
<?php if ($stmt->rowCount() > 0) {
				echo "<th>Receipt</th><th>SUPPLIER</th><th>บริษัทข้นส่ง</th><th>ชื่อผู้ส่ง</th><th>นามสกุลผู้ส่ง</th><th>เบอร์ผู้ส่ง</th><th>จัดส่ง</th>";
        
			 while ($row = $stmt->fetch()) {
				echo "<tr>";
				echo "<td>".$row["Num_re"]."</td>";
				echo "<td>".$row["COMPANY"]."</td>";
				echo "<td>".$row["Name_Comp"]."</td>";
				echo "<td>".$row["name_Tr"]."</td>";
				echo "<td>".$row["surname_Tr"]."</td>";
				echo "<td>".$row["PHnum"]."</td>";
				echo "<td>".$row["DATE"]."</td>";
				echo "</tr>";
       }
				 
       }else { ?>
       <p>ไม่มีเลขใบเสร็จที่ค้นหา...</p><br><p>ใบเส็ดทั้งหมดของคุณ</p>
	   <table>
            <th>Receipt</th><th>SUPPLIER</th><th>บริษัทข้นส่ง</th><th>ชื่อผู้ส่ง</th><th>นามสกุลผู้ส่ง</th><th>เบอร์ผู้ส่ง</th><th>จัดส่ง</th>	
			<?php while ($row = $stmt1->fetch()) :?>
				<tr>
				<td><?=$row["Num_re"]?></td>
				<td><?=$row["COMPANY"]?></td>
				<td><?=$row["Name_Comp"]?></td>
				<td><?=$row["name_Tr"]?></td>
				<td><?=$row["surname_Tr"]?></td>
				<td><?=$row["PHnum"]?></td>
				<td><?=$row["DATE"]?></td>
				</tr>
				
				<?php endwhile?> 
                </table>
       <?php } ?>
				
			</table>

</body>
</html>