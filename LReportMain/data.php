<?php
	session_start();

	header('Content-Type: application/json');

	$lecturer=$_SESSION['userNameL'];
	include("../FeedbackStudents/config.php");

	$weekFrm = $_POST['Week'];
	$subcode=$_SESSION['subcodefrmsub'];

		$class1 = $db->prepare("SELECT question1, count(question1) as 'cquestion1' FROM sessionafterfeedbacks where Subject_Code ='".$_SESSION['subcodefrmsub']."' AND Week = '".$_POST['Week']."'  group by question1 order by question1 ASC");

		$class1->execute();

		$res = $class1->fetchAll(PDO::FETCH_OBJ);

		$data = array();
		//initialize once
		
		foreach ($res as $detail) 
		{
			$data[] = $detail;
		}
		// question2 begins
		$class2 = $db->prepare("SELECT question2, count(question2) as 'cquestion2' FROM sessionafterfeedbacks where Subject_Code ='".$_SESSION['subcodefrmsub']."' AND Week = '".$_POST['Week']."'  group by question2 order by question2 ASC");

		$class2->execute();

		$res = $class2->fetchAll(PDO::FETCH_OBJ);

		foreach ($res as $detail2) 
		{
			$data[] = $detail2;
		}
		// question2 ends

		// question3 begins
		$class3 = $db->prepare("SELECT question3, count(question3) as 'cquestion3' FROM sessionafterfeedbacks where Subject_Code ='".$_SESSION['subcodefrmsub']."' AND Week = '".$_POST['Week']."'  group by question3 order by question3 ASC");

		$class3->execute();

		$res = $class3->fetchAll(PDO::FETCH_OBJ);

		foreach ($res as $detail3) 
		{
			$data[] = $detail3;
		}
		// question3 ends

		// question4 begins
		$class4 = $db->prepare("SELECT question4, count(question4) as 'cquestion4' FROM sessionafterfeedbacks where Subject_Code ='".$_SESSION['subcodefrmsub']."' AND Week = '".$_POST['Week']."'  group by question4 order by question4 ASC");

		$class4->execute();

		$res = $class4->fetchAll(PDO::FETCH_OBJ);

		foreach ($res as $detail4) 
		{
			$data[] = $detail4;
		}
		// question4 ends




		// $res->close();
		// $db->close();

		print json_encode($data);
	 // echo $weekFrm;
	 // echo $subcode;
	// echo "string";

?>