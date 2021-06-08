<?php
if(isset($_GET['vkey']))
{
	$vkey=$_GET['vkey'];
 $mysqli=new MySQLi('localhost','root','','sportsarena');
 $resultset = $mysqli->query("Select vkey,verified from admin where  vkey ='$vkey' and verified=0  limit 1 ");
 if($resultset->num_rows==1)
 {
 	$update=$mysqli->query("update admin set verified=1 where vkey = '$vkey' limit 1");
 	if($update)
 		{
 			echo "your account has been verified you may now login";

 		}
 		else
 		{
 			echo $mysqli->error;
 		}

 }
 else
 {
 	echo "This account is invalid or already verified";
 }
}
else
{
	die("Something went wrong");
}

?>
<html>
<head>
	<link >
</head>
<body>
	<center>
		
	</center>
</body>
</html>
