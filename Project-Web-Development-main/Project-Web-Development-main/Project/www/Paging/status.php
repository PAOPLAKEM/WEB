<?php 
	session_start();
?>
<html>
<?php 

	$Phone=$_SESSION["Phone"];
    if (!isset($_SESSION['username'])) {
        header('location: ./Members/log.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: ./Members/log.php');
    }
?>
    <head>
    <style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    background: #fcfcfc;
}
footer{
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: #111;
    height: auto;
    width: 100vw;
    font-family: "Open Sans";
    padding-top: 40px;
    color: #fff;
}
.footer-content{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
}
.footer-content h3{
    font-size: 1.8rem;
    font-weight: 400;
    text-transform: capitalize;
    line-height: 3rem;
}
.footer-content p{
    max-width: 500px;
    margin: 10px auto;
    line-height: 28px;
    font-size: 14px;
}


.footer-bottom{
    background: #000;
    width: 100vw;
    padding: 20px 0;
    text-align: center;
}
.footer-bottom p{
    font-size: 14px;
    word-spacing: 2px;
    text-transform: capitalize;
}
.footer-bottom span{
    text-transform: uppercase;
    opacity: .4;
    font-weight: 200;
}
	
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
        <link rel="stylesheet" href="../style.css">
        <script src="https://kit.fontawesome.com/f52401267a.js" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script>
	
			function getPaging(str) {
				if (str === "home") {
					// $("#content").load("../index.php ");
					location.replace("../index.php")
				} else {
					$("#content").load("./"+str+".php");
				}
			
			}
		</script>
		<script>
        
        function send() {
        xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = Result;

       
		var recep = document.getElementById("rep").value;
        var url= "stutus.php?Num_re=" + recep;
       console.log(url);
       xmlHttp.open("GET", url);
       xmlHttp.send();   
   }
   function Result() {
       if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
           document.getElementById("result").innerHTML = xmlHttp.responseText;
       }
   }
    </script>
	<?php
include('./Members/ser.php');

$stmt = $pdo->prepare("SELECT * FROM `receipt`,`pond`,`supplier`,`transport`,`farm` WHERE `receipt`.`Pond`=`pond`.`Pond` AND `pond`.`COMPANY`=`supplier`.`COMPANY` AND `pond`.`Pond`=`farm`.`Pond` AND `farm`.`Name_Comp`=`transport`.`Name_Comp` AND `Phone_cus`=? ");
$stmt->bindParam(1,$Phone);
$stmt->execute(); 
?>	
    </head>
    <body>
        <div class="banner">
            <div class="navbar">
                <img src="../logo.jpg" width="150px" height="150px">
                <ul>
				<li><a href="#" id="home" onclick="getPaging(this.id)">Home</a></li>
				<li><a href="#about" id="about" onclick="getPaging(this.id)">About</a></li>
                <li class="dropdown"><a href="profile.php"><i class="fa-solid fa-user"></i>  <?php
				if (!isset($_SESSION['username'])) {
					echo "Profile";
				}else{
					echo $_SESSION["username"];
				}
				?></a>
                        <ul class="dis">
						<li><a href="#" id="status" >Status</a></li>
						<li><a href="receipt.php" id="receipt" >Receipt</a></li>
						<li><a href="../index.php?logout='1'">Logout</a></li>
					</ul>
                    </li>
                </ul>
            </div>
        </div>
		<div class="content" id="content">
			<h3>STATUS</h3>
			<header>
				<a style="color:brown" href="receipt.php">นำเลขใบเสร็จมาใช้ในการค้นหา</a>
				<input type="text" id="rep" name="Num_re"  
				pattern="[0-9]{7,}"
				placeholder="999999" onchange="send()">

                </header>
                <br>
                <br>
                <br>
              <center>
				
                 
              <div  id="result"></div> 
            
				
                
                
              </center> 
        </div>
        
        <footer>
	<div class="footer-content">
            <h3>ติดต่อเราที่เบอร์</h3>
	<ul class="list-inline">
        <li class="fa-solid fa-square-phone"></i>098-XXX-XXXX</li>
        <li class="fa fa-youtube"><a style="color:#fcfcfc;" href="https://www.youtube.com/@PatiphanPhengpao">CREDIT</a></li>
        <li class="fa fa-instagram"><a style="color:#fcfcfc;" href="https://www.instagram.com/inkwaruntorn/?hl=th">INK</a></li>
			</ul>
	</div>
	<div class="footer-bottom">
	 <p>codeOpacity. designed by CS63</p>
	</div>
	</footer>    
 

    </body>
</body>
</html>