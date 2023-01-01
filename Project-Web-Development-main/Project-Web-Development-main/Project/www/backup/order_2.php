<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        header('location:./Paging//Members//log.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location:./Paging//Members//log.php');
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
	}

	
	center {
		padding-top: 50px;
	}
	ol {
		color: white;
		display: inline-table;
		margin-left: 200px;
	}
	</style>
	<script>

		// * list
		var Cart = []
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
			let response = await fetch('./empdata2.json')
			let rawData = await response.text()
			let objectData = JSON.parse(rawData)

			console.log(objectData);

			let mytable = document.getElementById("table")

			
			
			
			for (var i = 1; i <= objectData.length; i++) {
				
				if( i == 1) {
					var col = document.createElement("tr")
				}

				var cell = document.createElement("td")
				cell.innerHTML = `<a href="./pond.php?pond=${i}">`+objectData[i-1].Pond + "</a><br><button "+" class='Pond_"+i+"' "+` onclick=list('${i}')`+">ADD TO CART</button>"
				col.appendChild(cell)
				

				if(i % 3 == 0) {
					mytable.appendChild(col)
					var col = document.createElement("tr")
				}

				// if(i % 3 == 1 && i != 1) {
				// 	var col = document.createElement("tr")
				// }

				
			}
			
		}
	</script>
</head>
<body onload="Load_Data()">
	<div class="banner">
		<center>
			<table id="table" ></table>
			<ol id="list">
				<h2>My Cart</h2>
				<button type="button" onclick="Set_Session(Cart)">CONFIRM</button>
			</ol>

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
	</script>
</body>