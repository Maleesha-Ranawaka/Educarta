<?php
	session_start();

	header('Content-Type: application/json');

	$lecturer=$_SESSION['userNameL'];
	include("../FeedbackStudents/config.php");
	$subcode=$_SESSION['subcodefrmsub'];

		$aggclass2 = $db->prepare("SELECT Week as WeekQ2, AVG(question2) as avgques2 FROM sessionafterfeedbacks where Subject_Code ='".$_SESSION['subcodefrmsub']."' group by Week order by Week ASC");

		$aggclass2->execute();

		$res = $aggclass2->fetchAll(PDO::FETCH_OBJ);

		$data2 = array();
		//initialize once
		

		foreach ($res as $detail) 
		{
			$data2[] = $detail;
		}

		print json_encode($data2);
?>