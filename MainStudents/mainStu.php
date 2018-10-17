<?php
		session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<!-- <meta http-equiv="refresh" content="5"> -->
	<title>HomePage</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script>
	<?php
	$userName=$_GET['userName'];
	$_SESSION['UserName'] = $userName;
	?>

	<script type="text/javascript">
		history.pushState(null, null, location.href);
    	window.onpopstate = function () {
        history.go(1);
    };
	</script>

	
</head>
<body>

	<!-- 2nd edit begins-->
	<div>
		<ul class="navbar">
			<li class="navbttn"><a class="active" onclick="logout()">Logout</a></li>
			<!-- <li class="navbttn"><a style="visibility: hidden" href="#news">News  </a></li>
			<li class="navbttn"><a href="#contact">Contact</a></li> -->
			<li class="navbttn"><a><?php echo($userName) ?></a></li>
		</ul>

	</div>
	<!-- 2nd edit ends-->

	<div>

		<!-- 1st edit Begin-->
		<div class="nav-side-menu">
			<div class="Logo1"><img src="css/logo2newnew.png" alt="Logo" class="Logo"></div>
			<div class="brand"></div>
			<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
			<div class="menu-list">
				<ul id="menu-content" class="menu-content collapse out">
					<li id="mainpage">
						<a href="#">
							<i class="fa fa-dashboard fa-lg"></i> Whats New
						</a>
					</li>
					<li>
						<a href="../EnrollClass/enrollclz.php">
							<i class="fa fa-dashboard fa-lg"></i> Classrooms
						</a>
					</li>
					<!-- <li>
						<a href="#">
							<i class="fa fa-user fa-lg"></i> Discussions
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-users fa-lg"></i> Feedbacks
						</a>
					</li> -->
					<li id="exit" onclick="logout()">
						<a>
							Logout
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- 1st edit Ends -->


		<div id = "homeWelcome">
		<h2 align="center">Welcome <?php echo($userName) ?> to Student's Home Page</h2>

		<form class="mainStu1">
			<fieldset id="line">
				<?php

				

				include('config.php');

				$query = $db->prepare("INSERT INTO user SET username=?");
				$run = $query->execute([$_GET['userName']]);	

				?>
				<div class="Advertisements" id="advtse1"> <button type="button" id="advtsebttn1"><strong>Promotion - Online tutorials @ EDUCARTA online courses</strong><br><p>There is 30% discount for newly regestered users. Limited offer. Hurry up. Access 1000+ online courses with experienced instructors.</p></button>
					
				</div>

				<div class="Advertisements" id="advtse2"> <button type="button" id="advtsebttn2"><strong>Part time job opprtunities</strong><br><p>Work with euro one software company in colombo as software developer. resonable salary. call 077xxxxxxx</p></button>
				</div>

				<div class="Advertisements" id="advtse3"> <button type="button" id="advtsebttn3"><strong>HackX 2k19</strong><br><p>Inter University hackathon. Registration now open Visit www.hackx.lk</p>
				</div>
				
			</fieldset>
			
		</form>
		
		
		</div>

		<script>
			var config = {
						    apiKey: "",
						    authDomain: "",
						    databaseURL: "",
						    projectId: "",
						    storageBucket: "",
						    messagingSenderId: ""
						  };
						  firebase.initializeApp(config);
		</script>

		<script>
			function logout()
			{
				var txt;
			    var r = confirm("Do you want to Logout?");
			    if (r == true) {
			        firebase.auth().signOut();
					window.location.href = "../index/index.html";
			    } else {
			        
			    }
			}			
		</script>

	</div>


</body>
</html>

