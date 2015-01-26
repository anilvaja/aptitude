<?php
session_start();

	include("../controller/controller.php");

	if(isset($_REQUEST['submit']))
	{
		$num=$_REQUEST['total'];
		$usr=$_SESSION['uname'];
		$sql_usr="select * from student_login where email='$usr'";
		$ex_sel=mysql_query($sql_usr);
		
		$res=mysql_fetch_array($ex_sel);
		
		$user=$res[0];
		$scor=0;
		for($i=1;$i<=$num;$i++)
		{
			if($_REQUEST["score$i"]==1)
			{
				$scor=$scor+1;
			}
		}
		
		$ins="insert into scorcard values (NULL,'$user','$scor')";
		//echo $ins;
		//die;
		$ex=mysql_query($ins);
		
		if($ex)
		{
			header("location:score_card.php");
		}
		else
		{
			echo "please try agian...";
		}
	}
?>

