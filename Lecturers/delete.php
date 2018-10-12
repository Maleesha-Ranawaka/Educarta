<?php 

	session_start();

	include("../MainStudents/config.php");

	 $subcodeL = $_SESSION["subLec"];
	 $lecturer = $_SESSION['userNameL'];

	try{

		$sql = "DELETE FROM classroom WHERE Subject_Code='".$_SESSION["subLec"]."'";

		$db->exec($sql);
	    //echo "Record deleted successfully";
    
	}
	
		catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

	$db = null;

	header("Location: ../MainLecturers/mainLec.php?userNameL=".$lecturer);



 ?>