<?php
 $id=$_GET['id'];
$mysql_host='localhost';
$mysql_user='abhishek';
$mysql_password='1234567890';
$mysql_db='office';
   $mysql_connect=@mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);

$my_sql='SELECT `appid`, `to_`, `sub`, `apppart`, `sendby`, `date_` FROM `application` WHERE `appid`=?';
				$stmt=mysqli_stmt_init($mysql_connect); 				 // sql work started
				 if(mysqli_stmt_prepare($stmt,$my_sql)){
					mysqli_stmt_bind_param($stmt,"i",$id);
					 mysqli_stmt_execute($stmt);
					 $res=mysqli_stmt_get_result($stmt);
					 $res1= mysqli_fetch_assoc($res);
					 $main=$res1['apppart'];
		
                     $main= str_replace( array('\r\n','\n\r','\n','\r'), '<br>' , $main );
					 
					 
                     //echo $main;
					 require('pdf/fpdf.php');
                    
					 $pdf=new FPDF();
					 $pdf->AddPage();
					 $pdf->SetFont("Arial","B",16);
					 $pdf->Cell(0,10,"application",1,1,'C');
					 $pdf->Cell(0,10,"To:  {$res1['to_']}",1,1);
					 $pdf->Cell(0,10,"Date:  {$res1['date_']}",1,1);
					 $pdf->Cell(0,10,"Subject:  {$res1['sub']}",1,1);
					 $pdf->ln();
				     $pdf->MultiCell(0,10,$main,1);
					  
					 $pdf->output();
				 }else{
					 
					 
				 }


?>