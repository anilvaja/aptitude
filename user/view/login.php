
<?php 
	session_start();
	include("../controller/controller.php");
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard I Admin Panel</title>
	
	<link rel="stylesheet" href="../css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="../js/hideshow.js" type="text/javascript"></script>
	<script src="../js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>



</head>
<body>
	<?php
		include("../includes/header.php");
    ?>
     <!-- end of header bar -->
	<section id="secondary_bar">
		<div class="user">
			<p>John Doe (<a href="#">3 Messages</a>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->
	<?php
    	//include("../includes/sidebar.php");
	?>
    <!-- end of sidebar -->
	<section id="" class="column" style="margin-top:5%; width:30%; margin-left:35%;">
		
        <h4 class="alert_info"><p class="overview_type" id="result"></p>
        </h4>
        <article class="module width_full"  >
        
			<header><h3>Login</h3></header>
			<div class="module_content" >
            	
            
            	<article class="stats_graph" style="" >
                	<form method="get"   >
						<div class="overview_today" >
                    <table align="center" style="padding-left:17%;" >
                    	<tr>
                        <td>
                    User Name :</td>
                    <td>
                    <input type="text" name="uname" placeholder="User Name" /><br></td>
                        </tr>
                        
                        <tr>
                    	<td>Password :</td>
                    	<td>
                    		<input type="text" name="pass" placeholder="Password" /><br>
                        </td>
                    </tr>
                    
                    <tr>
                    	<td colspan="2" align="center">
                        	<input type="submit" name="login_stud" value="Login Me" class="alt_btn">
                        </td>
                    </tr>
                    
                    </table>
                </div>
               		</form>
				</article>
                
				
                
                
                
				<div class="clear">
                </div>
			</div>
		</article>
        
	</section>


</body>

</html>