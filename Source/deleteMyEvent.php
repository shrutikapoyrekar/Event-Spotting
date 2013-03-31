<?php

	session_start();

	$event_id = $_POST['eventid'];
	$email = $_SESSION['email'];
	//echo $event_id;
	//echo $email;
	include 'dbconfig.php';
	if($con)
	{
		mysql_select_db("b561f12_63", $con);
		//UPDATE event SET event_cancelation_flag='1' WHERE event_id='$event_id'
		//$query = "INSERT INTO feedback (email, event_id, comment,rating, approval_flag) VALUES ('$email', '$event_id','$comment','$rating',1)";
		$query = "DELETE FROM event WHERE event_id='$event_id'";
		$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
		
	}
	mysql_close($con);
		
	header('Location:home.php');
?>