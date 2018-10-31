
$(document).ready(function(){

	$.ajax({
		url : "http://oketafred.ga/ajax_graph/data.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var parameters = {
				temperature : [],
				liquid_level : [],
				voltage_input : [],
				voltage_output : [],
				inserted_time : []
			};

			var len = data.length;

			for (var i = 0; i < len; i++) {
				if (data[i].temperature) {
					parameters.temperature.push(data[i].temperature); 
				}
				if (data[i].liquid_level) {
					parameters.liquid_level.push(data[i].liquid_level); 
				}
				if (data[i].voltage_input) {
					parameters.voltage_input.push(data[i].voltage_input); 
				}
				if (data[i].voltage_output) {
					parameters.voltage_output.push(data[i].voltage_output); 
				}
				if (data[i].inserted_time) {
					parameters.inserted_time.push(data[i].inserted_time);
				}
			}

			console.log(parameters);

			var ctx = $("#myChart");

			//Global Variables
			Chart.defaults.global.defaultFontFamily = 'Lato';
		    Chart.defaults.global.defaultFontSize = 18;
		    Chart.defaults.global.defaultFontColor = '#777';

			var data = {
				//parameters.inserted_time
				labels : parameters.inserted_time,
				datasets : [
					{
						label : "Temperature",
						data : parameters.temperature,
						backgroundColor : "#007bff",
						borderColor : "#007bff",
						fill : false,
						borderWidth: 3
					},
					{
						label : "Liquid_level",
						data : parameters.liquid_level,
						backgroundColor : "#28a745",
						borderColor : "#28a745",
						fill : false,
						borderWidth: 3
					},
					{
						label : "Voltage Input",
						data : parameters.voltage_input,
						backgroundColor : "#dc3545",
						borderColor : "#dc3545",
						fill : false,
						borderWidth: 3
					},
					{
						label : "Voltage Output",
						data : parameters.voltage_output,
						backgroundColor : "#ffc107",
						borderColor : "#ffc107",
						fill : false,
						borderWidth: 3
					}
				]
			};

			var options = {
				title : {
					 display : true,
					 position : "top",
					 text : "Transformer Parameters against Time",
					 fontSize : 25,
					 fontColor : "#333"
				},
				legend : {
					display : true,
					position : "bottom",
					labels:{
		              fontColor: '#000'
		            }
				},
				scales: {
	            yAxes: [{
	              scaleLabel: {
	                display: true,
	                labelString: 'Parameters Values',
	                fontSize: 18
	              }
	            }],
	            xAxes: [{
	              scaleLabel: {
	                display: true,
	                labelString: 'Time Delivered',
	                fontSize: 18
	              }
	            }]
	          }
			}


			var chart = new Chart(ctx, {
				type : "line",
				data : data,
				options : options

			});




		},
		error : function(data){
			console.log(data);
		}

	});

});