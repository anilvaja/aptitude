<?php
	session_start();
	session_destroy();
	echo "you logged Out Successfully...";
	header("refresh:1;login.php");
?>