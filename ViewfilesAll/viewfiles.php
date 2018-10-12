<?php
	session_start();

	$subcodeL=$_GET['subcodeL'];
	$userNameL = $_GET['userNameL'];
	$_SESSION['subLecdelete'] = $subcodeL;
	$weekL = $_SESSION["weekLec"];
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
                    <i class="fa fa-dashboard fa-lg"></i> View Files
                </a>
            </li>
            <li>
                <a href="../UploadLecture/uploadL.php?userNameL=<?php echo($userNameL); ?>&subcodeL=<?php echo($subcodeL); ?>">
                    <i class="fa fa-dashboard fa-lg"></i> Upload Files
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
		<h2 align="center">View Documents on <?php echo($_GET['subcodeL']) ?> class </h2>
			
			

			<fieldset id="line">

			<?php

				$query = "SELECT * FROM uploader WHERE Subject_Code = '".$_GET['subcodeL']."' ORDER BY uploaded_on DESC";
				//$query = ("SELECT * FROM uploader");

				// $query->execute();

				// $res = $query->fetchAll(PDO::FETCH_OBJ);
				

				// foreach ($res as $detail)
				// {
				// 	//echo "string";
				// 	$path = $detail['paths'];
				//  	$id = $detail['id'];
				//  	echo '<img src="'.$path.'" width="200px" height="200px" />';
				// }

				$result = mysqli_query($connection, $query); 
			?>
			<table class="table">
  				<thead>
  					<tr>
				      <th width="100px">Name</th>
				      <th width="400px">File Name</th>
				      <th width="200px">Date</th>
				      <th width="100px">Location</th>
				      <th width="100px">Delete</th>
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
			      <td><a onclick="return decision();" href="delete.php?id=<?php echo $r['id'] ?>">Delete</a></td>
			    </tr>
			    <?php
			    }
			    ?>
			  </tbody>
			</table>

							
				
			</fieldset>

		
	</div>
	<script type="text/javascript">
		function decision()
		{
			var txt;
		    var r = confirm("Do you want to delete file?");
		    if (r == true) {
		        
				return true;
		    } else {
		        return false;
		    }
		}	
	</script>

</body>
</html>