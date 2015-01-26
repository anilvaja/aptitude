<?php
	include("../model/model.php");
	$objcon=new model();
	$request=$_REQUEST;
	
	$sel_al=$objcon->select_all("questions");
	
	if(isset($request['login']))
	{
		$unm=$request['username'];
		$pass=$request['password'];
		$table="login";
		$whr=array("email"=>"$unm","password"=>"$pass"/*,"status"=>"active"*/);
		$objcon->select($table,$whr);
	}
	
	
	if(isset($request['login_stud']))
	{
		$unm=$request['uname'];
		$pass=$request['pass'];
		$table="student_login";
		$whr=array("email"=>"$unm","password"=>"$pass"/*,"status"=>"active"*/);
		$objcon->select($table,$whr);
	}
	
	if(isset($request['AddQue']))
	{
		echo	$que=$request['que'];
		$a=$request['A'];
		$b=$request['B'];
		$c=$request['C'];
		$d=$request['D'];
		$e=$request['E'];
		$ans=$request['answer'];
		$sol=$request['solution'];
		$status="active";
	
		$table="questions";
		$data=array("question"=>"$que","choice_A"=>"$a","choice_B"=>"$b","choice_C"=>"$c","choice_D"=>"$d","choice_E"=>"$e","answer"=>"$ans","solution"=>"$sol","status"=>"$status");
		$objcon->insert($table,$dat);
	}
?>