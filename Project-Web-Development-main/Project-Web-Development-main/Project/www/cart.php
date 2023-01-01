<?php
	session_start();

?>

<html>
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
	<style>
		table, th, td {
			border: 1px solid white;
			border-collapse: collapse;
			padding: 15px;
			text-align: center;
			color: white;
			
		}
	</style>
	<script>
			var Phone ="<?php echo $_SESSION["Phone"];?>"
			var st = "<?php echo $_GET["Pond"] ;?>"
			var stp = st.split(",")
			<?php
				$arr = $_GET["Pond"] ;
				

				if(strpos($arr, ",") !== false) {

					$list = explode(",",$arr);
					unset($_SESSION['cart']) ;

					if (!isset($_SESSION["cart"])) {
						$_SESSION["cart"] = array() ;

						for ($i= 0 ; $i < count($list); $i++) { 
							array_push($_SESSION["cart"],$list[$i]) ;
						}


					}
				}
				else
				{
					unset($_SESSION['cart']) ;
					$_SESSION["cart"] = array() ;
					array_push($_SESSION["cart"],$arr) ;
				}
			?>
			console.log("<?php echo $_SESSION["cart"][0];?>");
			var cost_sum = 0

		async function Load_Data() {
			let response = await fetch('./empdata2.json')
			let rawData = await response.text()
			let objectData = JSON.parse(rawData)

			let mytable = document.getElementById("table_cart")
			
			
			
			for (var i = 0; i < stp.length; i++) {

				var col = document.createElement("tr")
			
				var cell = document.createElement("td")
				cell.innerHTML=objectData[stp[i]-1].Pond
				
				var cell2 = document.createElement("td")
				cell2.innerHTML=objectData[stp[i]-1].Pond_size
				
				
				var cell3 = document.createElement("td")
				cell3.innerHTML=objectData[stp[i]-1].type_shrimp


				var cell4 = document.createElement("td")
				cell4.innerHTML=objectData[stp[i]-1].cost

				var cell5 = document.createElement("td")
				cell5.innerHTML=`<button id="${objectData[stp[i]-1].Pond}" onclick="Delete_Session(this.id)">delete</button>`

				cost_sum = cost_sum + parseInt(objectData[stp[i]-1].cost) ;

				col.appendChild(cell)
				col.appendChild(cell2)
				col.appendChild(cell3)
				col.appendChild(cell4)
				col.appendChild(cell5)

				mytable.appendChild(col)
			}

			var col_cost = document.createElement("tr")
			var cell_cost = document.createElement("td")
			cell_cost.id="cost"
			cell_cost.colSpan="5"
			cell_cost.innerHTML = "Sum :" + cost_sum
			col_cost.appendChild(cell_cost)
			mytable.appendChild(col_cost)
		}


		async function Delete_Session(num_delete) {
			let response = await fetch('./empdata3.json')
			let rawData = await response.text()
			let objectData = JSON.parse(rawData)


			let mytable = document.getElementById("table_cart")
			let current_cost = document.getElementById("cost")
			cost_sum = cost_sum - objectData[num_delete-1].cost

			current_cost.innerHTML = "Sum : " + cost_sum ;

			console.log(stp.indexOf(num_delete));
			var index_del = stp.indexOf(num_delete) ;
			stp.splice(index_del,1)
			console.log(stp);
			mytable.removeChild(mytable.children[index_del+1])
			// mytable.removeChild(mytable.children[1])
			// var test = ["2","4"]
			if (stp.length === 0) {
				location.href='./cart.php?Pond=0'
			}
			else {
				
				location.href='./cart.php?Pond=' + stp;
			}
			


		}
	</script>
	<?php 
        //    include('./Paging/Members/ser.php');
        //    $stmt = $pdo->prepare("SELECT * FROM pond WHERE `Pond`IN (?)");
		//    $stmt->bindParam(1,$_GET["Pond"]);
        //    $stmt->execute();
		   ?>
<body onload="Load_Data()">

	<script>


	</script>

	<div class="banner">
		<center>
			<h1 style="color: white;">My Cart</h1>
			<table id="table_cart" >
				<tr>
					<th>Item</th>
					<th>Pond Size</th>
					<th>Type</th>
					<th>Cost</th>
					<th>delete</th>
				</tr>
			</table>
			<button type="button" onclick="location.href=`./Paging/Members/updPH.php?Pond=${stp}&Phnumber=${Phone}`">PAY</button>
			

		</center>
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
	</div>
</body>
</html>
