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
           $stmt = $pdo->prepare("SELECT * FROM farm JOIN pond ON farm.Pond=pond.Pond WHERE pond.type_shrimp is not null");
           $stmt->execute();?>
</head>

    <body>
        <header>
    <div class="banner">
		<div class="navbar">
			<img src="../../logo.jpg" width="150px" height="150px">
			<ul>
				<li><a href="admin.php" id="home" onclick="getPaging(this.id)">UPDATE</a></li>
				<li><a href="paid.php" id="paid" onclick="getPaging(this.id)">PAID</a></li>
                <li><a href="#" id="farm" >TRANSPORT</a></li>
                <li><a href="../../index.php?logout='1'">Logout</a></li>
			</ul>
		</div>
	</div >
    </header>
 
    <div class="content" id="content">
        <center>
          <table> <tr><th>บ่อ</th><th>บริษัท</th><th>วันที่จะได้รับ</th></tr>
            <?php while ($row = $stmt->fetch()) :?>
                <tr>
                <td ><?=$row["Pond"]?></td>
                <td>
                <form action="uptr.php" method="post">
            <input type="hidden"  name="Pond" value="<?=$row["Pond"]?>">
            <select name="Name_Comp"  onchange="this.form.submit()" >
            <option value="<?=$row["Name_Comp"]?>"><?=$row["Name_Comp"]?></option>
            <option value="ขนส่ง1">ขนส่ง1</option>
            <option value="ขนส่ง2">ขนส่ง2</option>
             </td>
             <td > <input type="date" name="DATE" value="<?=$row["DATE"]?>" onchange="this.form.submit()"></td>
             
            
                </tr>
                </form>
                <?php endwhile?>        
                </center>   
		
	</div>
         
    </body>
</html>