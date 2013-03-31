<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event Spotting</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	$(document).ready(function(){
		$(document).pngFix();
	});
</script>
<script type="text/javascript">
  function makeEnable()
  {
      if(document.getElementById("HH").value != "default")
        {
          var x=document.getElementById("MM")
          //document.write(document.getElementById("HH").value)
          x.disabled=false
        }
      else
        {
          var x=document.getElementById("MM")
          //document.write(document.getElementById("HH").value)
          document.getElementById("MM").value = "default"
          x.disabled=true 
        }
  }

  function validateAdvSearchForm()
  {
      var timeHH = document.getElementById("HH").value
      var timeMM = document.getElementById("MM").value
      var city = document.getElementById("city").value
      var date = document.getElementById("date").value
      var zipcode = document.getElementById("zipcode").value
      var catBusiness = document.getElementById("Business").checked
      var catArt = document.getElementById("Art Exhibitions").checked
      var catCareer = document.getElementById("Career Fairs").checked
      var catCharity = document.getElementById("Charity").checked
      var catParty = document.getElementById("Parties").checked
      var catPlay = document.getElementById("Plays").checked
      var catReunion = document.getElementById("Reunions").checked
      var catSport = document.getElementById("Sports").checked
      var catTech = document.getElementById("Tech Talks").checked
      var catConcert = document.getElementById("Concerts").checked

      if(timeHH=="default" && timeMM=="default" && city=="default" && !zipcode && !date && catBusiness==false && catArt==false && catCareer==false && catCharity==false && catConcert==false && catParty==false && catPlay==false && catReunion==false && catSport==false && catTech==false)
        {
          alert("Please select some option!");
          return false;
        }
      else
        return true;
  }
</script>
<script type="text/javascript">
  function validateForm()
    {
        var submitSearch = document.getElementById("searchbar").value
        
        if(submitSearch == "default")
          {
            alert("Please select a category!");
            return false;
          }
        else
          return true;
    }
