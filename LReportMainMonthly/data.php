<?php
	session_start();

	header('Content-Type: application/json');

	$lecturer=$_SESSION['userNameL'];
	include("../FeedbackStudents/config.php");
	$subcode=$_SESSION['subcodefrmsub'];

		$aggclass1 = $db->prepare("SELECT Week as WeekQ1, AVG(question1) as avgques1 FROM sessionafterfeedbacks where Subject_Code ='".$_SESSION['subcodefrmsub']."' group by Week order by Week ASC");

		$aggclass1->execute();

		$res = $aggclass1->fetchAll(PDO::FETCH_OBJ);

		$data = array();
		//initialize once
		

		foreach ($res as $detail) 
		{
			$data[] = $detail;
		}

		print json_encode($data);
		
?>