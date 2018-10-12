<?php
		session_start();

	$subcode=$_GET['subcode'];
	$weekS=$_GET['weekS']; 
	// don't get decision using week. here we need subcode. show result of all weeks one by one.
	// input subcode only
	// resuts shows group by week 1 and others.
	//add a week suggestion combo box
	//$_SESSION['subcodefrmsub']=$subcode;
	$lecturer=$_SESSION['userNameL'];
	include("../FeedbackStudents/config.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Report Monthly</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script 
  			src="https://code.jquery.com/jquery-3.3.1.js"
  			integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  			crossorigin="anonymous">
  	</script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
</head>
<body>

	<!-- 2nd edit begins-->
	<div>
		<ul class="navbar">
			<li class="navbttn"><a class="active" onclick="logout()" href="../MainLecturers/mainLec.php?userNameL=<?php echo($lecturer); ?>" >Home</a></li>
			<!--<li class="navbttn"><a href="#news">News  </a></li>
			<li class="navbttn"><a href="#contact">Contact</a></li>-->
			<li class="navbttn"><a><?php echo($_SESSION['userNameL']) ?></a></li>
		</ul>

	</div>
	<!-- 2nd edit ends-->

	<!-- 1st edit Begin-->
	<div class="nav-side-menu">
		<div class="Logo1"><img src="css/logo2newnew.png" alt="Logo" class="Logo"></div>
		<div class="brand"></div>
		<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
		<div class="menu-list">
			<ul id="menu-content" class="menu-content collapse out">
				<li id="mainpage">
					<a>
						<i class="fa fa-dashboard fa-lg"></i> Aggregate Reports
					</a>
				</li>
				<li>
					<a href="../LReportMain/LReportMain.php?subcode=<?php echo($subcode); ?>&weekS=<?php echo($weekS); ?>">
						<i class="fa fa-dashboard fa-lg"></i> Weekly Reports
					</a>

				</li>
				<li>
					<a href="../MainLecturers/mainLec.php?userNameL=<?php echo($lecturer); ?>">
						<i class="fa fa-user fa-lg"></i> Whats New
					</a>
				</li>
				<!-- <li>
					<a href="#">
						<i class="fa fa-users fa-lg"></i> Feedbacks
					</a>
				</li> -->
				<li id="exit">
					<a href="../LReportSelection/LReportDecision.php">
						Exit
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- 1st edit Ends -->

<div id = "homeWelcome">
		<h2 align="center">Aggregate Reports of <?php echo($_SESSION['userNameL']) ?>'s class <?php echo($_GET['subcode']) ?> </h2>
			<fieldset id="line2">
				<div>
					<?php
					//$query = $db->query("SELECT DISTINCT Week FROM sessionafterfeedbacks WHERE Subject_Code = '".$_GET['subcode']."'");
					echo "<p>Please press a question to get Aggrigate reports";
					
					echo '<form id="aggrigatefrm1" action="data.php" method="GET">';
										
					echo '<input type="submit" name="submit" value="Do you understand this lecture?" /></p>';
						
					echo '</form>';

					echo '<form id="aggrigatefrm2" action="data2.php" method="GET">';
										
					echo '<input type="submit" name="submit" value="Do you like the method of presentation used by the lecturer?" /></p>';
						
					echo '</form>';

					echo '<form id="aggrigatefrm3" action="data3.php" method="GET">';
										
					echo '<input type="submit" name="submit" value="Do you think that the nessassary area is covered within the time period?" /></p>';
						
					echo '</form>';

					echo '<form id="aggrigatefrm4" action="data4.php" method="GET">';
										
					echo '<input type="submit" name="submit" value="Do you like the method of presentation used by the lecturer?" /></p>';
						
					echo '</form>';

				?>
				<button class="no-print btn btn-primary" style="float: right; margin-right: 30px; margin-top: 30px; width: 100px; background-color: #008CBA;" onclick="window.print();"><span class="fa fa-print"></span>&nbsp;Print</button>

				</div>
			</fieldset>
			

			<fieldset id="line">
				<div class="chart-container">
					<div class="question1">
						<canvas id="aggrigate-question1"></canvas>
					</div>
		
				</div>
				<br>
				<div class="chart-container">
					<div class="question2">
						<canvas id="aggrigate-question2"></canvas>
					</div>
		
				</div>
				<br>
				<div class="chart-container">
					<div class="question3">
						<canvas id="aggrigate-question3"></canvas>
					</div>
		
				</div>
				<br>
				<div class="chart-container">
					<div class="question4">
						<canvas id="aggrigate-question4"></canvas>
					</div>
		
				</div>
				<br>
				
			</fieldset>

	</div>
<script type="text/javascript">

	var chart1A;
	var chart2A;
	var chart3A;
	var chart4A;
	
	var frm = $('#aggrigatefrm1');

	frm.submit(function (e){

		// var formdata = {
		// 	'SubjectID' : $subcode
		// }
		$.ajax({
			type: "GET",
            url: "data.php",

            success: function (data1)
            {
            	console.log(data1);

            	

            	var scoreA = {
            		weekQ1 : [],
            	   	};

            	var labelA = {
            		weekQ1Label : [],
            		
            	};

            	var len = data1.length;



            	for (var i=0; i < len; i++)
            	{            		          		
            			scoreA.weekQ1[i] = (data1[i].avgques1)/4*100;

            		
            	}

            	for (var j=0; j < len; j++)
            	{
            		labelA.weekQ1Label.push(data1[j].WeekQ1);
            	}
            	console.log(scoreA);
            	console.log(labelA);

            	var stx1 = document.getElementById('aggrigate-question1').getContext("2d");

            	var data1A = {
            		labels : labelA.weekQ1Label,
            		datasets : [
                	{
                		label : "Do you understand this lecture?",
                		//actual question needed
                		data : scoreA.weekQ1,
                		 
                		backgroundColor : [
                			"#C0392B",
                			"#F39C12",
                			"#2980B9",
                			"#7F8C8D",
                			"#16A085"
                		],
                		borderColor : [
                			"#A93226",
                			"#B9770E",
                			"#1F618D",
                			"#616A6B",
                			"#1E8449"
                		],
                		borderWidth : [1, 1, 1, 1, 1]
                	}
                	]
            	};

            	var option1A = {
                	title : {
                		display : true,
                		position : "top",
                		text : "Q: Do you understand this lecture?",
                		fontSize : 18,
                		fontColor : "#111"
                	},
                	legend : {
                		display : true,
                		position : "bottom"
                	},
                	scales: {
				        yAxes: [{
				            ticks: {
				                beginAtZero:true,
				                steps: 10,
                                stepValue: 10,
				                max: 100
				            },
				            scaleLabel: {
					        	display: true,
					        	labelString: 'Presentage'
					      }
				        }],
				        xAxes: [{
					      scaleLabel: {
					        display: true,
					        labelString: 'Week Number'
					      }
					    }]
				    }
				    
                };

                chart1A = new Chart( stx1, {
                	type : 'bar',
                	data : data1A,
                	options : option1A
                });


            },
            error: function (data1){
            	console.log(data1);
            },
		});
		e.preventDefault();

});

			var frm2 = $('#aggrigatefrm2');

			frm2.submit(function (e){

			$.ajax({
			type: "GET",
            url: "data2.php",

            success: function (data2)
            {
            	console.log(data2);

            	

            	var scoreA = {
            		weekQ2 : [],
            	   	};

            	var labelA = {
            		weekQ2Label : [],
            		
            	};

            	var len = data2.length;



            	for (var i=0; i < len; i++)
            	{            		          		
            			scoreA.weekQ2[i] = (data2[i].avgques2)/4*100;
            		
            	}

            	for (var j=0; j < len; j++)
            	{
            		labelA.weekQ2Label.push(data2[j].WeekQ2);
            	}
            	console.log(scoreA);
            	console.log(labelA);

            	var stx2 = document.getElementById('aggrigate-question2').getContext("2d");

            	var data2A = {
            		labels : labelA.weekQ2Label,
            		datasets : [
                	{
                		label : "Do you like the method of presentation used by the lecturer?",
                		//actual question needed
                		data : scoreA.weekQ2,
                		backgroundColor : [
                			"#C0392B",
                			"#F39C12",
                			"#2980B9",
                			"#7F8C8D",
                			"#16A085"
                		],
                		borderColor : [
                			"#A93226",
                			"#B9770E",
                			"#1F618D",
                			"#616A6B",
                			"#1E8449"
                		],
                		borderWidth : [1, 1, 1, 1, 1]
                	}
                	]
            	};

            	var option2A = {
                	title : {
                		display : true,
                		position : "top",
                		text : "Q: Do you like the method of presentation used by the lecturer?",
                		fontSize : 18,
                		fontColor : "#111"
                	},
                	legend : {
                		display : true,
                		position : "bottom"
                	},
                	scales: {
				        yAxes: [{
				            ticks: {
				                beginAtZero:true,
				                steps: 10,
                                stepValue: 10,
				                max: 100
				            },
				            scaleLabel: {
					        	display: true,
					        	labelString: 'Presentage'
					      }
				        }],
				        xAxes: [{
					      scaleLabel: {
					        display: true,
					        labelString: 'Week Number'
					      }
					    }]
				    }
                };

                chart2A = new Chart( stx2, {
                	type : 'bar',
                	data : data2A,
                	options : option2A
                });


            },
            error: function (data2){
            	console.log(data2);
            },
		});

		e.preventDefault();

	});

			var frm3 = $('#aggrigatefrm3');

			frm3.submit(function (e){

			$.ajax({
			type: "GET",
            url: "data3.php",

            success: function (data3)
            {
            	console.log(data3);

            	

            	var scoreA = {
            		weekQ3 : [],
            	   	};

            	var labelA = {
            		weekQ3Label : [],
            		
            	};

            	var len = data3.length;



            	for (var i=0; i < len; i++)
            	{            		          		
            			scoreA.weekQ3[i] = (data3[i].avgques3)/4*100;
            		
            	}

            	for (var j=0; j < len; j++)
            	{
            		labelA.weekQ3Label.push(data3[j].WeekQ3);
            	}
            	console.log(scoreA);
            	console.log(labelA);

            	var stx3 = document.getElementById('aggrigate-question3').getContext("2d");

            	var data3A = {
            		labels : labelA.weekQ3Label,
            		datasets : [
                	{
                		label : "Do you think that the nessassary area is covered within the time period?",
                		//actual question needed
                		data : scoreA.weekQ3,
                		backgroundColor : [
                			"#C0392B",
                			"#F39C12",
                			"#2980B9",
                			"#7F8C8D",
                			"#16A085"
                		],
                		borderColor : [
                			"#A93226",
                			"#B9770E",
                			"#1F618D",
                			"#616A6B",
                			"#1E8449"
                		],
                		borderWidth : [1, 1, 1, 1, 1]
                	}
                	]
            	};

            	var option3A = {
                	title : {
                		display : true,
                		position : "top",
                		text : "Q: Do you think that the nessassary area is covered within the time period?",
                		fontSize : 18,
                		fontColor : "#111"
                	},
                	legend : {
                		display : true,
                		position : "bottom"
                	},
                	scales: {
				        yAxes: [{
				            ticks: {
				                beginAtZero:true,
				                steps: 10,
                                stepValue: 10,
				                max: 100
				            },
				            scaleLabel: {
					        	display: true,
					        	labelString: 'Presentage'
					      }
				        }],
				        xAxes: [{
					      scaleLabel: {
					        display: true,
					        labelString: 'Week Number'
					      }
					    }]
				    }
                };

                chart3A = new Chart( stx3, {
                	type : 'bar',
                	data : data3A,
                	options : option3A
                });


            },
            error: function (data3){
            	console.log(data3);
            },
		});

		e.preventDefault();

	});


			var frm4 = $('#aggrigatefrm4');

			frm4.submit(function (e){

			$.ajax({
			type: "GET",
            url: "data4.php",

            success: function (data4)
            {
            	console.log(data4);

            	

            	var scoreA = {
            		weekQ4 : [],
            	   	};

            	var labelA = {
            		weekQ4Label : [],
            		
            	};

            	var len = data4.length;



            	for (var i=0; i < len; i++)
            	{            		          		
            			scoreA.weekQ4[i] = (data4[i].avgques4)/4*100;
            		
            	}

            	for (var j=0; j < len; j++)
            	{
            		labelA.weekQ4Label.push(data4[j].WeekQ4);
            	}
            	console.log(scoreA);
            	console.log(labelA);

            	var stx4 = document.getElementById('aggrigate-question4').getContext("2d");

            	var data4A = {
            		labels : labelA.weekQ4Label,
            		datasets : [
                	{
                		label : "Do you think that the nessassary area is covered within the time period?",
                		//actual question needed
                		data : scoreA.weekQ4,
                		backgroundColor : [
                			"#C0392B",
                			"#F39C12",
                			"#2980B9",
                			"#7F8C8D",
                			"#16A085"
                		],
                		borderColor : [
                			"#A93226",
                			"#B9770E",
                			"#1F618D",
                			"#616A6B",
                			"#1E8449"
                		],
                		borderWidth : [1, 1, 1, 1, 1]
                	}
                	]
            	};

            	var option4A = {
                	title : {
                		display : true,
                		position : "top",
                		text : "Q: Do you think that the nessassary area is covered within the time period?",
                		fontSize : 18,
                		fontColor : "#111"
                	},
                	legend : {
                		display : true,
                		position : "bottom"
                	},
                	scales: {
				        yAxes: [{
				            ticks: {
				                beginAtZero:true,
				                steps: 10,
                                stepValue: 10,
				                max: 100
				            },
				            scaleLabel: {
					        	display: true,
					        	labelString: 'Presentage'
					      }
				        }],
				        xAxes: [{
					      scaleLabel: {
					        display: true,
					        labelString: 'Week Number'
					      }
					    }]
				    }
                };

                chart4A = new Chart( stx4, {
                	type : 'bar',
                	data : data4A,
                	options : option4A
                });


            },
            error: function (data4){
            	console.log(data4);
            },
		});

		e.preventDefault();

	});


</script>

</body>
</html>