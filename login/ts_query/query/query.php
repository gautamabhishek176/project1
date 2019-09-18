<html>
<head>
  <link href="./ts_query/query/query.css" rel="stylesheet">
  <link href='jquery.js'>
  <script src='jquery.js'></script>
  <script>
  $(document).ready(function(){
	  $('#op,#title,#text').on('change',function(){
		  $('#t-label').css({'visibility':'hidden'});
		  $('#title-label').css({'visibility':'hidden'});
		  $('#text-label').css({'visibility':'hidden'});
	  });
  });
  
 function onsub(){
	    var teacher=$('#op').val();
		if(teacher!=''){
		  var title=$('#title').val();
            if(title!=''){
				var text=$('#text').val();
				if(text!=''){
					$.ajax({
						type:'post',
						url:'./ts_query/query/queryupload.php',
						data:{
						 teachera:teacher,
						 titlea:title,
						 texta:text,
						 user:<?php echo $_SESSION['user_name']; ?>
						},success: function(response){
						  if(response=='success'){
							$('#op').prop('disabled',true);
							$('#title').prop('disabled',true);
							$('#text').prop('disabled',true);
							$('#sub').prop('disabled',true);
							$('#result').text('query sent: to send another please refresh the page');
		                    $('#result').css({'visibility':'visible','color':'red'});	
							  
						  }else{
							  $('#result').text('something went wrong');
		                      $('#result').css({'visibility':'visible','color':'red'});	
						  }	
						}
						
					});
				}else{
					$('#text-label').text('Please fill');
		            $('#text-label').css({'visibility':'visible','color':'red'});	
				}
			}else{
			  $('#title-label').text('Please fill');
		      $('#title-label').css({'visibility':'visible','color':'red'});		
			}		  
		}else{
		   $('#t-label').text('Please fill');
		   $('#t-label').css({'visibility':'visible','color':'red'});	
		}
	  return false;
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
      <img src="./ts_query/query/dropArrow.png">
      <div class="drop">
        <a href="logout.php">Sign Out</a>
        <a href="../login/loginpage.php?reque=4111">Contact Office</a>
      </div>
    </div>
    <p class="title"><u> Ask Your Query </u></p>
    <input type="button" class="myq" value="My Queries" onclick="location.href='./loginpage.php?requ=3113'"> <!--onclick="window.location.href=''"-->
    <div class="form">
    <form method="post" action="#" onsubmit="return onsub();">
	
	<?php
	  $mysql_host='localhost';
	  $mysql_user='abhishek';
	  $mysql_password='1234567890';
	  $mysql_db='users';
	  
	  $mysql_connect=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);
	  
	  
	  if (@mysqli_connect_errno()) {
         printf("Connect failed: %s\n", mysqli_connect_error());
	    }else{
	       $sql="SELECT `user_name_t`, `teach_name` FROM `teac_user`";
	       $sqlrun=mysqli_query($mysql_connect,$sql);
	?>
    <b>Which teacher you wanna ask Question?</b><br>
    <div><select id='op'>
	<option value="">select-teacher</option>
	  <?php   
	    while($res=mysqli_fetch_assoc($sqlrun)){  
	  ?>
      <option value="<?php echo $res['user_name_t'];?>"> <?php echo $res['teach_name'];?> </option>
		<?php } ?>
    </select><label id='t-label'></label></div>
    
	<?php 
		}
	?>
	
	<br>
	<br>
    <b>Mention Your Topic:</b><br>
   <div><input type="text" name="title" id='title'><label id='title-label'></label></div><br>
    <br>
    <b>Enter Your Question:</b><br>
    <div><textarea rows="15" cols="70" id='text' style='resize:none;'></textarea><label id='text-label'></label></div>
    <br><input type="submit" value="submit" id="sub">
    <div><label id='result'></label></div>
  </form>
  
  </div>
    </body>
    </html>
