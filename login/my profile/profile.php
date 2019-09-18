

<?php

   $db='batch_'.$_SESSION['batch'].'_'.$_SESSION['branch'];
 $mysql_host='localhost';
	  $mysql_user='abhishek';
	  $mysql_password='1234567890';
	  $mysql_db=$db;
	  $tb='studata_'.$_SESSION['branch'].'_'.$_SESSION['batch'];
	  
	  $mysql_connect=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);
	  	  if (@mysqli_connect_errno()) {
         printf("Connect failed: %s\n", mysqli_connect_error());
	    }else{
			
				$my_sql="SELECT `phoneno` FROM `$tb` WHERE `rollno` = ".$_SESSION['user_name'];
				$stmt=mysqli_stmt_init($mysql_connect); 				 // sql work started
				 if(mysqli_stmt_prepare($stmt,$my_sql)){
					 mysqli_stmt_execute($stmt);
					 $res=mysqli_stmt_get_result($stmt);
					 $res1=mysqli_fetch_assoc($res);
				 }
			
			
		}

?>



<html>
<head>
  <link href="./my profile/profile.css" rel="stylesheet">
</head>
<body>
  <div class="bar">
  <p> University Institute Of Information Technology</p>
  <div class="nav">
        <a href="../login/loginpage.php">Home</a>
        <a href="../login/loginpage.php?reques=5113">My Profile</a>
        <a href="../login/loginpage.php?reques=5112">About</a>
      </div>
    </div>
      <div class="dropdown">
      <img src="./my profile/dropArrow.png">
      <div class="drop">
        <a href="logout.php">Sign Out</a>
        <a href="../login/loginpage.php?reque=4111">Contact Office</a>
      </div>
    </div>
    <div class="top">
    <img src="./my profile/profile.png">
  </div>
  <div class="name">
    <p><?php echo $_SESSION['name']; ?></p>
  </div>
  <div class="up"></div>
  <p class="about">About</p>
  <div class="data">
    <p> Phone Number</p>
    <p> Username/Roll Number: </p>
    <p>Batch</p>
  </div>
  <div class="data2">
    <p class="phone"><?php echo $res1['phoneno']; ?></p>
    <p class="Username"><?php echo $_SESSION['user_name']; ?></p>
    <p class="Batch"><?php echo $_SESSION['batch'].','.$_SESSION['branch']; ?></p>
  </div>
  <div class="down"></div>

    </body>
    </html>
