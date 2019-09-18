<html>
<head>
<link href="./ts_query/newquery/querypost.css" rel="stylesheet">
<link href="jquery.js">
<script src="jquery.js">
</script>
<script>
function fanc(beta){
			$("#dela").load("./ts_query/newquery/del.php",{
				idp: beta
			});
			return true;
		}
</script>

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
      <img src="./ts_query/newquery/dropArrow.png">
      <div class="drop">
        <a href="logout.php">Sign Out</a>
        <a href="../login/loginpage.php?reque=4111">Contact Office</a>
      </div>
    </div>
<p class="titlep">My Queries</p>
<div class="new">
  <button type="button" onclick="location.href='../login/loginpage.php?requ=3111'"> <!--onclick location.href-->Create Query</button>
</div>

<?php

 $mysql_host='localhost';
	  $mysql_user='abhishek';
	  $mysql_password='1234567890';
	  $mysql_db='tsquery';
	  
	  $mysql_connect=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);
	  
	     $user=$_SESSION['user_name'];
	  
	  if (@mysqli_connect_errno()) {
         printf("Connect failed: %s\n", mysqli_connect_error());
	    }else{
	       $sql="SELECT `queryid`, `title`, `query`, `askedfrom`, `askedby`, `datetime`, `reply` FROM `query` WHERE `askedby` = $user";
	       $sqlrun=mysqli_query($mysql_connect,$sql);
		   while($res=mysqli_fetch_assoc($sqlrun)){
	?>


  <a href="./loginpage.php?requ=3112&&id=<?php echo $res['queryid'];?>"><div class="inpost">
		<p class="title"><?php echo stripslashes($res['title']); ?></p>
		<p class="date"> <?php echo $res['datetime']; ?></p>
		<p class="desc"><?php echo stripslashes($res['query']); ?> </p>
		<p class="by">Sent to:<?php echo $res['askedfrom'];?></p>
    <div class="options">
      <a class="delete" href="" onclick="return fanc(<?php echo $res['queryid']; ?>);" id='dela'>Delete Query</a>
</div>
<div class="dlink">
</div>
</div>
</a>
<br>
<br>
<?php
		}}
?>
</body>
</html>
