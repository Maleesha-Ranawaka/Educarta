<?php
	session_start();

	header('Content-Type: application/json');

	$lecturer=$_SESSION['userNameL'];
	include("../FeedbackStudents/config.php");
	$subcode=$_SESSION['subcodefrmsub'];

		$aggclass3 = $db->prepare("SELECT Week as WeekQ3, AVG(question3) as avgques3 FROM sessionafterfeedbacks where Subject_Code ='".$_SESSION['subcodefrmsub']."' group by Week order by Week ASC");

		$aggclass3->execute();

		$res = $aggclass3->fetchAll(PDO::FETCH_OBJ);

		$data3 = array();
		//initialize once
		

		foreach ($res as $detail) 
		{
			$data3[] = $detail;
		}

		print json_encode($data3);
?>