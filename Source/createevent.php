<?php
	
	include 'dbconfig.php';
	//session_start();
	session_start();
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//$link = mysql_connect('localhost', 'sandeshkat', 'dadprakash');
	if(!$con) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	//$db = mysql_select_db('sandesh');
	$dbConn = mysql_select_db("b561f12_63", $con);
	if(!$dbConn) {
		die("Unable to select database");
	}
	
	
	$name = $_POST['event_name'];
	$street = $_POST['Street'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	//$state = $_POST['State'];
	$date = $_POST['date'];
	//$time = $_POST['time'];
	$description = $_POST['Description'];
	$logo = $_POST['imagefile'];
	$selected_radio = $_POST['eventtype'];
	if ($selected_radio == 'public') {
		$event_type = 'public';
	}
	else if ($selected_radio == 'private') {
		$event_type = 'private';
		$email_ids = $_POST['email'];
		$emails = explode( "," , $email_ids);
		//echo $email_ids, count($emails);
	}
	$cancellation_flag = '0';
	$approval_flag = '0';
		
	$selected_radio = $_POST['Category'];
	if ($selected_radio == '1') {
		$category_id = 1;
	}
	else if ($selected_radio == '2') {
		$category_id = 2;
	}
	else if ($selected_radio == '3') {
		$category_id = 3;
	}
	else if ($selected_radio == '4') {
		$category_id = 4;
	}
	else if ($selected_radio == '5') {
		$category_id = 5;
	}
	else if ($selected_radio == '6') {
		$category_id = 6;
	}
	else if ($selected_radio == '7') {
		$category_id = '7';
	}
	else if ($selected_radio == '8') {
		$category_id = '8';
	}
	else if ($selected_radio == '9') {
		$category_id = '9';
	}
	else if ($selected_radio == '10') {
		$category_id = '10';
	}

	if(!empty($_POST['HH']))
      {
        $HH=$_POST['HH'];
        if($HH != "default")
          {
            $time = $HH.":";
            //echo " time is: " .$time;
            //$query = $query . $zipcodeQuery;
            if(!empty($_POST['MM']) and $_POST['MM'] != "default")
              {
                $MM=$_POST['MM'];
                $time .= $MM.":00";
                //$timeQuery = " and e.time = " ."'" .$time ."'";
                //$query = $query . $timeQuery;
                //echo " aaaaaa " .$query;
                //echo " time is: " .$MM;
              }
            else
              {
                $time .= "00:00";
                //$timeQuery = " and e.time = " ."'" .$time ."'";
                //$query = $query . $timeQuery;
                //echo " aaasdsdfaaa " .$query;
              }
          }
      }
		
	$email = $_SESSION['email'];
	$event_id = uniqid(true);
	$qry = "INSERT INTO event (event_id, email, event_name, category_id, street, city, zip, date, time, event_type, description, event_cancellation_flag, event_approval_flag, logo) VALUES ('$event_id', '$email', '$name', '$category_id', '$street', '$city', '$zip', '$date', '$time', '$event_type', '$description', '$cancellation_flag', '$approval_flag','$logo')";
	$result=mysql_query($qry) or die ("Error in query: ".mysql_error());
	if($result) {
		session_write_close();
		//echo "true";
		//$i = count($emails);
		//echo $i;
		for($i = 0; $i < count($emails); $i++)
			{
				//echo $i, $emails[$i];
				$temp = $emails[$i];
				$query = "INSERT INTO invites (email, event_id) VALUES ('$temp', '$event_id')";
				mysql_query($query) or die ("Error in query: ".mysql_error());
				// The message
				$message = "You have been invited for " . $name . " on " . $date . " at " . $street . " , " .$city. " at " .$time. " .";

				// In case any of our lines are larger than 150 characters, we should use wordwrap()
				$message = wordwrap($message, 150);

				// Send
				mail($temp, 'Invitation for '.$name, $message);
				//echo $query;
			}
		header("location: event_creation_success.php?event_id=".$event_id);
		//exit();
	}
	else {
		$errmsg_arr[] = 'Error in executing Query';
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: event_creation_failure.php");
		//echo "false" .$qry;
		//exit();
	}
	mysql_close($con);
	
	
	
?>	