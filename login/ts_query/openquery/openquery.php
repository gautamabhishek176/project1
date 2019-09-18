<html>
<head>
<link href="./ts_query/openquery/openquery.css?ts=<?=time()?>" rel="stylesheet">
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
      <img src="./ts_query/openquery/dropArrow.png">
      <div class="drop">
        <a href="logout.php">Sign Out</a>
        <a href="../login/loginpage.php?reque=4111">Contact Office</a>
      </div>
    </div>
    <input type="button" class="myq" value="My Queries" onclick="location.href='../login/loginpage.php?requ=3113'"> <!--onclick="window.location.href=''"-->
<?php
  $id=$_GET['id'];
 $mysql_host='localhost';
	  $mysql_user='abhishek';
	  $mysql_password='1234567890';
	  $mysql_db='tsquery';
	  
	  $mysql_connect=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);
	  
	     $user=$_SESSION['user_name'];
	  
	  if (@mysqli_connect_errno()) {
         printf("Connect failed: %s\n", mysqli_connect_error());
	    }else{
	       $sql="SELECT `queryid`, `title`, `query`, `askedfrom`, `askedby`, `datetime`, `reply` FROM `query` WHERE  `queryid`=".$id." AND `askedby`= $user";
	       $sqlrun=mysqli_query($mysql_connect,$sql);
		   $res=mysqli_fetch_assoc($sqlrun);
		   if($res){
	?>
<div class="inpost">
		<p class="title"><?php echo stripslashes($res['title']); ?></p>
		<p class="by"> Sent To:<?php echo $res['askedfrom'];?> </p>
		<p class="date"><?php echo $res['datetime']; ?></p>
		<p class="desc"><?php echo stripslashes($res['query']); ?> </p>
    <div class="options">
      <a class="delete" href="../login/loginpage.php?requ=3113" onclick="return fanc(<?php echo $res['queryid']; ?>);" id='dela'>Delete Query</a>
</div>

<?php
if($res['reply']){
 $sql1="SELECT `queryreplyid`, `queryid`, `content`, `datetime` FROM `queryreply` WHERE `queryid`=".$id;
	       $sqlrun1=mysqli_query($mysql_connect,$sql1);
		   $res1=mysqli_fetch_assoc($sqlrun1);	

?> 
<div class="comments">
  <p><?php echo stripslashes($res1['content']); ?> </p>
  <span class="min">Replied By :<?php echo $res['askedfrom'];?></span>
  <span class="min"><?php echo $res1['datetime']; ?></span>
</div>
<?php
    }else{
	?>
  <div class="comments">
  <p>No replies yet</p>
  <span class="min"></span>
  <span class="min"></span>
  </div>
	
	
	<?php	
		


		}
		   }else{
			   ?><p>url not found<p><?php
		   }
		}
		
		
		
  ?>

</body>
</html>
