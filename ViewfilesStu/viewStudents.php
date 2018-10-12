<?php
	session_start();

	$subcodeL = $_GET['subcodeSS'];
	$weekS = $_SESSION['weekS1'];

	// $dbhost = 'localhost';
	// $dbname = 'chat';
	// $dbuser = 'root';
	// $dbpass = '';

	// $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

   	//include("../MainStudents/config.php");
   		$connection = mysqli_connect('localhost', 'root', '');
		if (!$connection){
		    die("Database Connection Failed" . mysqli_error($connection));
		}
		$select_db = mysqli_select_db($connection, 'chat');
		if (!$select_db){
		    die("Database Selection Failed" . mysqli_error($connection));
		}
	

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="5">
	<title>Upload Files</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<!-- 2nd edit begins-->
	<div>
		<ul class="navbar">
			<li class="navbttn"><a><?php echo($_SESSION['UserName']) ?></a></li>
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
                    <i class="fa fa-dashboard fa-lg"></i> View Resources
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
            	<li id="exit" class="exitFunc">
                	<a href="../Student/indexSChat.php?subcode=<?php echo($subcodeL); ?>&weekS=<?php echo($weekS); ?>">
                    	Back
               		</a>
            	</li>
        	</ul>
    	</div>
	</div>
<!-- End -->

	<div id = "homeWelcome">
		<h2 align="center">View Documents on <?php echo($_GET['subcodeSS']) ?> class </h2>
			
			

			<fieldset id="line">

			<?php

				$query = "SELECT * FROM uploader WHERE Subject_Code = '".$_GET['subcodeSS']."' ORDER BY uploaded_on DESC";
			
				$result = mysqli_query($connection, $query); 
			?>
			<table class="table">
  				<thead>
  					<tr>
				      <th width="100px">Name</th>
				      <th width="400px">File Name</th>
				      <th width="200px">Date</th>
				      <th width="100px">Location</th>
				    </tr>
				      
				</thead>

			<tbody>
			  <?php

			  	while($r = mysqli_fetch_assoc($result)){
			   ?>
			    <tr>
			    	
			      <th scope="row"><?php echo $r['filename'] ?></th>
			      <td><?php echo $r['name'] ?></td>
			      <td><?php echo $r['uploaded_on'] ?></td>
			      <td><a href="../UploadLecture/<?php echo $r['paths'] ?>">Download</a></td>
			      
			    </tr>
			    <?php
			    }
			    ?>
			  </tbody>

			</table>

							
				
			</fieldset>

		
			
		
		
		
	</div>

</body>
</html>