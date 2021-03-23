<head>
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="canvasjs.min.js"></script>
<script type="text/javascript">
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",{
			theme: "light2", // "light1", "light2", "dark1", "dark2"
	animationEnabled: true,
	zoomEnabled: true,
		title:{
			text:"Rendering Multi Series Chart from database"
		},
		data: [{
			type: "area",
			dataPoints : [],
		},
		{
			type: "line",
			dataPoints : [],
		}]
	});
		
	$.getJSON("service.php", function(data) {  
		$.each((data), function(key, value){
			chart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
			chart.options.data[1].dataPoints.push({label: value[0], y: parseInt(value[2])});		
		});
		chart.render();
		updateChart();
	});

	function updateChart() {
		$.getJSON("service.php", function(data) {		
			chart.options.data[0].dataPoints = [];
			chart.options.data[1].dataPoints = [];
			$.each((data), function(key, value){
				chart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
				chart.options.data[1].dataPoints.push({label: value[0], y: parseInt(value[2])});		
			});
			
			chart.render();
		});
	}
	
	setInterval(function(){updateChart()}, 60000);
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 360px; width: 100%;"></div>
</body>
</html>