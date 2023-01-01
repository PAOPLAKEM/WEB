<?php 
    	session_start();
    	if (isset($_GET['logout'])) {
        	session_destroy();
        	unset($_SESSION['username']);
        	header('location: index.php');
    	}
	?>
<html>

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
	<link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/f52401267a.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
	
	

		function getPaging(str) {
			if (str === "home") {
				$("#content").load("index.php #content");
			} else {
				$("#content").load("./Paging/"+str+".php");
			}
			
		}
	</script>

	
</head>

<body >
	<div class="banner">
		<div class="navbar">
			<img src="logo.jpg" width="150px" height="150px">
			<ul>
				<li><a href="#" id="home" onclick="getPaging(this.id)">Home</a></li>
				<li><a href="#about" id="about" onclick="getPaging(this.id)">About</a></li>
			
				<li class="dropdown"><a href="./Paging/profile.php" id="profile"><i class="fa-solid fa-user"></i> <?php
				if (!isset($_SESSION['username'])) {
					echo "Profile";
				}else{
					echo $_SESSION["username"];
				}
				?></a>
				<ul class="dis">
						<li><a href="./Paging/status.php" id="status" >Status</a></li>
						<li><a href="./Paging/receipt.php" id="receipt" >Receipt</a></li>
						<li><a href="index.php?logout='1'">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="content" id="content">
		<h1 style="font-size: 50px;">FARM</h1>
		<video width="500" height="300" controls>
  <source src="./img/690485922.395949.mp4" type="video/mp4">

</video>
<br>
<br>
		<h3>หากคุณต้องกุ้งสด สะอาด กำไรดี มีคุณภาพ มาหาเราสิครับ!!</h3>
		
		 
		<div>
			<button type="button" onclick="location.href='order_2.php'"><span></span>ORDER</button>
		</div>
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

</html>