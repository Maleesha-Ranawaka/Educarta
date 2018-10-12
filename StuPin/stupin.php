<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pin</title>
	<link rel="stylesheet" type="text/css" href="css/stupin.css">
</head>

<?php
	
	include("../MainStudents/config.php");
	
		$subcode=$_GET['subcode'];
		$weekS=$_GET['weekS'];
	
	
?>

<body>
<!--
	<form>
		<p>Please enter PIN number for this class. If you don't have it ask from relevent lecturer. <?php //echo $subcode  ?></p>
		<input type="password" name="pinNum">
		<br>
		<br>
		<form id="buttn1">
		<input type="button" value="Submit" onclick="'location.href='../Student/indexSChat.php?subcode=.$subcode." />

</form>
</form>
-->
	<div>
		<form class="stupin1">
				<fieldset id="local">
					<?php

					$pin1 = $db->prepare("SELECT PIN FROM classroom WHERE Subject_Code = '$subcode' AND Availability = '1' AND Week = '$weekS'");
					$pin1->execute();

					$res1 = $pin1->fetch(PDO::FETCH_ASSOC);


					$despin = $res1['PIN'];

					$_SESSION['globpin'] = $despin;

					
/*
					foreach ($res as $detail) 
					{
						$clz .= '<div class="classDetails"> <button type="button" onclick=location.href="../Student/indexSChat.php?subcode='.$detail->Subject_Code.'" id="btnclasslink"><strong>'.$detail->Subject_Code.' </strong><br> '.$detail->Subject_Name.'<br>'.$detail->Lecturer_Name.'</button></div>';
 
					}
*/					
					//echo $despin;
					
					?>

					<div>
						<p id="demo"> Please enter PIN number for this class. If you don't have it, ask from relevent lecturer. </p>
						<p id="demo1"> Notice - Once you login to class you must submit it's feedback form before exit. </p>
						<input type="password" id="pinNum" maxlength="4"><br>
						<a href="javascript:pincheck()" id="likebutton">Login</a>
						<a href="../EnrollClass/enrollclz.php" id="likebutton1">Back</a>
						<br>
						<p></p>
						<br>
						<p id="demo1"></p>
						
					
					</div>
										
				</fieldset>
				
			</form>

	</div>

<script>
	var trypin = 3;

	function pincheck() 
	{
		
		var despinjs = <?php echo json_encode($despin); ?>;
		var subcode = <?php echo json_encode($subcode); ?>;
		var weekS = <?php echo json_encode($weekS); ?>;
		//alert(despinjs);
		var passwordtxt = document.getElementById("pinNum").value;
		//alert(passwordtxt);
		

		//window.location.href = "../Student/indexSChat.php?subcode="+subcode;
		if(trypin == 0)
		{
			window.location.href = "../EnrollClass/enrollclz.php";
			//add warning messages and so and so
		}
		else
		{
			if(passwordtxt == despinjs)
			{

				window.location.href = "../Student/indexSChat.php?subcode="+subcode+"&weekS="+weekS;
			}
			else
			{
				trypin = trypin - 1;
				document.getElementById("demo").innerHTML = "Wrong Pin Number. Please recheck it or you can ask from relevent lecturer";
				document.getElementById("demo1").innerHTML = "You have only "+trypin+" tries remaining.";
				document.getElementById("pinNum").value = "";
			}
		}

	}	
</script>

</body>
</html>