</script>
<script type="text/javascript" src="/classpath/js/mainnav2.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="validate.js"></script>
</head>
<body>
<div id="bodyWrap">

  <div class="wrapper">
    <div class="toplinks wid980"> <span class="dbfr padTB5"><?php include 'username.php' ?></span> </div>
    <div class="headerarea">
      <!--Header Starts-->
      <div class="header">
        <div class="logo"><a href="/login.html"><img src="eventspottingIcon.png" alt="Event Spotting" border="0" height="84" width="143"/></a></div>
        <div class="topsearch dbfr">
          <div class="topsearch_topcurve dbfl"></div>
          <div class="topsearch_mid dbfl">
            <div class="searchico dbfl"></div>
             <div class="searcharea dbfl">
              <p class="bold">Search</p>
              
                        <form action="searchdisplay.php" method="post" onsubmit="return validateForm();">
                          <select class="search_category" name="searchbar" id="searchbar">
                            <option value="default">Categories</option>
                            <option value="Art Exhibitions">Art Exhibitions</option>
                            <option value="Business">Business</option>
                            <option value="Career Fairs">Career Fairs</option>
                            <option value="Charity">Charity</option>
                            <option value="Concerts">Concerts</option>
                            <option value="Parties">Parties</option>
                            <option value="Plays">Plays</option>
                            <option value="Reunions">Reunions</option>
                            <option value="Sports">Sports</option>
                            <option value="Tech Talks">Tech Talks</option>
                          </select>
                          <input type="submit" value="Search" name="search" class="searchbtn orange"/>
                        </form>
              <p class="bold"><a href="adv_search.php">Advanced Search </a></p>
            </div>
          </div>
          <div class="topsearch_btmcurve dbfl"></div>
        </div>
      </div>
    </div>
    <div class="mc_landingpage_area">
      <div class="maincontent">
        <div id="menu" class="dbfl">
          <div id="mainnavWrap" >
            <!-- Main Nav Wrapper -->
            <div class="leftbckg dbfl"></div>
            <div class="mid dbfl">
              <ul id="nav">
                <li class="menu1" ><a href="home.php" id="u1">Home</a></li>
                <li class="menu1"><a href="event.php" id="u2"> Events</a></li>
                <li class="menu1"><a href="pastevent.php" id="u2"> Past Events</a></li>
                <?php
                  if (isset($_SESSION['email']) ) {
                      echo '<li class="menu1"><a href="create_event.php" id="u2">Create Events</a></li>';
                      echo '<li class="menu1"><a href="rsvpevents.php" id="u2">RSVP</a></li>';
                      echo '<li class="menu1"><a href="myevents.php" id="u2">My Events</a></li>';
                      echo '<li class="menu1"><a href="myinterests.php"class="current1" id="u2">My Interests</a></li>';
                    }
                ?>
              </ul>
            </div>
            <div class="rightbckg dbfl"></div>
            <!-- End of Main Nav Wrapper -->
          </div>
          <div id="nav2Wrap">
            <!-- Nav 2 Wrapper -->
            <div class="leftbckg dbfl"></div>
            <div class="rightbckg dbfl"></div>
            <!-- End of Nav 2 Wrapper -->
          </div>
          <!-- End of Header -->
        </div>
        <div class="dbfl marT10 wid980">
          <div class="lp_left dbfl wid980">
		  <div class="wid980 adv_search_rgt">
                  <div class="adv_search_lft wid300 marL250">  
						
					</div>
			</div>
		  
                <div class="wid980 adv_search_rgt">
                 <?php
                  // retrieve form data
                  $eventName = $_GET['eventId'];
                  //include 'searchbar.php';
                  // use it
				  $url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                  if(!empty($eventName))
                    {
                        include 'dbconfig.php';
                        //mysql_select_db ($dbUserAndName) or die ("Database $dbUserAndName not found on host $dbHost");
                        if($con)
                        {
                            mysql_select_db("b561f12_63", $con);
							$event_id;

                            $result = mysql_query("SELECT e.event_name, e.city, e.description, e.time, e.street, e.zip, e.date, e.event_id, e.logo FROM event e where e.event_id='$eventName'") or die ("Error in query: ".mysql_error());
                            if (mysql_num_rows($result) == 0)
                                    {
                                      echo "No results found!";
                                    }
                            else
                              { 
                                while($row = mysql_fetch_array($result))
                                  {
									  $res = mysql_query("SELECT AVG(f.rating) FROM feedback f where f.event_id='$row[7]' and f.rating>0") or die ("Error in query: ".mysql_error());
									  $avg =  mysql_fetch_array($res);
									  $avgrating = round($avg[0],1);
									  $event_id=$row[7];

                    //image extraction
                     // $image_qry = "select `logo` from `event` where `event_id` = '$eventName'";
                     // $getImage = mysql_query($image_qry);
                     // $eve = mysql_fetch_assoc($getImage);
                     // $im = imagecreatefrompng("images"."\\".$eve['logo']);
                     // header('Content-Type: image/png');

                      

                    //image extraction ends
                                      echo '<div class="wid980 hgt25"><p class="bold font20" style="color:#FF8205;">'. $row[0] .'</p></div>';
									  echo '<div class="wid980 hgt25"><p class="font15 fontOrange">Average Rating : ';
									  if($avgrating == 0){
										echo "No ratings yet";
									  }
									  else{
										echo "$avgrating";
									  }
									  echo '</p></div>';
                                     // echo "<div class='wid980 hgt75'><img src='" .$im." /></div>";
                                      echo "<div class='wid980 hgt75'><p class='font15 fontColor'>" . $row[2] . "</p></div>";
                                      echo "<div class='wid980 hgt25'><p class='font15 fontColor'>" . $row[4] . "</p></div>";
                                      echo "<div class='wid980 hgt25'><p class='font15 fontColor'>" . $row[1] ." - " .$row[5]. "</p></div>";
                                      echo "<div class='wid980 hgt25'><p class='font15 fontColor'>" . $row[3] . "</p></div>";
                                      echo "<div class='wid980 hgt25'><p class='font15 fontColor'>" . $row[6] . "</p></div>";
                                  }
                                //echo "</table>";
                                //mysql_close($con);
                              }
                    imagepng($im);
                      imagedestroy($im);
							  
							$result2 = mysql_query("SELECT u.name,f.comment,f.rating, f.email,f.event_id FROM feedback f,event e,user u where f.event_id=e.event_id and e.event_id='$eventName' and u.email=f.email") or die ("Error in query: $query. ".mysql_error());
							$count2=0;
							echo "<hr style='background:LIGHTGREY;'>";
							echo "<p class='font20 fontColor'>Comments and Ratings</p>";
							echo '<div class="wid980">';
							echo "<div class='error_msg'></div>";
								if(!isset($_SESSION['email']) ) {
									echo "<p class='font15 fontColor'>Login to comment</p>";
								}
								else if (isset($_SESSION['email'])) {
									$sesemail = $_SESSION['email'];
									$result3 =  mysql_query("SELECT f.email FROM feedback f WHERE f.event_id='$event_id' and f.email='$sesemail'") or die ("Error in query: $query. ".mysql_error());
									
									if (mysql_num_rows($result3) == 0){
										$result3 = mysql_query("SELECT e.event_id FROM event e where e.event_id='$eventName'");
										$row = mysql_fetch_row($result3);
										$eid = $row[0];
										
										echo "<form name='commentBox' action='commentphp.php' method='post'>";
										echo "<textarea maxlength='1000' rows='4' cols='120' name='comment' id='comment'></textarea>";
										echo '<p class="bold">Rating</p>';
                    echo "<select name='rating'>
												<option value='0'>No Rating</option>
												<option value='1'>1</option>
												<option value='2'>2</option>
												<option value='3'>3</option>
												<option value='4'>4</option>
												<option value='5'>5</option>
											</select></p>";
										echo "<input type='hidden' value='$url' name='url'/>";
										echo "<input type='hidden' value='$eid' name='eid'/>";
										echo "<div class='wid980'>";
											echo "<input type='submit' value='Comment' class='searchbtn orange'/>";
											echo "</form>";
										echo "</div>";
									}
									else{
										echo "<p class='font15 fontColor'>You have already posted a rating.</p>";
									}
								}
							echo "</div>";
							if (mysql_num_rows($result2) > 0) {
								while($row = mysql_fetch_row($result2)) {
									
										echo "<hr style='background:LIGHTGREY;'>";
										//echo '<div class="wid980 hgt25"><p class="bold font20 fontOrange"><a href="display.php?event_id=' . $row[0] . '">' .$row[2] .'</a></p></div>';
										echo "<div class='wid980 hgt20'><p class='font15 fontColor'>" . $row[0] . "</p></div>";
										if($row[2]>0){
											echo "<div class='wid980 '><p class='font11 fontColor'>Rating : " . $row[2] . "</p></div>";
										}
										else{
											echo "<div class='wid980 '><p class='font11 fontColor'>No rating</p></div>";
										}
										//if(strlen($row[3]) > 100){
										//	echo "<div class='wid980'><p class='font10 fontColor'>" . substr ( $row[3] , 0 , 100 ) . " .... </p></div>";
										//}
										//else {
											echo "<div class='wid980 '><p class='font10 fontColor'>" . $row[1] . "</p></div>";
										//}
										if($row[3] == $_SESSION['email']){
											echo "<form name='DelButton' action='deletecomment.php' method='post'>";
											echo "<input type='hidden' value='$row[4]' name='event_id'/>";
											echo "<input type='hidden' value='$url' name='url'/>";
											echo "<input type='submit' value='delete' class='searchbtn orange'/>";
											echo "</form>";
										}
								}
							}
							else
								echo "<p class='font9 fontColor'>No Comments yet</p>";
							
							echo "<hr style='background:LIGHTGREY;'>";
							
							
							//echo $_SERVER['REQUEST_URI'];
							mysql_close($con);
						}
								
						
                        else
                          echo "Couldn't Connect!!!";
                    }

                    ?>
          </div>
        </div>
        </div>
    </div>
    <div class="footerarea">
      <div class="footer">
        <div class="copyright dbfl">
          <div class="footerlinks dbfl"><span class="dbfr"><a href="#">About Us</a> | <a href="#">About Event Spotting</a> | <a href="#">Contact Us</a> | <a href="#">Help</a></span></div>
          </div>
        <div class="connectwithus_links dbfl wid250">
          <div class="dbfl wid250">
            <h1>CONNECT WITH US</h1>
            <!--<p>On various Social networking Platforms</p>-->
          </div>
          <span class="dbfl wid250"> <a href="#." class="fbico">Facebook</a><a href="#." class="twitterico">Twitter</a> </span> </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	//<![CDATA[
        var validator = new FormValidator(
            'commentBox',
            [ { name: 'comment', display: 'Comment', rules: 'required' }
              //{ name: 'email', display: 'Email', rules: 'required|valid_email' },
			  //{ name: 'interests', display: 'Interests', rules: 'required' },
              //{ name: 'password', rules: 'required' },
			  //{ name: 'password', display: 'Password', rules: 'min_length[6]' },
              //{ name: 'repassword', display: 'password confirmation', rules: 'required|matches[password]' }
			  	
            ], 
            function(errors, event) { 
            	var ERRORS = $('.error_msg');
        					    
        		if (errors.length > 0) {
        			ERRORS.empty();
            		
            		for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
            			ERRORS.append(errors[i].message + '<br />');
        			}
        							
        			ERRORS.fadeIn(200);
    			} 
     		}
     	);
    //]]>
    </script>
</body>
</html>
