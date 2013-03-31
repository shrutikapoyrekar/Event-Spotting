<?php

//include 'include/dbconfig.php';
$dbHost = "silo.cs.indiana.edu";
$dbUserAndName = "b561f12_63";
$dbPass = "b561f12_63";

$con = mysql_connect ($dbHost, $dbUserAndName, $dbPass);
mysql_select_db("b561f12_63", $con);

$email = $_POST['email'];
$name = $_POST['name'];
if(!empty($_POST['interests'])){
	$interests = $_POST['interests'];
}
$password = $_POST['password'];
$password2 = $_POST['repassword'];


$query = "SELECT * FROM user WHERE email = '$email'";

$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());

	if (mysql_num_rows($result) > 0) {
		header("Location:alreadyregistered.php");
	}
	else {
		$password = crypt($password , '$1$d4rubyr8a');
		$query2 = "INSERT INTO user (email, name, password, isadmin) VALUES ('$email', '$name', '$password', '0')";
		$result2 = mysql_query($query2) or die ("Error in query: $query. ".mysql_error());
		if(!empty($_POST['interests'])){
			$N = count($interests);
			for($i=0; $i < $N; $i++)
			{
				echo($interests[$i] . " ");
				$query2 = "INSERT INTO likes (email,Category_id) VALUES ('$email', '$interests[$i]')";
				mysql_query($query2) or die ("Error in query: $query. ".mysql_error());
			}
		}
		header("Location:registered.php");
		
	}

mysql_free_result($result);	
// close connection
mysql_close($con);


?>
