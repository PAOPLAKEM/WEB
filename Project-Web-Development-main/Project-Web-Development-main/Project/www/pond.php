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
	<style>
		table, th, td {
			border: 1px solid white;
			border-collapse: collapse;
			padding: 15px;
			text-align: center;
			color: white;
			
		}
	</style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    	google.charts.load('current', {'packages':['corechart']});
    	google.charts.setOnLoadCallback(drawChart);

    	async function drawChart() {

			var pond = '<?php echo $_GET["pond"] ;?>'
			console.log(pond);

			let response = await fetch('empdata3.json')
			let rawData = await response.text()
			let objectData = JSON.parse(rawData)


			var data = google.visualization.arrayToDataTable([
				['Task', 'Hours per Day'],
				['Pond_O2', parseInt(objectData[pond-1]["Pond_O2 %"])],
				['Pond_Mg', parseInt(objectData[pond-1]["Pond_Mg %"])],
				['Pond_Ca', parseInt(objectData[pond-1]["Pond_Ca %"])],
				['Pond_Na', parseInt(objectData[pond-1]["Pond_Na %"])]
					
			]);

			var options = {
					'title': `Pond ${pond}`,
					'titleTextStyle': {
						color: 'white',
						fontSize: '24',
					},
					is3D: true,
					'width': 500,
					'height': 350,
					backgroundColor: 'transparent',
					legend : {position: 'right', textStyle: {color: 'white', fontSize: 16}},
				};

			var chart = new google.visualization.PieChart(document.getElementById('piechart'));

			chart.draw(data, options);

			let mytable = document.getElementById("table")

			console.log(Object.keys(objectData[pond-1]).length);
			console.log(objectData[pond-1]["Pond_O2 %"]);

			var col = document.createElement("tr")
			var col_head = document.createElement("tr")

			var obj_pond = objectData[pond-1]


			for (const property in obj_pond) {
				var cell_head = document.createElement("td")
				cell_head.innerHTML = property
				col_head.appendChild(cell_head)
			}

			mytable.appendChild(col_head)

			for (const property in obj_pond) {
				var cell = document.createElement("td")
				cell.innerHTML = obj_pond[property]
				col.appendChild(cell)
			}


			mytable.appendChild(col)
    	}
    </script>
  </head>
  <body>
	<div class="banner">
		<center>
    	<div id="piechart" ></div>
		<table id="table" ></table>
		</center>
	</div>
		
  </body>
</html>