<?php

session_start();

$question1 = $_POST['radios-1'];
$question2 = $_POST['radios-2'];
$question3 = $_POST['radios-3'];
$question4 = $_POST['radios-4'];

$subcode = $_SESSION['sub1'];
$weekS = $_SESSION['weekS1'];
$userName = $_SESSION['UserName'];

$dbhost = 'localhost';
$dbname = 'quickfeedbacks';
$dbuser = 'root';
$dbpass = '';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_error())
{
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else
{
	$total = $question1 + $question2 + $question3 + $question4;
	//echo "<script type='text/javascript'>alert('$userName');</script>";

	$INSERT = "INSERT Into sessionafterfeedbacks (Subject_Code, Week, question1, question2, question3, question4, OverallMarks) values(?,?,?,?,?,?,?)";

	$stmt = $conn->prepare($INSERT);
	$stmt->bind_param("siiiiii", $subcode, $weekS, $question1, $question2, $question3, $question4, $total);
	$stmt->execute();
	
	$stmt->close();
	$conn->close();

//<?php echo($userName);
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Thank you</title>
	<meta http-equiv="refresh" content="3; URL='../MainStudents/mainStu.php?userName=<?php echo($userName);?>'">

	<script type="text/javascript">
	history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
	</script>

</head>
<body style="background-color: #D5D8DC">
	<h1>Thank you for Feedbacks</h1>
	<h2>You will redirect to Home Page </h2>

</body>
</html>