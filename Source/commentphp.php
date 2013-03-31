<?php

session_start();

$url = $_POST['url'];
$event_id = $_POST['eid'];
$comment = $_POST['comment'];
$email = $_SESSION['email'];
$rating = $_POST['rating'];
//echo "$url";
//echo "$event_id";
//echo "$email";
include 'dbconfig.php';
if($con)
{
	mysql_select_db("b561f12_63", $con);
	$query = "INSERT INTO feedback (email, event_id, comment,rating, approval_flag) VALUES ('$email', '$event_id','$comment','$rating',1)";
	$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
	
}
mysql_close($con);
	
header('Location:' . $url);
?>