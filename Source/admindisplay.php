<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
session_start();

if (!isset($_SESSION['email']) ) {
	header("Location:unauthorized.php");
}
else{
	if($_SESSION['admin'] == 0){
	header("Location:unauthorized.php");
	}
}
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
</head>
<body>
<div id="bodyWrap">

  <div class="wrapper">
    <div class="toplinks wid980"> <span class="dbfr padTB5">
    <?php
      include 'username.php';
      ?>
    </span> </div>
    <div class="headerarea">
      <!--Header Starts-->
      <div class="header">
        <div class="logo"><a href="/login.html"><img src="eventspottingIcon.png" alt="Event Spotting" border="0" height="84" width="143"/></a></div>
        <!--<div class="topsearch dbfr">
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
        </div>-->
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
                <li class="menu1" ><a href="adminhome.php" id="u1">Home</a></li>
                <li class="menu1"><a href="adminevents.php" class="current1" id="u2"> Events</a></li>
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
						<div class="error_msg"></div>
					</div>
			</div>
		 
                <div class="wid980 adv_search_rgt">
                 <?php
                  // retrieve form data
                  $eventName = $_GET['event_id'];
                  //include 'searchbar.php';
                  // use it
                  if(!empty($eventName))
                    {
                        $dbHost = "silo.cs.indiana.edu";
                        $dbUserAndName = "b561f12_63";
                        $dbPass = "b561f12_63";

                        $con = mysql_connect ($dbHost, $dbUserAndName, $dbPass);
                        //mysql_select_db ($dbUserAndName) or die ("Database $dbUserAndName not found on host $dbHost");
                        if($con)
                          {
                            mysql_select_db("b561f12_63", $con);
                            $event_id=$_GET['event_id'];

                            $result = mysql_query("SELECT e.event_name, e.city, e.description, e.time, e.street, e.zip, e.date FROM event e where e.event_id='$event_id'") or die ("Error in query: ".mysql_error());
                            if (mysql_num_rows($result) == 0)
                                    {
                                      echo "No events to moderate.";
                                    }
                            else
                              { 
                                while($row = mysql_fetch_array($result))
                                  {
                                      echo '<div class="wid980 hgt25"><p class="bold font20" style="color:#FF8205;">' .$row[0] .'</p></div>';
                                      echo "<div class='wid980 hgt75'><p class='font15 fontColor'>" . $row[2] . "</p></div>";
                                      echo "<div class='wid980 hgt25'><p class='font15 fontColor'>" . $row[4] . "</p></div>";
                                      echo "<div class='wid980 hgt25'><p class='font15 fontColor'>" . $row[1] ." - " .$row[5]. "</p></div>";
                                      echo "<div class='wid980 hgt25'><p class='font15 fontColor'>" . $row[3] . "</p></div>";
                                      echo "<div class='wid980 hgt25'><p class='font15 fontColor'>" . $row[6] . "</p></div>";
									                    echo "<div class='wid980 hgt75' style='margin-top:10px;padding:0px;'>";
                  										  echo "<div style='display:block;float:left;'>"; 
                  										    echo "<form action='approveevent.php' method='post'><input type= 'hidden' value= '$event_id' name='event_id'/><input type='submit' value='Approve' class='searchbtn orange'/></form>";
                  										  echo "</div>";
                  										  echo "<div style='width:250px;display:block;float:left;margin-left:15px;'> ";
                  										    echo "<form action='deleteevent.php' method='post'><input type= 'hidden' value= '$event_id' name='event_id'/><input type='submit' value='Delete' class='searchbtn orange'/></form>";
                  										  echo "</div>";
                  									  echo "</div>";
                                  }
                                //echo "</table>";
                                mysql_close($con);
                              }
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
            'signupForm',
            [ { name: 'name', display: 'Name', rules: 'required' },
              { name: 'email', display: 'Email', rules: 'required|valid_email' },
			  //{ name: 'interests', display: 'Interests', rules: 'required' },
              { name: 'password', rules: 'required' },
			  { name: 'password', display: 'Password', rules: 'min_length[6]' },
              { name: 'repassword', display: 'password confirmation', rules: 'required|matches[password]' }
			  	
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
