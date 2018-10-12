<?php
		session_start();

	$subcode=$_GET['subcode'];
	$weekS=$_GET['weekS']; 
	// don't get decision using week. here we need subcode. show result of all weeks one by one.
	// input subcode only
	// resuts shows group by week 1 and others.
	//add a week suggestion combo box
	$_SESSION['subcodefrmsub']=$subcode;
	$lecturer=$_SESSION['userNameL'];
	include("../FeedbackStudents/config.php");

?>
<!-- we need two parts; thus we have subject code we can show weekly reports and overall reports in two sections -->
<!DOCTYPE html>
<html>
<head>
	<title>Report Weekly</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script 
  			src="https://code.jquery.com/jquery-3.3.1.js"
  			integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  			crossorigin="anonymous">
  	</script>

  	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  	<script src="js/LReportJS.js"></script>
  	<!-- Latest compiled and minified CSS -->


</head>
<body>

	<!-- 2nd edit begins-->
	<div>
		<ul class="navbar">
			<li class="navbttn"><a class="active" href="../MainLecturers/mainLec.php?userNameL=<?php echo($lecturer); ?>" >Home</a></li>
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
						<i class="fa fa-dashboard fa-lg"></i> Weekly Reports
					</a>
				</li>
				<li>
					<a href="../LReportMainMonthly/LReportMainMonthly.php?subcode=<?php echo($subcode); ?>&weekS=<?php echo($weekS); ?>">
						<i class="fa fa-dashboard fa-lg"></i> Aggregate Reports
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
						Back
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- 1st edit Ends -->

	
<div id = "homeWelcome">
		<h2 align="center">Weekly Reports of <?php echo($_SESSION['userNameL']) ?>'s class <?php echo($_GET['subcode']) ?> </h2>
			<fieldset id="line2">
				<div>
					<?php
					$query = $db->query("SELECT DISTINCT Week FROM sessionafterfeedbacks WHERE Subject_Code = '".$_GET['subcode']."'");

					echo '<form id="submissionfrm" action="data.php?" method="POST">';

					echo "<p>Please enter week for get weekly report - ";
						// select begin. do changes before this comment

						echo '<select name="weekSelection" id="idweekSelection">';

							while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
							{
								echo "<option value='".$row['Week']."'>".$row['Week']."</option>";
							}
							echo "</select>";
						// select end
						echo '<input type="submit" name="submit" value="Submit" /></p>';
						
					echo '</form>';
					echo '<button id="clearBtn" onclick="clearChart()">Clear</button>';
					?>
					<button class="no-print btn btn-primary" style="float: right; margin-right: 30px; margin-top: 30px; width: 100px; background-color: #008CBA;" onclick="window.print();"><span class="fa fa-print"></span>&nbsp;Print</button>

				</div>
			</fieldset>
			

			<fieldset id="line">
				<div class="chart-container">
					<div class="question1">
						<canvas id="doughnut-question1"></canvas>
					</div>
		
				</div>
				<br>
				<div class="chart-container">
					<div class="question2">
						<canvas id="doughnut-question2"></canvas>
					</div>
		
				</div>
				<br>
				<div class="chart-container">
					<div class="question3">
						<canvas id="doughnut-question3"></canvas>
					</div>
		
				</div>
				<br>
				<div class="chart-container">
					<div class="question4">
						<canvas id="doughnut-question4"></canvas>
					</div>
		
				</div>
				<br>
				
			</fieldset>

	</div>
	<script type="text/javascript">

	var chart1;
	var chart2;
	var chart3;
	var chart4;

	
	var frm = $('#submissionfrm');

    frm.submit(function (e) {

   // var data1 = $('#idweekSelection option:selected').text();  
   var formdata = {
   	'Week' : $('#idweekSelection option:selected').text()
   };
   		
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            //data: frm.serialize(),
           // data: $('#idweekSelection option:selected').text(),
           data: formdata,
           dataType: 'json',

            
            success: function (data) {
                //console.log('Submission was successful.');
                console.log(data);

                var score = {
                	question1 : ["0","0","0","0","0"],
                	question2 : ["0","0","0","0","0"],
                	question3 : ["0","0","0","0","0"],
                	question4 : ["0","0","0","0","0"]
                };
                //questions add
                var len = data.length;
                //console.log(len);           	
                
                for (var i = 0; i < len; i++)
                {
                	if (data[i].question1 == "0" || data[i].question1 == "1" || data[i].question1 == "2" || data[i].question1 == "3" || data[i].question1 == "4" )
                	{
		                	if (data[i].question1 == "0")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question1[0] = data[i].cquestion1;
		                	}
		                	else if (data[i].question1 == "1")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question1[1] = data[i].cquestion1;
		                	}
		                	else if (data[i].question1 == "2")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question1[2] = data[i].cquestion1;
		                	}
		                	else if (data[i].question1 == "3")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question1[3] = data[i].cquestion1;
		                	}
		                	else if (data[i].question1 == "4")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question1[4] = data[i].cquestion1;
		                	}
		               }

		            else if (data[i].question2 == "0" || data[i].question2 == "1" || data[i].question2 == "2" || data[i].question2 == "3" || data[i].question2 == "4" )
		            {
		                	if (data[i].question2 == "0")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question2[0] = data[i].cquestion2;
		                	}
		                	else if (data[i].question2 == "1")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question2[1] = data[i].cquestion2;
		                	}
		                	else if (data[i].question2 == "2")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question2[2] = data[i].cquestion2;
		                	}
		                	else if (data[i].question2 == "3")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question2[3] = data[i].cquestion2;
		                	}
		                	else if (data[i].question2 == "4")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question2[4] = data[i].cquestion2;
		                	}
		            }

		            else if (data[i].question3 == "0" || data[i].question3 == "1" || data[i].question3 == "2" || data[i].question3 == "3" || data[i].question3 == "4" )
		            {
		                	if (data[i].question3 == "0")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question3[0] = data[i].cquestion3;
		                	}
		                	else if (data[i].question3 == "1")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question3[1] = data[i].cquestion3;
		                	}
		                	else if (data[i].question3 == "2")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question3[2] = data[i].cquestion3;
		                	}
		                	else if (data[i].question3 == "3")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question3[3] = data[i].cquestion3;
		                	}
		                	else if (data[i].question3 == "4")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question3[4] = data[i].cquestion3;
		                	}
		            }

		            else if (data[i].question4 == "0" || data[i].question4 == "1" || data[i].question4 == "2" || data[i].question4 == "3" || data[i].question4 == "4" )
		            {
		                	if (data[i].question4 == "0")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question4[0] = data[i].cquestion4;
		                	}
		                	else if (data[i].question4 == "1")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question4[1] = data[i].cquestion4;
		                	}
		                	else if (data[i].question4 == "2")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question4[2] = data[i].cquestion4;
		                	}
		                	else if (data[i].question4 == "3")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question4[3] = data[i].cquestion4;
		                	}
		                	else if (data[i].question4 == "4")
		                	{
		                		//score.question1.push(data[0].cquestion1);
		                		score.question4[4] = data[i].cquestion4;
		                	}
		            }

                	// if (data[i].question1 == "0" || data[i].question1 == "1" || data[i].question1 == "2" || data[i].question1 == "3" || data[i].question1 == "4" )
                	// {
                	// 	score.question1.push(data[i].cquestion1);
                		
                	// }
                	
                	            	
                	//else if (data[i].question2 == "0" || data[i].question2 == "1" || data[i].question2 == "2" || data[i].question2 == "3" || data[i].question2 == "4" )
                	{
                		//score.question2.push(data[i].cquestion2);
                		//score.question1.push("0");
                	}

                } 
                console.log(score);
                //var ctx1 = $("doughnut-question1");
                var ctx1 = document.getElementById('doughnut-question1');
                var ctx2 = document.getElementById('doughnut-question2');
                var ctx3 = document.getElementById('doughnut-question3');
                var ctx4 = document.getElementById('doughnut-question4');

                var data1 = {
                	labels : ["Not a word","Little bit","Quite","I got something","Yaa. Almost all"],
                	datasets : [
                	{
                		label : "Do you understand this lecture?",
                		//actual question needed
                		data : score.question1,
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

                var data2 = {
                	labels : ["I don't like","I like little","No matter","it's quite good","I like alot"],
                	datasets : [
                	{
                		label : "Do you like the method of presentation used by the lecturer?",
                		//actual question needed
                		data : score.question2,
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

                var data3 = {
                	labels : ["Waste of time","Not bad but..","I have no idea","Almost covered","Done and dusted"],
                	datasets : [
                	{
                		label : "you think that the nessassary area is covered within the time period?",
                		//actual question needed
                		data : score.question3,
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

                var data4 = {
                	labels : ["Worst","Bad","Normal","Good","Best"],
                	datasets : [
                	{
                		label : "Can you provide overall idea to today's lecture?",
                		//actual question needed
                		data : score.question4,
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

                var option1 = {
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
                	// begin with comma

                	//events: false,
				  	animation: {
				    duration: 500,
				    easing: "easeOutQuart",
				    onComplete: function () {
				      var ctx = this.chart.ctx;
				      ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
				      ctx.textAlign = 'center';
				      ctx.textBaseline = 'bottom';

				      this.data.datasets.forEach(function (dataset) {

				        for (var i = 0; i < dataset.data.length; i++) {
				          var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
				              total = dataset._meta[Object.keys(dataset._meta)[0]].total,
				              mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
				              start_angle = model.startAngle,
				              end_angle = model.endAngle,
				              mid_angle = start_angle + (end_angle - start_angle)/2;

				          var x = mid_radius * Math.cos(mid_angle);
				          var y = mid_radius * Math.sin(mid_angle);

				          ctx.fillStyle = '#fff';
				          if (i == 3){ // Darker text color for lighter background
				            ctx.fillStyle = '#444';
				          }
				          var percent = String(Math.round(dataset.data[i]/total*100)) + "%";
				          ctx.fillText(dataset.data[i], model.x + x, model.y + y);
				          // Display percent in another line, line break doesn't work for fillText
				          ctx.fillText(percent, model.x + x, model.y + y + 15);
				        }
				      });               
				    }
				  }
				  // end

				}
                


                var option2 = {
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

                	// begin with comma

                	//events: false,
				  	animation: {
				    duration: 500,
				    easing: "easeOutQuart",
				    onComplete: function () {
				      var ctx = this.chart.ctx;
				      ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
				      ctx.textAlign = 'center';
				      ctx.textBaseline = 'bottom';

				      this.data.datasets.forEach(function (dataset) {

				        for (var i = 0; i < dataset.data.length; i++) {
				          var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
				              total = dataset._meta[Object.keys(dataset._meta)[0]].total,
				              mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
				              start_angle = model.startAngle,
				              end_angle = model.endAngle,
				              mid_angle = start_angle + (end_angle - start_angle)/2;

				          var x = mid_radius * Math.cos(mid_angle);
				          var y = mid_radius * Math.sin(mid_angle);

				          ctx.fillStyle = '#fff';
				          if (i == 3){ // Darker text color for lighter background
				            ctx.fillStyle = '#444';
				          }
				          var percent = String(Math.round(dataset.data[i]/total*100)) + "%";
				          ctx.fillText(dataset.data[i], model.x + x, model.y + y);
				          // Display percent in another line, line break doesn't work for fillText
				          ctx.fillText(percent, model.x + x, model.y + y + 15);
				        }
				      });               
				    }
				  }
				  // end
                }

                var option3= {
                	title : {
                		display : true,
                		position : "top",
                		text : "Q: you think that the nessassary area is covered within the time period?",
                		fontSize : 18,
                		fontColor : "#111"
                	},
                	legend : {
                		display : true,
                		position : "bottom"
                	},

                	// begin with comma

                	//events: false,
				  	animation: {
				    duration: 500,
				    easing: "easeOutQuart",
				    onComplete: function () {
				      var ctx = this.chart.ctx;
				      ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
				      ctx.textAlign = 'center';
				      ctx.textBaseline = 'bottom';

				      this.data.datasets.forEach(function (dataset) {

				        for (var i = 0; i < dataset.data.length; i++) {
				          var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
				              total = dataset._meta[Object.keys(dataset._meta)[0]].total,
				              mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
				              start_angle = model.startAngle,
				              end_angle = model.endAngle,
				              mid_angle = start_angle + (end_angle - start_angle)/2;

				          var x = mid_radius * Math.cos(mid_angle);
				          var y = mid_radius * Math.sin(mid_angle);

				          ctx.fillStyle = '#fff';
				          if (i == 3){ // Darker text color for lighter background
				            ctx.fillStyle = '#444';
				          }
				          var percent = String(Math.round(dataset.data[i]/total*100)) + "%";
				          ctx.fillText(dataset.data[i], model.x + x, model.y + y);
				          // Display percent in another line, line break doesn't work for fillText
				          ctx.fillText(percent, model.x + x, model.y + y + 15);
				        }
				      });               
				    }
				  }
				  // end
                }

                var option4 = {
                	title : {
                		display : true,
                		position : "top",
                		text : "Q: Can you provide overall idea to today's lecture?",
                		fontSize : 18,
                		fontColor : "#111"
                	},
                	legend : {
                		display : true,
                		position : "bottom"
                	},

                	// begin with comma

                	//events: false,
				  	animation: {
				    duration: 500,
				    easing: "easeOutQuart",
				    onComplete: function () {
				      var ctx = this.chart.ctx;
				      ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
				      ctx.textAlign = 'center';
				      ctx.textBaseline = 'bottom';

				      this.data.datasets.forEach(function (dataset) {

				        for (var i = 0; i < dataset.data.length; i++) {
				          var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
				              total = dataset._meta[Object.keys(dataset._meta)[0]].total,
				              mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
				              start_angle = model.startAngle,
				              end_angle = model.endAngle,
				              mid_angle = start_angle + (end_angle - start_angle)/2;

				          var x = mid_radius * Math.cos(mid_angle);
				          var y = mid_radius * Math.sin(mid_angle);

				          ctx.fillStyle = '#fff';
				          if (i == 3){ // Darker text color for lighter background
				            ctx.fillStyle = '#444';
				          }
				          var percent = String(Math.round(dataset.data[i]/total*100)) + "%";
				          ctx.fillText(dataset.data[i], model.x + x, model.y + y);
				          // Display percent in another line, line break doesn't work for fillText
				          ctx.fillText(percent, model.x + x, model.y + y + 15);
				        }
				      });               
				    }
				  }
				  // end
                }

                chart1 = new Chart( ctx1, {
                	type : 'doughnut',
                	data : data1,
                	options : option1
                });

                 chart2 = new Chart( ctx2, {
                	type : 'doughnut',
                	data : data2,
                	options : option2
                });

                 chart3 = new Chart( ctx3, {
                	type : 'doughnut',
                	data : data3,
                	options : option3
                });

                 chart4 = new Chart( ctx4, {
                	type : 'doughnut',
                	data : data4,
                	options : option4
                });


            },
            error: function (data) {
                //console.log('An error occurred.');
                console.log(data);
            },
        });
        e.preventDefault();
    });

	function clearChart()
	{
		chart1.destroy();
		chart2.destroy();
		chart3.destroy();
		chart4.destroy();
	}

	</script>

</body>
</html>