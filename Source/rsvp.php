<?php

session_start();

$url = $_POST['url'];
$event_id = $_POST['eid'];
$rsvp = $_POST['rsvpdecision'];
$email = $_SESSION['email'];

echo "$url";
//echo "$event_id";
//echo "$email";
//echo "$rsvp";

include 'dbconfig.php';
if($con)
{
	mysql_select_db("b561f12_63", $con);
	$query = "UPDATE invites i SET RSVP='$rsvp' WHERE i.event_id= '$event_id' and i.email='$email'";
	$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());	
}

mysql_close($con);
header('Location:' . $url);

?>
