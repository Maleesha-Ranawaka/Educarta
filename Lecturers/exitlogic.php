<?php
	session_start();

	include("../MainStudents/config.php");


	try
	{
		$sql = "UPDATE classroom SET Availability = 0 WHERE Subject_Code ='" .$_SESSION["subLec"]. "'";

		$stmt = $db->prepare($sql);

		$stmt->execute();

	}
	
	catch(PDOException $e)
    {
    	echo $sql . "<br>" . $e->getMessage();
    }

	$db = null;

?>