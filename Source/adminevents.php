<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event Spotting</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/classpath/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/classpath/js/jquery.pngFix.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="validate.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).pngFix();
	});
</script>
<script type="text/javascript" src="/classpath/js/mainnav2.js"></script>
<?php
session_start();
?>
<!--[if lte IE 6]><style type="text/css">.header .logo, .homebtmshadow, .tab1_vmtitle, feast15_head{behavior: url("script/iepngfix.htc");}</style><![endif]-->
</head>
<body>
<?php
	if (!isset($_SESSION['email']) ) {
		header("Location:unauthorized.php");
	}
	else{
		if($_SESSION['admin'] == 0){
		header("Location:unauthorized.php");
		}
	}

	//include 'include/dbconfig.php';
  $dbHost = "silo.cs.indiana.edu";
  $dbUserAndName = "b561f12_63";
  $dbPass = "b561f12_63";

  $con = mysql_connect ($dbHost, $dbUserAndName, $dbPass);
   mysql_select_db("b561f12_63", $con);
	//$query = "SELECT E.event_id,E.email,E.event_name,E.description,C.category_name FROM event as E,categories as C WHERE E.event_approval_flag = 0 and E.category_id=C.category_id";
	//$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());

?>
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
		
		 <?php
      
      
      
  $errmsg_arr = array();
  
  //Validation error flag
  $errflag = false;
  
  include 'dbconfig.php';
  mysql_select_db("b561f12_63", $con);
  //$tbl_name="event";    //your table name 
    // How many adjacent pages should be shown on each side? 
    $adjacents = 3; 
     
    /*  
       First get total number of rows in data table.  
       If you have a WHERE clause in your query, make sure you mirror it here. 
    */ 
    $query = "SELECT COUNT(*) as num FROM event as E,categories as C WHERE E.event_approval_flag = 0 and E.category_id=C.category_id"; 
    $total_pages = mysql_fetch_array(mysql_query($query)); 
    $total_pages = $total_pages[0]; 
     
    /* Setup vars for query. */ 
    $targetpage = "adminevents.php";     //your file name  (the name of this file) 
    $limit = 5;                                 //how many items to show per page 
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 0; 
    if($page)  
        $start = ($page - 1) * $limit;             //first item to display on this page 
    else 
        $start = 0;                                //if no page var is given, set start to 0 
     
    /* Get data. */ 
    $sql = "SELECT E.event_id,E.email,E.event_name,E.description,C.category_name FROM event as E,categories as C WHERE E.event_approval_flag = 0 and E.category_id=C.category_id LIMIT $start, $limit"; 
    $result = mysql_query($sql);  
     
    /* Setup page vars for display. */ 
    if ($page == 0) $page = 1;                    //if no page var is given, default to 1. 
    $prev = $page - 1;                            //previous page is page - 1 
    $next = $page + 1;                            //next page is page + 1 
    $lastpage = ceil($total_pages/$limit);        //lastpage is = total pages / items per page, rounded up. 
    $lpm1 = $lastpage - 1;                        //last page minus 1 
     
    /*  
        Now we apply our rules and draw the adminevents object.  
        We're actually saving the code to a variable in case we want to draw it more than once. 
    */ 
    $adminevents = ""; 
    if($lastpage > 1) 
    {     
        $adminevents .= "<div class=\"adminevents\"><p class='bold'>"; 
        //previous button 
        if ($page > 1)  
            $adminevents.= "<a href=\"$targetpage?page=$prev\">« Previous      </a>"; 
        else 
            $adminevents.= "<span class=\"disabled\">« Previous      </span>";     
         
        //pages     
        if ($lastpage < 7 + ($adjacents * 2))    //not enough pages to bother breaking it up 
        {     
            for ($counter = 1; $counter <= $lastpage; $counter++) 
            { 
                if ($counter == $page) 
                    $adminevents.= "<span class=\"current\">  $counter  </span>"; 
                else 
                    $adminevents.= "<a href=\"$targetpage?page=$counter\">  $counter  </a>";                     
            } 
        } 
        elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some 
        { 
            //close to beginning; only hide later pages 
            if($page < 1 + ($adjacents * 2))         
            { 
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) 
                { 
                    if ($counter == $page) 
                        $adminevents.= "<span class=\"current\">  $counter  </span>"; 
                    else 
                        $adminevents.= "<a href=\"$targetpage?page=$counter\">  $counter  </a>";                    
                } 
                $adminevents.= "..."; 
                $adminevents.= "<a href=\"$targetpage?page=$lpm1\">  $lpm1  </a>"; 
                $adminevents.= "<a href=\"$targetpage?page=$lastpage\">  $lastpage  </a>";         
            } 
            //in middle; hide some front and some back 
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) 
            { 
                $adminevents.= "<a href=\"$targetpage?page=1\">  1  </a>"; 
                $adminevents.= "<a href=\"$targetpage?page=2\">  2  </a>"; 
                $adminevents.= "..."; 
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) 
                { 
                    if ($counter == $page) 
                        $adminevents.= "<span class=\"current\">$counter</span>"; 
                    else 
                        $adminevents.= "<a href=\"$targetpage?page=$counter\">  $counter  </a>";                    
                } 
                $adminevents.= "..."; 
                $adminevents.= "<a href=\"$targetpage?page=$lpm1\">  $lpm1  </a>"; 
                $adminevents.= "<a href=\"$targetpage?page=$lastpage\">  $lastpage  </a>";         
            } 
            //close to end; only hide early pages 
            else 
            { 
                $adminevents.= "<a href=\"$targetpage?page=1\">  1  </a>"; 
                $adminevents.= "<a href=\"$targetpage?page=2\">  2  </a>"; 
                $adminevents.= "..."; 
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) 
                { 
                    if ($counter == $page) 
                        $adminevents.= "<span class=\"current\">  $counter  </span>"; 
                    else 
                        $adminevents.= "<a href=\"$targetpage?page=$counter\">  $counter  </a>";                    
                } 
            } 
        } 
         
        //next button 
        if ($page < $counter - 1)  
            $adminevents.= "<a href=\"$targetpage?page=$next\">      Next »</a>"; 
        else 
            $adminevents.= "<span class=\"disabled\">      Next »</span>"; 
        $adminevents.= "</p></div>\n";         
    } 
    ?>

      <?php
			$count=0;
			if (mysql_num_rows($result) > 0) {
				while($row = mysql_fetch_row($result)) {
					if($count == 0)
					{
						echo '<div class="wid980 hgt25"><p class="bold font20 fontOrange"><a href="admindisplay.php?event_id=' . $row[0] . '">' .$row[2] .'</a></p></div>';
						echo "<div class='wid980 hgt25'><p class='font15 fontColor'>" . $row[1] . "</p></div>";
						if(strlen($row[3]) > 100){
							echo "<div class='wid980'><p class='font10 fontColor'>" . substr ( $row[3] , 0 , 100 ) . " .... </p></div>";
						}
						else {
							echo "<div class='wid980 '><p class='font10 fontColor'>" . $row[3] . "</p></div>";
						}
					}
                                
					else
					{
						echo "<hr style='background:LIGHTGREY;'>";
						echo '<div class="wid980 hgt25"><p class="bold font20 fontOrange"><a href="admindisplay.php?event_id=' . $row[0] . '">' .$row[2] .'</a></p></div>';
						//echo "<td>" . $row[1] . "</td>";
						echo "<div class='wid980 hgt25'><p class='font15 fontColor'>" . $row[1] . "</p></div>";
						if(strlen($row[3]) > 100){
							echo "<div class='wid980'><p class='font10 fontColor'>" . substr ( $row[3] , 0 , 100 ) . " .... </p></div>";
						}
						else {
							echo "<div class='wid980 '><p class='font10 fontColor'>" . $row[3] . "</p></div>";
						}
					}
                     $count++;
				}
			}
		  ?>
      <?php
                      echo $adminevents 
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
