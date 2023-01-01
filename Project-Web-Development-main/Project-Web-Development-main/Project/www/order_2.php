<?php 
	include "order_connect_db.php" ;
    session_start();

    if (!isset($_SESSION['username'])) {
        header('location:./Paging/Members/log.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location:./Paging/Members/log.php');
    }
?>
<head>
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
	table {
		display: inline-table;
		margin-top: 50px;
	}
	form {
		display: block;
		margin-right: 500px;
		color: white;
	}
	
	center {
		padding-top: 50px;
	}
	ol {
		color: white;
		display: inline-table;
		margin-left: 200px;
		font-size: 20px;
	}
	a {
		color: white;
	/* Disabled link styles */
	}
	h2 {
		color: white;
 	}

	</style>
	<script >

		// * list
		var Cart = [] ;

		
		
		function list(num) {
			
			if(Cart.includes(num)) {

			}else {
				Cart.push(num)
				var cart = document.getElementById("list");
				var li = document.createElement("li");
				li.innerHTML = Cart[Cart.length-1];
				cart.appendChild(li)
				
			}
			
			// if(Cart.length != 0) {
				
			// 	var cart = document.getElementById("list");
			// 	var li = document.createElement("li");
			// 	li.innerHTML = Cart[Cart.length-1];
			// 	cart.appendChild(li)
					
			
			// }
			
			alert(Cart)
		}

		// * SetSession
		function Set_Session(Cart) {
			if(Cart.length != 0) {
				alert(Cart)
				location.href='./cart.php?Pond=' + Cart;
			}
			
			
		}

		// * load_data
		async function Load_Data() {
			<?php
				$emparray = array();
				while($row =mysqli_fetch_assoc($chartQueryRecords))
				{
					$emparray[] = $row;
				}

				$fp = fopen('empdata3.json', 'w');
				fwrite($fp, json_encode($emparray, JSON_UNESCAPED_UNICODE));
				fclose($fp);

				?>
			let response = await fetch('./empdata3.json')
			let rawData = await response.text()
			let objectData = JSON.parse(rawData)

			let mytable = document.getElementById("table")

			var col = document.createElement("tr")


			
			for (var i = 1; i <= objectData.length; i++) {
				
				if(objectData[i-1].Phnumber == null && objectData[i-1].type_shrimp != null) {
					
					console.log(objectData[i-1].Pond);
					var cell = document.createElement("td")
					cell.id = objectData[i-1].Pond
					cell.innerHTML = `<a href="./pond.php?pond=${i}">`+objectData[i-1].Pond + `</a><img src="img/${objectData[i-1].Pond}.jpg" width="150" height="150"><br>`+"<button "+" class='Pond_"+i+"' "+` onclick=list('${i}')`+">ADD TO CART</button>"
					col.appendChild(cell)
					

					
						mytable.appendChild(col)
						var col = document.createElement("tr")
					

				// if(i % 3 == 1 && i != 1) {
				// 	var col = document.createElement("tr")
				// }

				}
			}
			
		}

		async function select_type() {
			let response = await fetch('./empdata3.json')
			let rawData = await response.text()
			let objectData = JSON.parse(rawData)

			var select = document.getElementById("select").value
			console.log(select);

			let mytable = document.getElementById("table")
			var col = document.createElement("tr")
			
			while (mytable.hasChildNodes()) {
    			mytable.removeChild(mytable.firstChild);
  			}


			  for (var i = 1; i <= objectData.length; i++) {
				
				if(objectData[i-1].Phnumber == null && objectData[i-1].type_shrimp != null) {
					
					if(select =="all") {
						var cell = document.createElement("td")
						cell.id = objectData[i-1].Pond
						cell.innerHTML = `<a href="./pond.php?pond=${i}">`+objectData[i-1].Pond + `</a><img src="img/${objectData[i-1].Pond}.jpg" width="150" height="150"><br>`+"<button "+" class='Pond_"+i+"' "+` onclick=list('${i}')`+">ADD TO CART</button>"
						
						col.appendChild(cell)
						

						
							mytable.appendChild(col)
							var col = document.createElement("tr")
						
					}
					else if((objectData[i-1].type_shrimp) == select) {

						console.log(objectData[i-1].Pond);


						var cell = document.createElement("td")
						cell.id = objectData[i-1].Pond
						cell.innerHTML = `<a href="./pond.php?pond=${i}">`+objectData[i-1].Pond + `</a><img src="img/${objectData[i-1].Pond}.jpg" width="150" height="150"><br>`+"<button "+" class='Pond_"+i+"' "+` onclick=list('${i}')`+">ADD TO CART</button>"
						col.appendChild(cell)
						

						
						
							mytable.appendChild(col)
							var col = document.createElement("tr")
						
					}
					

				}
			}
		}
	</script>
</head>
<body onload="Load_Data()">
	<div class="banner">
		<center>
			<form>
				เลือกชนิดกุ้งที่ต้องการแสดง:
				<select id="select">
					<option value="all" selected>ทั้งหมด</option>
					<option value="ขาว">ขาว</option>
					<option value="ก้ามกาม">ก้ามกาม</option>
					<option value="กุลาดำ">กุลาดำ</option>
				</select>
				<button type="button" onclick="select_type()">select</button>
			</form>
			<table id="table" ></table>
			<ol id="list">
				<h2>My Cart</h2>
				
			</ol>
			<button type="button" onclick="Set_Session(Cart)">CONFIRM</button>
			

		</center>
		
	</div>
	<script>
		// async function Load_Data() {
		// 	let response = await fetch('./empdata2.json')
		// 	let rawData = await response.text()
		// 	let objectData = JSON.parse(rawData)

		// 	console.log(objectData);

		// 	var mytable = "<table cellpadding=\"15\" cellspacing=\"0\"><tbody><tr>";

		// 	for (var i = 1; i <= objectData.length; i++) {
  		// 		if (i % 3 == 1 && i != 1) {
    	// 			mytable += "</tr><tr>";
  		// 		}
  		// 		mytable += "<td>"+objectData[i-1].Pond+"<br><button type='button' onclick='location.href='./order.php''>ORDER</button></td>";
		// 	}

		// 	mytable += "</tr></tbody></table>";

		// 	document.write(mytable);
		// }
		if( "<?php echo gettype($_SESSION["cart"]) ;?>" == "array") {
			
			Cart = <?php echo json_encode($_SESSION["cart"]); ?>;

			console.log(Cart.length);

			for (let i = 0; i < Cart.length; i++) {
				
				console.log(Cart[i]);
				var cart = document.getElementById("list");
				var li = document.createElement("li");
				li.innerHTML = Cart[i]
				cart.appendChild(li);
			}
		}
	</script>
</body>