<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="5">
	<title>Classes</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<?php
	

	include("../MainStudents/config.php");

	$user = $db->prepare("SELECT username FROM user");
	$user->execute();
	//$result = $db->query($sql);$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$result = $user->fetch(PDO::FETCH_ASSOC);

	$user1 = $result['username'];

	$userName = $_SESSION['UserName'];
	?>

</head>
<body>

	<!-- 2nd edit begins-->
	<div>
		<ul class="navbar">
			<li class="navbttn"><a class="active" href="../MainStudents/mainStu.php?userName=<?php echo($userName); ?>" >Home</a></li>
			<!--<li class="navbttn"><a href="#news">News  </a></li>
			<li class="navbttn"><a href="#contact">Contact</a></li>-->
			<li class="navbttn"><a><?php echo($_SESSION['UserName']) ?></a></li>
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
					<a>
						<i class="fa fa-dashboard fa-lg"></i> Available Classrooms
					</a>
				</li>
				<li>
					<a href="../MainStudents/mainStu.php?userName=<?php echo($userName); ?>">
						<i class="fa fa-dashboard fa-lg"></i> Whats New
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
				<li id="exit">
					<a href="../MainStudents/mainStu.php?userName=<?php echo($userName); ?>">
						Back
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- 1st edit Ends -->


		<div id = "homeWelcome">
		<h2 align="center">List of Available Classrooms</h2>

		<form class="mainStu1">
			<fieldset id="line">
				<?php

				$class = $db->prepare("SELECT * FROM classroom WHERE Availability = '1'");
				$class->execute();

				$res = $class->fetchAll(PDO::FETCH_OBJ);

				$clz = '';
/*
				foreach ($res as $detail) 
				{
					$clz .= '<div class="classDetails"> <button type="button" onclick=location.href="../Student/indexSChat.php?subcode='.$detail->Subject_Code.'" id="btnclasslink"><strong>'.$detail->Subject_Code.' </strong><br> '.$detail->Subject_Name.'<br>'.$detail->Lecturer_Name.'</button></div>';

				}
*/
				foreach ($res as $detail) 
				{
					$clz .= '<div class="classDetails" id="divbtton"> <button type="button" onclick=location.href="../StuPin/stupin.php?subcode='.$detail->Subject_Code.'&weekS='.$detail->Week.'" id="btnclasslink"><strong>Subject Code - '.$detail->Subject_Code.' </strong><br>Subject Name - '.$detail->Subject_Name.'<br> Lecturer Name - '.$detail->Lecturer_Name.'<br>Week - '.$detail->Week.'</button></div>';

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