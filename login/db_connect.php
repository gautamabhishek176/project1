<?php
$mysql_host='localhost';
$mysql_user='abhishek';
$mysql_password='1234567890';
$mysql_database='registration';
$mysql_connect=@mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database);


if (@mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
	}



?>