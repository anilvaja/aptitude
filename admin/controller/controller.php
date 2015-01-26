<?php
	include("../model/model.php");
	$objcon=new model();
	$request=$_REQUEST;
	
	$sel_al=$objcon->select_all("questions");
	$sel_usr=$objcon->select_all("student_login");
	
	if(isset($request['login']))
	{
		$unm=$request['username'];
		$pass=$request['password'];
		$table="login";
		$whr=array("email"=>"$unm","password"=>"$pass");
		$objcon->select($table,$whr);
	}
	
	if(isset($request['AddQue']))
	{
		$table="questions";
		$que=$request['que'];
		$a=$request['A'];
		$b=$request['B'];
		$c=$request['C'];
		$d=$request['D'];
		$e=$request['E'];
		$ans=$request['answer'];
		$sol=$request['solution'];
		$status="active";
		
		$data=array("question"=>"$que","choice_A"=>"$a","choice_B"=>"$b","choice_C"=>"$c","choice_D"=>"$d","choice_E"=>"$e","answer"=>"$ans","solution"=>"$sol","status"=>"$status");
		$objcon->insert($table,$data);
	}


	if(isset($request['AddUser']))
	{
		
		$table="student_login";
		$fn=$request['fn'];
		$pass=$request['pass'];
		$status=$request['status'];
		
		$data=array("email"=>"$fn","password"=>"$pass","status"=>"$status");
		$objcon->insert($table,$data);
	}
	
?>