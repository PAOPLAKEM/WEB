<?php 
    session_start();
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: ../index.php');
    }
	?>
<h1>Product</h1>
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
<script>
	
</script>

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