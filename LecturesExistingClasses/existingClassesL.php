<?php
		session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<!-- automatic refresh -->
	<meta http-equiv="refresh" content="5">
	<title>Classes</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<?php 
		include("../MainStudents/config.php");
		$lecturer = $_SESSION['userNameL'];
	?>
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
						<i class="fa fa-dashboard fa-lg"></i> Existing Classes
					</a>
				</li>
				<li>
					<a href="../CreateClass/createClass.php?userNameL=<?php echo($lecturer) ?>">
						<i class="fa fa-dashboard fa-lg"></i> Create New Classes
					</a>
				</li>
				<li>
					<a href="../LReportSelection/LReportDecision.php">
						<i class="fa fa-user fa-lg"></i> Feedbacks Reports
					</a>
				</li>
				<!-- <li>
					<a href="#">
						<i class="fa fa-users fa-lg"></i> Feedbacks
					</a>
				</li> -->
				<li id="exit">
					<a href="../MainLecturers/mainLec.php?userNameL=<?php echo($lecturer); ?>">
						Back
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- 1st edit Ends -->

	<div id = "homeWelcome">
		<h2 align="center">List of classes created by <?php echo($_SESSION['userNameL']) ?></h2>

		<form class="mainLec1">
			<fieldset id="line">
				<?php
				// edit needed
				$class = $db->prepare("SELECT * FROM classroom WHERE Availability = '0' AND Lecturer_Name = '".$_SESSION['userNameL']."'");
				$class->execute();

				$res = $class->fetchAll(PDO::FETCH_OBJ);

				$clz = '';

				
				foreach ($res as $detail) 
				{
					$clz .= '<div class="classDetails" id="divbtton"> <button type="button" onclick=location.href="../LecturesEClassEdit/classEdit.php?subcode='.$detail->Subject_Code.'&weekS='.$detail->Week.'&classN='.$detail->Subject_Name.'" id="btnclasslink"><strong>Subject Code - '.$detail->Subject_Code.' </strong><br>Subject Name - '.$detail->Subject_Name.'<br> Lecturer Name - '.$detail->Lecturer_Name.'</button></div>';

				}


				echo $clz;
				
				?>
				
				
			</fieldset>
			
		</form>
		
		
	</div>



	<script>
		function logout()
		{
			firebase.auth().signOut();

		}
			
	</script>

</body>
</html>