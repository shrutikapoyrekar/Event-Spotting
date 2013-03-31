
<?php
session_start();

if (!isset($_SESSION['email']) ) {
	header("Location:unauthorized.php");
}

$url = $_POST['url'];
$email = $_SESSION['email'];
$event_id=$_POST['event_id'];
//echo "$email $event_id";
include 'dbconfig.php';
if($con)
{
	mysql_select_db("b561f12_63", $con);

	mysql_query("DELETE FROM feedback where event_id='$event_id' and email='$email'") or die ("Error in query: ".mysql_error());
}
mysql_close($con);
header('Location:' . $url);
 
?>