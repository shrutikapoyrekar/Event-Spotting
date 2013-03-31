<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event Spotting</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/classpath/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/classpath/js/jquery.pngFix.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).pngFix();
	});
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
        <div class="topsearch dbfr">
          <div class="topsearch_topcurve dbfl"></div>
          <div class="topsearch_mid dbfl">
            <div class="searchico dbfl"></div>
            <div class="searcharea dbfl">
              <p class="bold">Username &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Password</p>
			  <!--<p class="bold">Password</p>-->
              <div>
        				<form action="loginphp.php" target="_self" method="post">
        					<input type="text" name="email" size="21" class="loginBox"/>
        					<input type="password" name="password" size="21" class="loginBox"/>
        					<input type="submit" value="Log in" class="searchbtn orange"/>
        				</form>
        					<h3>Not a member yet? <a href="signup.php"> Sign up</a></h3>
        				<div>
          				<?php if(isset($_GET['failed'])){
          						if($_GET['failed']==1){
          							echo 'Username or Password Invalid';
          						}
          					}
          				?> 
                </div>
				
              </div>
             <!-- <p class="bold"><a href="#">Advanced Search </a></p>-->
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
                <li class="menu1" ><a href="home.php" class="current1" id="u1">Home</a></li>
                <li class="menu1"><a href="event.php" id="u2"> Events</a></li>
                <li class="menu1"><a href="pastevent.php" id="u2"> Past Events</a></li>
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
          <div class="lp_left dbfl wid590"><img src="calendar.jpg" height="379" width="579" alt="event spotting" class="lpleft_video"/></div>
          <div class="lp_right dbfl wid390">
            <h1>WHAT DOES EVENT SPOTTING OFFER</h1>
            <ul class="lp_offeru_nav dbfl">

              <li class="lp_one" ><span class="dbfl"><img src="#" height="50" width="101" alt="Create"/></span> <span class="dbfl mar10"><a href="#.">Create Events</a></span> </li>

              <li class="lp_two"><span class="dbfl"><img src="#" height="50" width="101" alt="Browse"/></span> <span class="dbfl mar10"> <a href="#.">Browse Events</a></span>  </li>

              <li class="lp_three"><span class="dbfl"><img src="#" height="50" width="101" alt="Invite"/></span> <span class="dbfl mar10"> <a href="#.">Invite</a></span>  </li>

            </ul>
			
			
		      <input type="button" onclick="location.href='/sign_Up.html'" value="Get Started Now" class="getstartedbtn dbfl marT30" />
          </div>
        </div>
        
      </div>
    </div>
    <div class="footerarea">
      <div class="footer">
        <div class="copyright dbfl">
          <div class="footerlinks dbfl"><span class="dbfr"><a href="#">About Us</a> | <a href="#">About Event Spotting</a> | <a href="#">Contact Us</a> | <a href="#">Help</a></span></div>
          <!--<div class="footerlinks dbfl">Copyright 2012 all rights reserved | <a href="#">Disclaimer</a> | <a href="#">Terms &amp; Conditions</a> | <a href="#">Privacy Policy</a></div>-->
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
</body>
</html>
