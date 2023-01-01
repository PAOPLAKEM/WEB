<?php 
	session_start();
?>
<html>

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
</head>
<script>
        
        function send() {
        xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = showResult;

       
		var Pond = document.getElementById("po").value;
        var url= "adminch.php?Pond=" + Pond;
       
       xmlHttp.open("GET", url);
       xmlHttp.send();   
   }
   function showResult() {
       if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
           document.getElementById("result").innerHTML = xmlHttp.responseText;
       }
   }
    </script>

    <body>
    <div class="banner">
		<div class="navbar">
			<img src="../../logo.jpg" width="150px" height="150px">
			<ul>
				<li><a href="#" id="home" >UPDATE</a></li>
				<li><a href="paid.php" id="paid" >PAID</a></li>
                <li><a href="farm.php" id="farm" >TRANSPORT</a></li>
                <li><a href="../../index.php?logout='1'">Logout</a></li>
			</ul>
		</div>
	</div>
	<div class="content" id="content">
    <form>
            <select name="pond" id='po' onchange="send()">
            <option value="0">--Please choose an option--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            </select>
        </form>
       <center>
    <div  id="result"></div> 
    </center> 
	</div>
         
    </body>
</html>