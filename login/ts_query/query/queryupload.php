<?php


      $mysql_host='localhost';
	  $mysql_user='abhishek';
	  $mysql_password='1234567890';
	  $mysql_db='tsquery';
	  
	  $mysql_connect=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);
	  
	  $teach=mysqli_real_escape_string($mysql_connect,$_POST['teachera']);
      $title=mysqli_real_escape_string($mysql_connect,$_POST['titlea']);
      $text=mysqli_real_escape_string($mysql_connect,$_POST['texta']);
	  $user=$_POST['user'];
	  if (@mysqli_connect_errno()) {
         printf("Connect failed: %s\n", mysqli_connect_error());
	    }else{
			
        $mysql="INSERT INTO `query`(`title`, `query`, `askedfrom`, `askedby`, `datetime`) VALUES (?,?,?,?,NOW())";			
		 $stmt=mysqli_stmt_init($mysql_connect);
         if(mysqli_stmt_prepare($stmt,$mysql)){
		    mysqli_stmt_bind_param($stmt,"ssss",$title,$text,$teach,$user);
		    mysqli_stmt_execute($stmt);
			echo 'success';
		 }else{
			 echo 'wrong';
		 }		 
		}
?>