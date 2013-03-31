
<?php
session_start();


include 'dbconfig.php';
 mysql_select_db("b561f12_63", $con);


if (!isset($_SESSION['email']) ) {
	header("Location:unauthorized.php");
}

else{
	if($_SESSION['admin'] == 0){
	header("Location:unauthorized.php");
	}
	else if($_SESSION['admin'] == 1){
		$id = $_POST['event_id'];

		$query = "UPDATE event SET event_approval_flag='1' WHERE event_id= '$id'";
		//echo $query;

		$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
		

		header("Location:adminevents.php");
	}
}
mysql_close($con);


?>

