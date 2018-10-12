<?php
	session_start();

	$lecturer = $_SESSION['userNameL'];
	$subcodeL = $_SESSION['subLecdelete'];

		$connection = mysqli_connect('localhost', 'root', '');
		if (!$connection){
		    die("Database Connection Failed" . mysqli_error($connection));
		}
		$select_db = mysqli_select_db($connection, 'chat');
		if (!$select_db){
		    die("Database Selection Failed" . mysqli_error($connection));
		}
//echo "<script type='text/javascript'>alert('".$_GET['id']."')</script>";

if(isset($_GET['id']) && !empty($_GET['id'])){
	$selsql = "SELECT paths FROM uploader WHERE id = '".$_GET['id']."'";
	$result = mysqli_query($connection, $selsql);
	$r = mysqli_fetch_assoc($result);
	$delsql="DELETE FROM uploader WHERE id= '". $_GET['id']."'";
	if(mysqli_query($connection, $delsql)){
	/*	header("Location: viewfiles.php?userNameL=<?php echo($lecturer); ?>&subcodeL=<?php echo($subcodeL); ?>"); */
	header('Location: viewfiles.php?subcodeL='.$subcodeL."&userNameL=".$lecturer);
	}
}else{
	/* header("Location: viewfiles.php?userNameL=<?php echo($lecturer); ?>&subcodeL=<?php echo($subcodeL); ?>"); */
	header('Location: viewfiles.php?subcodeL='.$subcodeL."&userNameL=".$lecturer);
}





	



?>