<?php
	include("../controller/controller.php");

 	$ans=$request['ans'];
 	$queid=$request['que_id'];
 	$sql="select * from questions where answer='$ans' and id='$queid'";
	
$ex=mysql_query($sql);
$count=mysql_num_rows($ex);

if($count>0)
{
	echo 1;
}
else
{
	echo 0;
}

?>