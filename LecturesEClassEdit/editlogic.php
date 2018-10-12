<?php
session_start();

include ("config.php");

$subcode = $_GET['SubCode'];
$subname = $_GET['ClassName'];
$pinnum = $_POST['pinNum'];
$week = $_POST['week'];
$number = 1;

$lecturer = $_SESSION['userNameL'];

try
{
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// $classinfo = "INSERT INTO classroom (Subject_Code, Subject_Name, Lecturer_Name, Week, PIN, Availability) VALUES ('".$_POST["SubCode"]."', '".$_POST["ClassName"]."', '".$_SESSION['userNameL']."' ,'".$_POST['week']."','".$_POST["pinNum"]."', '1')";

	//$classinfo = "UPDATE classroom SET PIN='".$_POST['pinNum']."',";
	$classinfo = "UPDATE classroom SET Availability='".$number."', PIN='".$pinnum."', Week='".$week."' WHERE Subject_Code = '".$subcode."'";
	$db->exec($classinfo);
	
}
catch(PDOException $e)
{
	echo $classinfo . "<br>" . $e->getMessage();
}

$classinfo = null;

header('Location: ../Lecturers/indexLChat.php?subcodeL='.$subcode."&weekL=".$week);

 ?>