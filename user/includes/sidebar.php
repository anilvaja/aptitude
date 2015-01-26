<?php
?>
<aside id="sidebar" class="column" style="position:fixed; margin-top:3%;">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Content</h3>
		<ul class="toggle">
        <?php
		
			if(!isset($_SESSION['uname']))
			{
			?>
            
       		<li class="icn_new_article"><a href="login.php">Login</a></li>
            <?php
			}
			else
			{
			?>
       			<li class="icn_new_article"><a href="logout.php">Logout</a></li>
            <?php
			}
			?>
       		<li class="icn_edit_article"><a href="questions.php">Question</a></li>
			<li class="icn_categories"><a href="score_card.php">my score card..</a></li>
		</ul>
        
		
		<footer style="margin-top:80%;">
			<hr />
			<p><strong>Copyright &copy; 2015 Website ANIL</strong></p>
		</footer>
	</aside>