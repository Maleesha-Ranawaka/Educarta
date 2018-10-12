<?php
	session_start();

	header('Content-Type: application/json');

	$lecturer=$_SESSION['userNameL'];
	include("../FeedbackStudents/config.php");
	$subcode=$_SESSION['subcodefrmsub'];

		$aggclass4 = $db->prepare("SELECT Week as WeekQ4, AVG(question4) as avgques4 FROM sessionafterfeedbacks where Subject_Code ='".$_SESSION['subcodefrmsub']."' group by Week order by Week ASC");

		$aggclass4->execute();

		$res = $aggclass4->fetchAll(PDO::FETCH_OBJ);

		$data4 = array();
		//initialize once
		

		foreach ($res as $detail) 
		{
			$data4[] = $detail;
		}

		print json_encode($data4);
?>