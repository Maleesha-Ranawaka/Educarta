<?php
	session_start();

	$subcodeL=$_GET['subcodeL'];
	$userNameL = $_GET['userNameL'];
	$weekL = $_SESSION["weekLec"]; 


?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload Files</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script 
  			src="https://code.jquery.com/jquery-3.3.1.js"
  			integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  			crossorigin="anonymous">
  	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
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
			<li class="navbttn"><a class="active" href="#home"><?php echo($userNameL) ?></a></li>
			<!-- <li class="navbttn"><a href="#news">News</a></li>
			<li class="navbttn"><a href="#contact">Contact</a></li>
			<li class="navbttn"><a href="#about">About</a></li> -->
		</ul>

	</div>
	<!-- 2nd edit ends-->

	<!-- Begin-->
	<div class="nav-side-menu">
	<div class="Logo1"><img src="css/logo2newnew.png" alt="Logo" class="Logo"></div>
    <div class="brand"></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
            <li id="mainpage">
                <a href="#">
                    <i class="fa fa-dashboard fa-lg"></i> Upload Files
                </a>
            </li>
            <li>
                <a href="../ViewfilesAll/viewfiles.php?userNameL=<?php echo($userNameL); ?>&subcodeL=<?php echo($subcodeL); ?>">
                    <i class="fa fa-dashboard fa-lg"></i> View Files
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
            	<li id="exit" class="exitFunc">
                	<a href="../Lecturers/indexLChat.php?subcodeL=<?php echo($subcodeL); ?>&weekL=<?php echo($weekL); ?>">
                    	Back
               		</a>
            	</li>
        	</ul>
    	</div>
	</div>
<!-- End -->

	<div id = "homeWelcome">
		<h2 align="center">Upload Documents on <?php echo($_GET['subcodeL']) ?> class </h2>
			
			

			<fieldset id="line">
				<form id="formS" name="form1" method="post" action="uploader.php" onsubmit="alertsubmit()" enctype="multipart/form-data" >
					Upload File : <input type="file" name="fileupload" required ><br>
					Name : <input type="text" name="textupload" required ><br>
					<input type="submit" name="submit1" value="Submit">
					
				</form>
				
			</fieldset>
		
			
	</div>

	<script type="text/javascript">
		
		function alertsubmit()
		{
			//swal({title: "success", text: "File uploaded Successfully", icon: "Success",});
			alert("File uploaded Successfully");
		}
		

	</script>

</body>
</html>