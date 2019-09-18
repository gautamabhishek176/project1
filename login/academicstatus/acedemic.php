<?php
$db='batch_'.$_SESSION['batch'].'_'.$_SESSION['branch'];

?>
<html>
<head>
  <link href="./academicstatus/query.css" rel="stylesheet">
  <link href="./academicstatus/jquery.js">
  <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}
</style>
<script src="./academicstatus/jquery.js">
</script>

<script>
$(document).ready(function(){

 $('#work').click(function(){
    var tablename=$('#op').val();
	if(tablename!=''){
	 $.ajax({
		 
		 type:'post',
		 url:'./academicstatus/getdata.php',
		 data:{
			 table:tablename,
			 user:<?php echo $_SESSION['user_name']; ?>,
			 db: '<?php echo $db; ?>'
		 },success: function(response){
			 $('#result').html(response);
		 }
		 
	 });
	 
	}else{
	}
	
 });
	
});
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
      <img src="./academicstatus/dropArrow.png">
      <div class="drop">
        <a href="logout.php">Sign Out</a>
        <a href="../login/loginpage.php?reque=4111">Contact Office</a>
      </div>
    </div>
	<p> data available :</p>
	<select id="op">
	<option value="">select</option>
	<?php 
	
	
	
	$mysql_host='localhost';
    $mysql_user='abhishek';
    $mysql_password='1234567890';
    $mysql_db=$db;
	
		  $mysql_connect=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);
	  	  if (@mysqli_connect_errno()) {
         printf("Connect failed: %s\n", mysqli_connect_error());
	    }else{
			
		$my_sql="SELECT  `table_id`, `tablename`, `purpose`, `sem`, `month` FROM `$db` ";
			$stmt=mysqli_stmt_init($mysql_connect); 				 // sql work started
				 if(mysqli_stmt_prepare($stmt,$my_sql)){
					 mysqli_stmt_execute($stmt);
					 $res=mysqli_stmt_get_result($stmt);
					 $res1=mysqli_fetch_assoc($res);
					 while($res1=mysqli_fetch_assoc($res)){
						if($res1['purpose']=='studata'){
							
						}else{
							?>
                         
                     
	               <option value='<?php echo $res1['tablename']; ?>'><?php echo $res1['tablename']; ?></option><br>
	               
				   

						<?php
						}
						
						 
					 }
		}
	
		}
	
	?>
</select>
<button id="work">FETCH</button>
<center><div><label id="result"> </label><div></center>
	
    </body>
    </html>