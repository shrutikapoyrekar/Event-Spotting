<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<?php
  session_start();
?>
</head>
<body>
<div id="bodyWrap">
  <div class="wrapper">
    <div class="toplinks wid980"> <span class="dbfr padTB5">
  <?php
  include 'username.php';
  ?>
  </a></span> </div>
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
                <li class="menu1"><a href="event.php"class="current1" id="u2"> Events</a></li>
                <li class="menu1"><a href="pastevent.php" id="u2"> Past Events</a></li>
                <?php
                  if (isset($_SESSION['email']) ) {
                      echo '<li class="menu1"><a href="create_event.php" id="u2">Create Events</a></li>';
                      echo '<li class="menu1"><a href="rsvpevents.php" id="u2">RSVP</a></li>';
                      echo '<li class="menu1"><a href="myevents.php" id="u2">My Events</a></li>';
                      echo '<li class="menu1"><a href="myinterests.php" id="u2">My Interests</a></li>';
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
						<div class="error_msg"></div>
					</div>
			</div>
		  <form action="advancedsearchdisplay.php" method="post"  onsubmit="return validateAdvSearchForm();">
            <!--<img src="calendar.jpg" height="379" width="579" alt="events" class="lpleft_image"/>-->
			<!--Name code div starts-->
                <div class="wid980 adv_search_rgt">
                  <div class="adv_search_lft wid300 marL250">  
                    <p class="bold marT30 font15">Category: </p>
                  </div>
                  <div class="adv_search_rgt wid190">  
                    <p class="bold marT30 font15">
                      <input type="checkbox" name="categories[]" value="Art Exhibitions" id="Art Exhibitions">Art Exhibitions<br></input>
                      <input type="checkbox" name="categories[]" value="Career Fairs" id="Career Fairs">Career Fairs<br></input>
                      <input type="checkbox" name="categories[]" value="Concerts" id="Concerts">Concerts<br></input>
                      <input type="checkbox" name="categories[]" value="Plays" id="Plays">Plays<br></input>
                      <input type="checkbox" name="categories[]" value="Sports" id="Sports">Sports<br></input>
                    </p>
                  </div>
                  <div class="adv_search_rgt wid190">  
                    <p class="bold marT30 font15">
                      <input type="checkbox" name="categories[]" value="Business" class="marL10" id="Business">Business<br></input>
                      <input type="checkbox" name="categories[]" value="Charity" class="marL10" id="Charity">Charity<br></input>
                      <input type="checkbox" name="categories[]" value="Parties" class="marL10" id="Parties">Parties<br></input>
                      <input type="checkbox" name="categories[]" value="Reunions" class="marL10" id="Reunions">Reunions<br></input>
                      <input type="checkbox" name="categories[]" value="Tech Talks" class="marL10" id="Tech Talks">Tech Talks<br></input>
                    </p>
                  </div>
                </div>
                <!--Name code ends-->
				<!--email code div starts-->
                <div class="wid980 adv_search_rgt">
                  <div class="adv_search_lft wid300 marL250">  
                    <p class="bold marT30 font15">City: </p>
                  </div>
                  <div class="adv_search_rgt wid300">  
                    <p class="bold marT30 font15">
                      <select class="cities adv_search_zipcode" style="width:250px;" name="city" id="city">
                        <option value="default">Select a City</option>
                        <option value="Bloomington">Bloomington</option>
                        <option value="Chicago">Chicago</option>
                        <option value="Indianapolis">Indianapolis</option>
                        <option value="New York">New York</option>
                      </select>
                    </p>
                  </div>
                </div>
                <!--email code ends-->
                <div class="wid980 adv_search_rgt">
                  <div class="adv_search_lft wid300 marL250">  
                      <p class="bold marT30 font15">Zipcode: </p>
                  </div>
                  <div class="adv_search_rgt wid300">  
                    <p class="bold marT30 font15">
                      <input type="text" class="adv_search_zipcode" name="zipcode" id="zipcode"/>
                    </p>
                  </div>
                </div>
                <!--password code div starts-->
                <div class="wid980 adv_search_rgt">
                  <div class="adv_search_lft wid300 marL250">  
                    <p class="bold marT30 font15">Date: </p>
                  </div>
                  <div class="adv_search_rgt wid300">  
                    <p class="bold marT30 font15">
                      <input type="date" class="adv_search_date" name="date" id="date"/>
                    </p>
                  </div>
                </div>
                <!--password code ends-->
				<!--Reenter password code div starts-->
                <div class="wid980 adv_search_rgt">
                  <div class="adv_search_lft wid300 marL250">  
                    <p class="bold marT30 font15">Time: </p>
                  </div>
                  <div class="adv_search_rgt wid300">  
                    <p class="bold marT30 font15">
                      <select class="cities" style="width:125px;" name="HH" onchange="makeEnable()" id="HH">
                        <option value="default">HH</option>
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                      <select class="cities" style="width:125px;" name="MM" disabled="true" id="MM">
                        <option value="default">MM</option>
                        <option value="00">00</option>
                        <option value="05">05</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="35">35</option>
                        <option value="40">40</option>
                        <option value="45">45</option>
                        <option value="50">50</option>
                        <option value="55">55</option>
                      </select>
                    </p>
                  </div>
                </div>
            <div class="wid980 adv_search_rgt">
                <p class="bold marT30 font15"><input type="submit" value="Search" name="advsearch" class="searchbtn center_align orange"/></p>
              </form>
            </div>
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
