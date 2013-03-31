<?php



if (!isset($_SESSION['email']) ) {
	echo "<a href=home.php>Home</a> ";
	echo " | ";
	echo "<a href=# >About Event Spotting</a> ";
	echo " | ";
	echo "<a href =login.php>Login</a>";
}
else if (isset($_SESSION['email'])) {
	echo "Welcome, ";
    echo $_SESSION['name'];
	echo " | ";
	if($_SESSION['admin'] == 1)
	{
		echo "<a href=adminevents.php>Administration</a> ";
		echo " | ";
	}
	if($_SESSION['admin'] == 0)
		{
			echo "<a href=home.php>Home</a> ";
			echo " | ";
			echo "<a href=# >About Event Spotting</a> ";
			echo " | ";
		}
	echo "<a href = logout.php>Logout</a>";
}
?>