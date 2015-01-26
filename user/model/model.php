<?php	
	class model
	{
		public function __construct()
		{
			
			
			/*
				Root User: adminx2nuDjQ
			   	Root Password: xuqMr1qnuXIq
			   	Database Name: aptitude
			*/
			$request=$_REQUEST;
			$server="localhost";
			$username="u257261439_anil";
			$password="";
			$database="mysql_db";
			
			$conn=mysql_connect("$server","$username","$password");
			if($conn)
			{
			//	echo "Connected successfully<br>";
			}
			else
			{
				echo "<br>Error".mysql_error();
			}
			
			
			$db=mysql_select_db("$database");
			if($db)
			{
				//echo "<br>Database selected successfully<br>";
			}
			else
			{
				echo "<br>Error".mysql_error();
			}
		}
		
		public function select($table,$whr)
		{
			$wher="";
			$cnt=count($whr);
			$i=1;
				foreach($whr as $key=>$val)
				{
					$i++;
					$wher=$wher.$key." = '".$val."'";
					if($cnt==$i)
					{	
						$wher=$wher." and ";
					}
				}
			$sql="select * from $table where $wher";
			
			//echo $sql;
			//die;
			$ex=mysql_query($sql);
			
			$cnt=mysql_num_rows($ex);
			if($cnt>0)
			{
				$res=mysql_fetch_assoc($ex);
				$_SESSION['uname']=$res['email'];
				$_SESSION['pass']=$res['password'];
				
				echo "Login successfully";
				header("refresh:2;home.php");
			}
			else
			{
				die("wrong username or password...........");
		//		header("refresh:2;index.php");
			}
		}
		
		
		public function insert($table,$data)
		{
			echo "<br>";
			$v="";
			$k="";
			foreach($data as $keys=>$values)
			{
				//$k.=$keys;
				
				if($keys=="status")
				{
					$k.=$keys;
				}
				else
				{
					$k.=$keys.",";
				}
				
				if($values=="active" || $values=="inactive")
				{
					$v.="'".$values."'";
				}
				else
				{
					$v.="'".$values."',";
				}
			}
			print_r($k);
			echo "<br>";
			print_r($v);
			echo "<br>";
			
			$sql="insert into $table ($k) values ($v)";
			//echo $sql;
			$ex=mysql_query($sql);
			if($ex)
				echo "inserted successfully";
			else
				echo mysql_error();
		}
		
		public function select_all($table)
		{
			$ex=mysql_query("select * from $table");
			while($res=mysql_fetch_array($ex))
			{
				$sel_all[]=$res;
			}
			return $sel_all;
			/*echo "<pre>";
			print_r($sel_all);
			echo "</pre>";
			die;*/
		}
	}
?>