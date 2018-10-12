<?php
	session_start();
	$weekS = $_SESSION['weekS1'];
	$subcodeL = $_SESSION['sub1'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Feedback Session</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>


	<!-- 2nd edit begins-->
	<div>
		<ul class="navbar">
			<li class="navbttn"><a class="active"><?php echo($_SESSION['UserName']) ?></a></li>
			<!-- <li class="navbttn"><a href="#news">News</a></li>
			<li class="navbttn"><a href="#contact">Contact</a></li>
			<li class="navbttn"><a href="#about">About</a></li> -->
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
							<i class="fa fa-dashboard fa-lg"></i> Feedback Forms
						</a>
					</li>
					<li>
						<a href="../Student/indexSChat.php?subcode=<?php echo($subcodeL); ?>&weekS=<?php echo($weekS); ?>">
							<i class="fa fa-dashboard fa-lg"></i> Chat Room
						</a>
					</li>
					<!-- <li>
						<a href="#">
							<i class="fa fa-user fa-lg"></i> Profile
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-users fa-lg"></i> Users
						</a>
					</li> -->
					<li id="exit">
						<a href="../Student/indexSChat.php?subcode=<?php echo($subcodeL); ?>&weekS=<?php echo($weekS); ?>">
							Back
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- 1st edit Ends -->

		<div>
			<h1 id="header">Quick Evaluation of Lecture</h1>
		</div>


		<div class="container" id="main"><!--section begins-->
			<div class="row">
				<div class="col-md-12">
					<!-- Form begins-->
					<form class="form-horizontal" action="logic.php" method="POST"><!-- Form begins -->
						<fieldset id="linewidth">


							<!-- Multiple Radios (inline) -->
							<div class="form-group">
								
								<div id="quetion1">
									<label class="col-md-4 control-label" for="radios">1) Do you understand this lecture?</label>
								</div>
								<div class="col-md-4"> 
									<label class="radio-inline" for="radios-0">
										<input type="radio" name="radios-1" id="radios-0" value="0">
										Not a word
									</label> <br>
									<label class="radio-inline" for="radios-1">
										<input type="radio" name="radios-1" id="radios-1" value="1">
										Little bit
									</label> <br>
									<label class="radio-inline" for="radios-2">
										<input type="radio" name="radios-1" id="radios-2" value="2" checked="checked">
										Quite
									</label> <br>
									<label class="radio-inline" for="radios-3">
										<input type="radio" name="radios-1" id="radios-3" value="3">
										I got something
									</label><br>
									<label class="radio-inline" for="radios-4">
										<input type="radio" name="radios-1" id="radios-4" value="4">
										Yaa. Almost all
									</label>
								</div>
							</div>

							<div class="form-group">
								<div id="quetion2">
									<label class="col-md-4 control-label" for="radios">2) Do you like the method of presentation used by the lecturer?</label>
								</div>
								<div class="col-md-4"> 
									<label class="radio-inline" for="radios-5">
										<input type="radio" name="radios-2" id="radios-5" value="0">
										I don't like
									</label> <br>
									<label class="radio-inline" for="radios-6">
										<input type="radio" name="radios-2" id="radios-6" value="1">
										I like little
									</label> <br>
									<label class="radio-inline" for="radios-7">
										<input type="radio" name="radios-2" id="radios-7" value="2" checked="checked">
										No matter
									</label> <br>
									<label class="radio-inline" for="radios-8">
										<input type="radio" name="radios-2" id="radios-8" value="3">
										it's quite good
									</label> <br>
									<label class="radio-inline" for="radios-9">
										<input type="radio" name="radios-2" id="radios-9" value="4">
										I like alot
									</label>
								</div>
							</div>

							<div class="form-group">
								<div id="quetion3">
									<label class="col-md-4 control-label" for="radios">3) Do you think that the nessassary area is covered within the time period?</label>
								</div>
								<div class="col-md-4"> 
									<label class="radio-inline" for="radios-10">
										<input type="radio" name="radios-3" id="radios-10" value="0">
										Waste of time
									</label> <br>
									<label class="radio-inline" for="radios-11">
										<input type="radio" name="radios-3" id="radios-11" value="1">
										Not bad but..
									</label> <br>
									<label class="radio-inline" for="radios-12">
										<input type="radio" name="radios-3" id="radios-12" value="2" checked="checked">
										I have no idea
									</label> <br>
									<label class="radio-inline" for="radios-13">
										<input type="radio" name="radios-3" id="radios-13" value="3">
										Almost covered
									</label> <br>
									<label class="radio-inline" for="radios-14">
										<input type="radio" name="radios-3" id="radios-14" value="4">
										Done and dusted
									</label>
								</div>
							</div>
							<div class="form-group">
								<div id="quetion3">
									<label class="col-md-4 control-label" for="radios">4) Can you provide overall idea to today's lecture?</label>
								</div>
								<div class="col-md-4"> 
									<label class="radio-inline" for="radios-15">
										<input type="radio" name="radios-4" id="radios-15" value="0">
										Worst
									</label> <br>
									<label class="radio-inline" for="radios-16">
										<input type="radio" name="radios-4" id="radios-16" value="1">
										Bad
									</label> <br>
									<label class="radio-inline" for="radios-17">
										<input type="radio" name="radios-4" id="radios-17" value="2" checked="checked">
										Normal
									</label> <br>
									<label class="radio-inline" for="radios-18">
										<input type="radio" name="radios-4" id="radios-18" value="3">
										Good
									</label> <br>
									<label class="radio-inline" for="radios-19">
										<input type="radio" name="radios-4" id="radios-19" value="4">
										Best
									</label>
								</div>

								<div id="btnposition">
									<!-- <button type="submit" id="submitButton" onclick="">Submit</button> -->
									<input type="submit" value="SUBMIT" id="submit1">

								</div>
							</div>

						</fieldset>
					</form>
					<!--form end-->

				</div>
			</div>
		</div><!--section ends-->

	</body>
	</html>