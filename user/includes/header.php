<header id="header" style="position:fixed; z-index:1">
		<hgroup>
			<h1 class="site_title"><a href="../include/index.html">
			<?php 
				if(isset($_SESSION['uname']))
					echo $_SESSION['uname'];
				else
					echo "Welcome";
				?></a></h1>
			<h2 class="section_title">ANIL VAJA SITES</h2>
		</hgroup>
	</header>