<?php
session_start();

include ("config.php");

$subcode = $_POST['SubCode'];
$subname = $_POST['ClassName'];
$pinnum = $_POST['pinNum'];
$week = $_POST['week'];

$lecturer = $_SESSION['userNameL'];

try
{
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$classinfo = "INSERT INTO classroom (Subject_Code, Subject_Name, Lecturer_Name, Week, PIN, Availability) VALUES ('".$_POST["SubCode"]."', '".$_POST["ClassName"]."', '".$_SESSION['userNameL']."' ,'".$_POST['week']."','".$_POST["pinNum"]."', '1')";
	$db->exec($classinfo);
	
}
catch(PDOException $e)
{
	echo $classinfo . "<br>" . $e->getMessage();
}

$classinfo = null;

header('Location: ../Lecturers/indexLChat.php?subcodeL='.$subcode."&weekL=".$week);

 ?>