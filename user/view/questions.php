
<?php
	session_start();
	if(!isset($_SESSION['uname']))
	{
		echo "please login first";
		header("refresh:1;login.php");
	}
	else
	{
		
		include("../controller/controller.php"); ?>
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

<script language="javascript">
	function scor(a,b)
	{
	//	alert(c);
		
		//alert(a);
		//alert(b);
	//	alert(b);
		
	    xmlhttp=new XMLHttpRequest();
		//var scor=a;
		xmlhttp.open("GET","varify.php?ans="+a+"&que_id="+b,true);
	  	xmlhttp.send();
			var i=b
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("score"+b).value=xmlhttp.responseText;
			}
	}
		
	}
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
		<form method="post" action="result.php">
		<h4 class="alert_info">Welcome <?php echo $_SESSION['uname'];?>
        <p class="overview_type" id="result"></p>
</h4>
		<?php
		$i=1;
			foreach($sel_al as $res) 
			{
		?>
	  <article class="module width_full">
			<header><h3>Question :  <?php echo $i; ?></h3></header>
			<div class="module_content">
            	<article class="stats_graph">
					<input type="hidden" value="<?php echo $res['0']; ?>"  readonly id="<?php echo $res['0']; ?>" >
					<?php echo $res['0']." ) ".$res['1']; ?>
				</article>
            
            	<article class="stats_graph">
					
        			<div class="answers">
                    	<input type="radio"  name="que<?php  echo $res['0']; ?>"  value="choice_A" onClick="scor(this.value,document.getElementById('<?php echo $res['0']; ?>').value)" /><?php echo $res['2'];  ?></div>

        			<div class="answers"><input type="radio" name="que<?php  echo $res['0']; ?>"  value="choice_B" onClick="scor(this.value,document.getElementById('<?php echo $res['0']; ?>').value)"/><?php echo $res['3'];  ?></div>

					<div class="answers"><input type="radio" name="que<?php  echo $res['0']; ?>"  onClick="scor(this.value,document.getElementById('<?php echo $res['0']; ?>').value)" value="choice_C" /><?php echo $res['4'];  ?></div>

					<div class="answers"><input type="radio" name="que<?php  echo $res['0']; ?>" onClick="scor(this.value,document.getElementById('<?php echo $res['0']; ?>').value)" value="choice_D" /><?php echo $res['5'];  ?></div>

					<div class="answers"><input type="radio" name="que<?php  echo $res['0']; ?>" value="choice_E"onClick="scor(this.value,document.getElementById('<?php echo $res['0']; ?>').value)"/><?php if(!$res['6']=="")
					

														echo $res['6']; 
															else
																echo "None of above";
														?></div>
				</article>
                
				<article class="stats_overview" style="display:none;">
					<div class="overview_today">
						<p class="overview_day">   
                             <input type="hidden" readonly value="" name="score<?php echo $res['0']; ?>" id="score<?php echo $res['0']; ?>">
</p>
						</div>
					
				</article>
                <article class="stats_overview"  style="display:;">
					<div class="overview_today">
						<p class="overview_day">Answer</p>
						<p class="overview_type"><?php echo $res['7'];  ?></p>
					</div>
					
				</article>
                
                <article class="stats_overview"  style="display:none;">
					<div class="overview_today">
						<p class="overview_day">Solution</p>
						<p class="overview_type"><?php echo $res['8'];  ?></p>
					</div>
					
				</article>
				<div class="clear">
                </div>
			</div>
		</article><!-- end of stats article --><!-- end of content manager article --><!-- end of messages article -->
		<?php
        	$i++; 
			}
		?>
        <footer>
				<div class="submit_link" style="margin-left:0px;">
                <input type="text" name="total" readonly value="<?php
						echo $i-1;
					?>">
					<input type="submit" name="submit" value="Submit Answers" class="alt_btn" >
				</div>
			</footer>
	  <!-- end of post new article --><!-- end of styles article -->
	  </form>
	</section>


</body>

</html>
<?php
	}
?>