<?php 
	session_start();
	if(!isset($_SESSION['uname']))
	{
		echo "please login first";
		header("refresh:1;login.php");
	}
	else
	{
	include("../controller/controller.php");
	
	$sql="select *,email from scorcard join student_login on student_login.id=scorcard.user_id where email='".$_SESSION['uname']."'" ;
	$ex=mysql_query($sql);
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
    	include("../includes/sidebar.php");
	?>
    <!-- end of sidebar -->
	<section id="main" class="column" style="margin-top:2%; margin-left:23%;">
        <h4 class="alert_info">Welcome  <?php echo $_SESSION['uname']; ?>
        <p class="overview_type" id="result"></p>
        </h4>
        <article class="module width_full">
        
			<header><h3>Weclome to <?php echo $_SESSION['uname']; ?> profile</h3></header>
			<div class="module_content">
            	
            
            	<article class="stats_graph">
                	
       <article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Content Manager</h3>
		
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content" style="display: block;">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th class="header">Triel</th>
   					<th class="header">User Name</th> 
    				<th class="header">Score</th>  
				</tr> 
			</thead> 
			<tbody> 
            	<?php 
					while($res=mysql_fetch_array($ex))
					{
				?>
				<tr>  
    				<td><?php echo $res[0]; ?></td> 
    				<td><?php echo $res["email"]; ?></td> 
    				<td><?php echo $res["scors"]; ?></td> 
    				
				</tr>
                <?php
					}
				?> 
				
				 
				
				  
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
			<div id="tab2" class="tab_content" style="display: none;">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th class="header"></th> 
    				<th class="header">Comment</th> 
    				<th class="header">Posted by</th> 
    				<th class="header">Posted On</th> 
    				<th class="header">Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>Lorem Ipsum Dolor Sit Amet</td> 
    				<td>Mark Corrigan</td> 
    				<td>5th April 2011</td> 
    				<td><input type="image" src="../images/icn_edit.png" title="Edit"><input type="image" src="../images/icn_trash.png" title="Trash"></td> 
				</tr> 
				
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>Sit Amet Dolor Ipsum</td> 
    				<td>Super Hans</td> 
    				<td>10th April 2011</td> 
    				<td><input type="image" src="../images/icn_edit.png" title="Edit"><input type="image" src="../images/icn_trash.png" title="Trash"></td> 
				</tr> 
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>Dolor Lorem Amet</td> 
    				<td>Alan Johnson</td> 
    				<td>16th April 2011</td> 
   				 	<td><input type="image" src="../images/icn_edit.png" title="Edit"><input type="image" src="../images/icn_trash.png" title="Trash"></td> 
				</tr> 
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>Dolor Lorem Amet</td> 
    				<td>Dobby</td> 
    				<td>16th April 2011</td> 
   				 	<td><input type="image" src="../images/icn_edit.png" title="Edit"><input type="image" src="../images/icn_trash.png" title="Trash"></td> 
				</tr> 
			</tbody> 
			</table>

			</div><!-- end of #tab2 -->
			
		</div><!-- end of .tab_container -->
		
		</article>		</article>
                
				
                
                
                
				<div class="clear">
                </div>
			</div>
		</article>
        
	</section>


</body>

</html>
<?php
	}
?>