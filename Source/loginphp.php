<?php
//include 'include/dbconfig.php';
$dbHost = "silo.cs.indiana.edu";
$dbUserAndName = "b561f12_63";
$dbPass = "b561f12_63";

$con = mysql_connect ($dbHost, $dbUserAndName, $dbPass);
mysql_select_db("b561f12_63", $con);
$email = $_POST['email'];
$password = $_POST['password'];

$password = crypt($password , '$1$d4rubyr8a');

//echo "Your name: <i>$input</i>";

$query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'" ;
// execute query
$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());

// see if any rows were returned
if (mysql_num_rows($result) > 0) {
    // yes
    // print them one after another
	session_start();
    //echo "<table cellpadding=10 border=1>";
    $row = mysql_fetch_row($result);
        //echo "<tr>";
      //  echo "<td>".$row[0]."</td>";
		$_SESSION['email'] =$row[0];
        //echo "<td>" . $row[1]."</td>";
		$_SESSION['name'] = $row[1];
        //echo "<td>".$row[2]."</td>";
		$_SESSION['password'] = $row[2];
		//echo "<td>".$row[3]."</td>";
		$_SESSION['admin'] = $row[3];
        //echo "</tr>";
    
    //echo "</table>";
	if($row[3] == '1')
        {
            header("Location:adminhome.php");
        }
    else
        {
	       header("Location:home.php");
        }
}
else {
    // no
    // print status message
    //echo "<br>Invalid Username or password";
	header("Location:login.php?failed=1");
}

// free result set memory
mysql_free_result($result);

// close connection
mysql_close($con);


?>