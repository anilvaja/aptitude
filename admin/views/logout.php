<?php
	session_start();
	session_destroy();
	echo "you logged Out Successfully... wait for 5 seconds...";
	header("refresh:1;login.php");
?>