<?php
$table=$_POST['table'];
$db=$_POST['db'];
$user=$_POST['user'];



$mysql_host='localhost';
	  $mysql_user='abhishek';
	  $mysql_password='1234567890';
	  $mysql_db=$db;
	  
	  $mysql_connect=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);
	  	  if (@mysqli_connect_errno()) {
         printf("Connect failed: %s\n", mysqli_connect_error());
	    }else{
			
				$my_sql="SELECT * FROM `$table` WHERE `rollno`=$user";
				$stmt=mysqli_stmt_init($mysql_connect); 				 // sql work started
				 if(mysqli_stmt_prepare($stmt,$my_sql)){
					 mysqli_stmt_execute($stmt);
					 $res=mysqli_stmt_get_result($stmt);
					 $res1=mysqli_fetch_assoc($res);
					 //print_r($res1);
		            echo "<table><tr><th>sub1</th><th>sub2</th><th>sub3</th><th>sub4</th></tr>
					<tr><td>".$res1['sub1']."</td><td>".$res1['sub2']."</td><td>".$res1['sub2']."</td><td>".$res1['sub2']."</td></tr></table>";
				 }
			
		}
?>