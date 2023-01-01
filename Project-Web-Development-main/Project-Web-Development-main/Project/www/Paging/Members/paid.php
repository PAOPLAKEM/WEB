<?php 
	session_start();
?>
<html>
<style>
        table,th,td{
            border: 5px solid white;
            color: yellow;
            border-radius: 5px;

            font-size: larger;

        }
        #pho{
            width: 120px;
            height: 150px;
        
        }
    </style>
<head>
	<link rel="stylesheet" href="../../style.css">
	<script src="https://kit.fontawesome.com/f52401267a.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
	<?php 
    	
    	if (isset($_GET['logout'])) {
        	session_destroy();
        	unset($_SESSION['username']);
        	header('location: index.php');
    	}
	?>
    <?php 
           include('ser.php');
           $stmt = $pdo->prepare("SELECT * FROM customer WHERE `role` LIKE '%user%'");
           $stmt->execute();
           ?>
</head>

    <body>
        <header>
    <div class="banner">
		<div class="navbar">
			<img src="../../logo.jpg" width="150px" height="150px">
			<ul>
				<li><a href="admin.php" id="home" onclick="getPaging(this.id)">UPDATE</a></li>
				<li><a href="#" id="paid" onclick="getPaging(this.id)">PAID</a></li>
                <li><a href="farm.php" id="farm" >TRANSPORT</a></li>
                <li><a href="../../index.php?logout='1'">Logout</a></li>
			</ul>
		</div>
	</div >
    </header>
 
    <div class="content" id="content">
        <center>
          <table> <tr><th>ชื่อ:</th><th>เบอร์:</th><th>PAID</th><th>รูป</th></tr>
            <?php while ($row = $stmt->fetch()) :?>
                
                <tr>
                <td ><?=$row["name_cus"]?></td>
                <td ><?=$row["Phone_cus"]?></td>
                <td>
                <form action="editpage.php" method="post">
            <input type="hidden"  name="Phone_cus" value="<?=$row["Phone_cus"]?>">
            <select name="PAID"  onchange="this.form.submit()" >
            <option value="<?=$row["PAID"]?>"><?=$row["PAID"]?></option>
            <option value="0">0</option>
            <option value="1">1</option>
             </td>
             <td ><a href="upload/<?=$row['IMG']?>"><img id="pho"  src="<?php echo'upload/'.$row['IMG']?>" alt=""   /></a></td>
            
                </tr>
                </form>
                <?php endwhile?>        
                </center>   
		
	</div>
         
    </body>
</html>