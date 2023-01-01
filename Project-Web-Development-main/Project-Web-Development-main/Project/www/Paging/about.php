<?php 
    session_start();
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: ../index.php');
    }
	?>
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
    font-weight: 250;
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
<script>
	
</script>
<header><h2 style="color:wheat ;">บรรยากาศใน ฟาร์ม ของเรา</h2></header>
<center>
    <img src="img/S__14114828.jpg" width="250" height="250" ><img src="img/S__14114825.jpg" width="250" height="250" >
    <img src="img/S__14114836.jpg" width="250" height="250" ><br><br><br><img src="img/S__14114834.jpg" width="250" height="250" >
    <img src="img/S__14114843.jpg" width="250" height="250" ><img src="img/S__14114820.jpg" width="250" height="250" >
    
</center>