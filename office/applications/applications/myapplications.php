<html>
<head>
  <link href="./applications/applications.css" rel="stylesheet">
</head>
<body>
  <div class="bar">
  <p> University Institute Of Information Technology</p>
  <div class="nav">
        <a href="./main.php">Home</a>
        <a href="#">About</a>
      </div>
    </div>
      <div class="dropdown">
      <img src="./applications/dropArrow.png">
      <div class="drop">
        <a href="logout.php">Sign Out</a>
      </div>
    </div>
    <p class="title"> My Applications</p>
    <div class="bar2"></div>
    <br><br>
    <?php
	$mysql_host='localhost';
	  $mysql_user='abhishek';
	  $mysql_password='1234567890';
	  $mysql_db='office';
	  $mysql_connect=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);
	  	  if (@mysqli_connect_errno()) {
         printf("Connect failed: %s\n", mysqli_connect_error());
	    }else{
			
				$my_sql="SELECT `appid`, `to_`, `sub`, `apppart`, `sendby`, `date_` FROM `application` ORDER BY `appid` DESC LIMIT 10";
				$stmt=mysqli_stmt_init($mysql_connect); 				 // sql work started
				 if(mysqli_stmt_prepare($stmt,$my_sql)){
					 mysqli_stmt_execute($stmt);
					 $res=mysqli_stmt_get_result($stmt);
					while( $res1=mysqli_fetch_assoc($res)){
				 
	?>
	<div class="noti">
      <p class="titlee"> Title</p>
      <p><?php echo $res1['sub']; ?></p>
        <p class="sent"> Sent by:<?php echo $res1['sendby']; ?></p>
        <p class="date"><?php echo $res1['date_']; ?></p>
          <div class="dlink">
       <a class="delete" href="?request=1115&&id=<?php echo $res1['appid']; ?>" target="_blank">Click to open</a>
       </div>
        </div>
		
		<?php
		
		
		
		}
		
		}}
		?>
    </body>
    </html>
