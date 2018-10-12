<?php  

		session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chat Room</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

  <?php
  	include("../MainStudents/config.php");

	$subcodeL=$_GET['subcodeL'];
	$weekL = $_GET['weekL'];
	$lecturer = $_SESSION['userNameL'];

	$_SESSION["subLec"] = $subcodeL;
	$_SESSION["weekLec"] = $weekL;

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
			<li class="navbttn"><a class="active" href="#home"><?php echo($lecturer) ?></a></li>
			<!-- <li class="navbttn"><a href="#news">News</a></li>
			<li class="navbttn"><a href="#contact">Contact</a></li>
			<li class="navbttn"><a href="#about"><?php //echo($lecturer) ?></a></li> -->
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
                    <i class="fa fa-dashboard fa-lg"></i> Chat Room
                </a>
            </li>
            <li>
                <a href="../UploadLecture/uploadL.php?userNameL=<?php echo($lecturer); ?>&subcodeL=<?php echo($subcodeL); ?>">
                    <i class="fa fa-dashboard fa-lg"></i> Upload Files
                </a>
            </li>
            <li>
                <a href="../ViewfilesAll/viewfiles.php?userNameL=<?php echo($lecturer); ?>&subcodeL=<?php echo($subcodeL); ?>">
                    <i class="fa fa-user fa-lg"></i> View Files
                </a>
            </li>
            	<li onclick="destroy()">
                	<a>
                    	<i class="fa fa-users fa-lg"></i> Remove Classroom
               		</a>
            	</li>
            	<li id="exit" class="exitFunc">
                	<a href="../MainLecturers/mainLec.php?userNameL=<?php echo($lecturer); ?>">
                    	Exit From the class
               		</a>
            	</li>
        	</ul>
    	</div>
	</div>
<!-- End -->

	

	<div id = "wrapper">
		<h1 align="center">Welcome to Chat Room <br> <?php echo $subcodeL ?></h1>
		<div class = "chat_wrapper">
			<div id=chat>
				
			</div>
			<form method="POST" id="messageFrm">
				<textarea name="message" cols="30" rows="5" class="textarea"></textarea>
				
			</form>
		</div>
		
	</div>

	<script>

		LoadChat();

		setInterval(function(){
			LoadChat();
		},100);

		function LoadChat(){

			$.post('handlers/messages.php?action=getMessages', function(response){

				var scrollpos = $('#chat').scrollTop();
				var scrollpos = parseInt(scrollpos) + 620;
				var scrollHeight = $('#chat').prop('scrollHeight');

				$('#chat').html(response);

				if( scrollpos < scrollHeight){

				}else{
					$('#chat').scrollTop( $('#chat').prop('scrollHeight'));
				}

				

			});
		}


		$('.textarea').keyup(function(e){
			if( e.which == 13){
				$('form').submit();
			}
		});

		$('form').submit(function(){
			var message = $('.textarea').val();

			$.post('handlers/messages.php?action=sendMessage&message='+message, function(response){
				//alert(response);

			if(response==1){
				LoadChat();
				document.getElementById('messageFrm').reset();
				//alert('hfgbuegugeugfuysf');
			}

			});
			
			return false;
		})


		

	</script>

	<script type="text/javascript">
		// function exitFunction()
		// {
		// 	//alert("test1");
		// 	<?php
		// 		try
		// 		{
		// 			//$sql = "UPDATE classroom SET Availability = 0 WHERE Subject_Code ='" .$_GET['subcodeL']. "'";

		// 			$stmt = $db->prepare($sql);

		// 			$stmt->execute();

		// 		}
				
		// 		catch(PDOException $e)
		// 		    {
		// 		    echo $sql . "<br>" . $e->getMessage();
		// 		    }

		// 		$db = null;

		// 	?>

		// 

		$(document).ready(function(){
			$('.exitFunc').click(function(){
				$.get("exitlogic.php");
			})
		})
		
		
		
			
		
	</script>

	<script type="text/javascript">
		function destroy()
		{
			var txt;
			    var r = confirm("Alert : You are going to remove the class. This action can not be undone. Are you sure?");
			    if (r == true) {
			        
					window.location.href = "delete.php";
			    } else {
			        
			    }
		}
	</script>
	

</body>
</html>