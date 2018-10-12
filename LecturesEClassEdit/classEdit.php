<?php
		session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Class</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<?php  
		$subcode=$_GET['subcode'];
		$weekS=$_GET['weekS'];
		$classN=$_GET['classN'];
		$userName=$_SESSION['userNameL'];
	?>

</head>
<body>

	<!-- 2nd edit begins-->
	<div>
		<ul class="navbar">
			<li class="navbttn"><a class="active" href="../MainLecturers/mainLec.php?userNameL=<?php echo($userName); ?>" >Home</a></li>
			<!--<li class="navbttn"><a href="#news">News  </a></li>
			<li class="navbttn"><a href="#contact">Contact</a></li>-->
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
							<i class="fa fa-dashboard fa-lg"></i> Edit Classrooms
						</a>
					</li>
					<li>
						<a href="../MainLecturers/mainLec.php?userNameL=<?php echo($userName); ?>">
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
						<a href="../LecturesExistingClasses/existingClassesL.php">
							Back
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- 1st edit Ends -->
		<div id = "homeWelcome">
			<h1 id = "h1header">Edit Existing Classroom</h1>

			<form method="POST"  action="editlogic.php?SubCode=<?php echo($subcode) ?>&ClassName=<?php echo($classN) ?>">
				<fieldset id="line">
				<p>Subject Code </p>
				<input type="text" id="SubCode" name="SubCode" value="<?php echo $subcode; ?>" disabled>
				<br>

				<p>Exixting Class name </p>
				<input type="text" id="ClassName" name="ClassName" value="<?php echo $classN; ?>" disabled>
				<br>

				<p>PIN</p>
				<input type="password" name="pinNum" id="pinNum1" inputmode="numeric" minlength="4" maxlength="4" size="4" onchange="validationfrm()">
				<br>

				<p>Confirm PIN</p>
				<input type="password" name="Validation" id="pinNum2" inputmode="numeric" minlength="4" maxlength="4" size="4" onchange="validationfrm()">
				<br>
				<span id='message'></span>
				<br>

				<p>Week <font size="3" color=red> Previous Week - <?php echo $weekS; ?> </font> </p>
				<input type="text" id="week" name="week" required>
				<br>

				<br>
				
				<!--<input type="button" value="Create The Class" onclick="window.location.href='../Lecturers/indexLChat.php'" />-->
				<input type="Submit" value="Login to Class" name="subbutton" id="submit" disabled/>
				</fieldset>
			</form>
		</div>



	</div>

	<script>
	function validationfrm()
	{
		// var pin1 = document.getElementById("pinNum1").value; 
		// alert(pin1);
		if (document.getElementById('pinNum1').value ==document.getElementById('pinNum2').value) 
		{
			document.getElementById('message').style.color = 'green';
			document.getElementById('message').innerHTML = 'PIN number matched';
			document.getElementById('submit').disabled = false;
		} 
		else 
		{
			if (document.getElementById('pinNum2').value == "") 
			{
				document.getElementById('submit').disabled = true;
				document.getElementById('message').style.color = 'red';
				document.getElementById('message').innerHTML = 'PIN number does not match';
			}
			else
			{
				document.getElementById('message').style.color = 'red';
				document.getElementById('message').innerHTML = 'PIN number does not match';
				document.getElementById('submit').disabled = true;
				
			}
			
		}
		if (document.getElementById('pinNum1').value == "") {
				document.getElementById('message').style.color = 'red';
				document.getElementById('message').innerHTML = 'PIN number does not match';
				document.getElementById('submit').disabled = true;
		}


	}


	function logout()
		{
			firebase.auth().signOut();

		}

</script>

</body>
</html>