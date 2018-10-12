<?php 
	session_start();
	include('../config.php');

	switch($_REQUEST['action']){

		case "sendMessage":
			  //global $db;
			
			
			$_SESSION['usernameL'] = "Lecturer";
			

			$query = $db->prepare("INSERT INTO messages SET user=?, message=?, Subject_Code=?, Week=?");	
			$run = $query->execute([$_SESSION['usernameL'],$_REQUEST['message'],$_SESSION['subLec'],$_SESSION['weekLec']]); 
			//echo "test";

			if( $run ){
				echo 1;
				exit;
			}

		break;

		case "getMessages":
			//echo "working";



		$query = $db->prepare("SELECT * FROM messages WHERE Subject_Code = '".$_SESSION['subLec']."' AND Week = '".$_SESSION["weekLec"]."'");	
		//$query = $db->prepare("SELECT id,message,date FROM messages");
			
		$run = $query->execute();

		$rs = $query->fetchAll(PDO::FETCH_OBJ);

		//$dateShow = '';
		


		//echo var_dump($rs); 
		$chat = '';
		foreach ($rs as $message) 
		{
			//$dateShow .= '<div class="date-message"><strong>'.date('Y-m-d',strtotime($message->date)).'</strong></div>';

			//$chat .= $message->message. '<br />';
			//$chat .= '<div class="single-message"> <strong>'."Annonymous".': </strong> '.$message->message. '</div>';
			$chat .= '<div class="single-message"> <strong>'.$message->user.' :- </strong> '.$message->message.'<span>'.date('Y-m-d h:i a', strtotime($message->date)).'</span></div>';
		}
		//echo $dateShow;
		echo $chat;

		break;
	}

?>