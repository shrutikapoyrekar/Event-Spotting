<?php
 	include 'dbconfig.php';
	mysql_select_db("b561f12_63", $con);
	
	$event_id = $_GET['eid'];
	//echo $event_id;
	
	$qry = "select `logo` from `event` where `event_id` = '$event_id'";
	$getImage = mysql_query($qry);
	
	
	while ($row = mysql_fetch_array($getImage, MYSQL_ASSOC)){
		$img = $row['logo'];
		$img = base64_decode($img);
		$im = imagecreatefromstring($img);
		//echo $img;
		if ($im !== false) {
			
			header('Content-Type: image/jpeg');
			imagejpeg($im);
			imagedestroy($im);
		}
		else
		{
			$img = "\images"."\\"."";
			//echo $img;
			//$img = $row['logo'];
			$img = base64_decode($img);
			$im = imagecreatefromstring($img);
			//header('Content-Type: image/jpeg');
			imagejpeg($im);
			imagedestroy($im);
		}
	}
	
?>