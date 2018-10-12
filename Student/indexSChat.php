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
	$subcode=$_GET['subcode'];
	$weekS = $_GET['weekS'];
	$_SESSION['sub1'] = $subcode;
	$_SESSION['weekS1'] = $weekS;
	$userName = $_SESSION['UserName'];
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
							<i class="fa fa-dashboard fa-lg"></i> Chat Room
						</a>
					</li>
					<li>
						<a href="../ViewfilesStu/viewStudents.php?subcodeSS=<?php echo($subcode); ?>">
							<i class="fa fa-dashboard fa-lg"></i> Student's Resources
						</a>
					</li>
					<li>
						<a href="../FeedbackStudents/main.php">
							<i class="fa fa-user fa-lg"></i> Feedbacks
						</a>
					</li>
					<!-- <li>
						<a href="#">
							<i class="fa fa-users fa-lg"></i> Users
						</a>
					</li> -->
					<li id="exit">
						<!-- <a href="../MainStudents/mainStu.php?userName=<?php //echo($userName); ?>"> -->
							<a href="../FeedbackStudents/main.php">
							Exit 
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- 1st edit Ends -->



		<div id = "wrapper">
			<h1 align="center">Welcome to Chat Room <br> <?php echo $subcode ?></h1>
			<div class = "chat_wrapper">
				<div id=chat>
					
				</div>
				<form method="POST" id="messageFrm">
					<textarea name="message" cols="30" rows="4" class="textarea"></textarea>
					
				</form>
			</div>
			
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

</body>
</html>


