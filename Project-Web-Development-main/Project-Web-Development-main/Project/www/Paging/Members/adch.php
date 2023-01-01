<?php 
	session_start();
?>
<html>

<head>
	<link rel="stylesheet" href="../../style.css">
	<script src="https://kit.fontawesome.com/f52401267a.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
	
	

		function getPaging(str) {
			if (str === "home") {
				$("#content").load("adch.php #content");
			} else {
				$("#content").load("./Paging/"+str+".php");
			}
			
		}
	</script>

	<?php 
    	
    	if (isset($_GET['logout'])) {
        	session_destroy();
        	unset($_SESSION['username']);
        	header('location: index.php');
    	}
	?>
</head>

<body >
	<div class="banner">
		<div class="navbar">
			<img src="logo.jpg" width="150px" height="150px">
			<ul>
				<li><a href="#" id="home" onclick="getPaging(this.id)">UPDATE</a></li>
				<li><a href="#about" id="about" onclick="getPaging(this.id)">PAID</a></li>
			</ul>
		</div>
	</div>
	<div class="content" id="content">
		<h1>Test</h1>
		<p>Test</p>
		<?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        
                    ?>
                </h3>
            </div>
        <?php endif ?>  
		<div>
			<button type="button" onclick="location.href='./order.php'"><span></span>ORDER</button>
		</div>
	</div>

	
</body>

</html>