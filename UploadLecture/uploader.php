<?php
	session_start();


$dbhost = 'localhost';
$dbname = 'chat';
$dbuser = 'root';
$dbpass = '';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$subLec = $_SESSION["subLec"];
$lecturer = $_SESSION['userNameL'];

$filename = $_POST['textupload'];

//echo $subLec;

if(isset($_POST["submit1"]))
{
	echo $subLec;
	$fnm = $_FILES["fileupload"]["name"];
	$dst = "upload/".$fnm;
	move_uploaded_file($_FILES["fileupload"]["tmp_name"], $dst);

	$query = "INSERT into  uploader(Subject_Code,filename,name,paths,uploaded_on) VALUES ('$subLec','$filename','$fnm','$dst',NOW())";

	$stmt = $conn->prepare($query);
	$stmt->execute();

	$stmt->close();
	$conn->close();

	header("Location: uploadL.php?userNameL=".$lecturer."&subcodeL=".$subLec);

}

 
?>
