<?php
		session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<!-- automatic refresh -->
	<!-- <meta http-equiv="refresh" content="5"> -->
	<title>HomePage</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script>
	
	<?php
	$userNameL=$_GET['userNameL'];
	$_SESSION['userNameL'] = $userNameL;
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
			<li class="navbttn"><a class="active" onclick="logout()" href="../index/index.html" >Logout</a></li>
			<!--<li class="navbttn"><a href="#news">News</a></li>
			<li class="navbttn"><a href="#contact">Contact</a></li>-->
			<li class="navbttn"><a><?php echo($userNameL) ?></a></li>
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
						<a href="../CreateClass/createClass.php?userNameL=<?php echo($userNameL) ?>">
							<i class="fa fa-dashboard fa-lg"></i> Create New Classrooms
						</a>
					</li>
					<li>
						<a href="../LecturesExistingClasses/existingClassesL.php">
							<i class="fa fa-user fa-lg"></i> Exsisting Classrooms
						</a>
					</li>
					<li>
						<a href="../LReportSelection/LReportDecision.php">
							<i class="fa fa-users fa-lg"></i> Feedbacks Reports
						</a>
					</li>
					<li style="visibility: hidden">
						<a href="#" >
							<!-- news articles advertisements done by lectures -->
							<i class="fa fa-users fa-lg"> </i> Publications
						</a>
					</li>
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
		<h2 align="center">Welcome <?php echo($userNameL) ?> to Lecturer's Home Page</h2>

		<form class="mainStu1">
			<fieldset id="line1">
				<!-- Advertisements Promotions News Offers Articles - lectures Admin should be there -->
				<div class="Advertisements" id="advtse1"> <button type="button" id="advtsebttn1"><strong>Volunteers needed</strong><br><p>UN Volunteering call 071xxxxxxx for more information</p></button>
					
				</div>

				<div class="Advertisements" id="advtse2"> <button type="button" id="advtsebttn2" style="background-color: #F9E79F"><strong>Special : Conference on Artifical Interligence</strong><br><p>University of Peradeniya organizes a conference on Arificial Interligence on 2018/10/14 more details and register - www.conferences.pera.ac.lk </p></button>
					
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

</body>
</html>