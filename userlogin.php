<?php
$error=null;
session_start();
// if(isset($_SESSION['email_id']))
// {

// }
if(isset($_POST['submit']))
{
	 $mysqli=new MySQLi('localhost','root','','sportsarena');
	  $email_id=$_POST['email_id'];
	   $password=$_POST['password'];
	   $password=md5($password);
	   //query the database to check if password and email are correct
	   $resultset = $mysqli->query("select * from registration where email='$email_id' and password='$password' limit 1");
	   if($resultset->num_rows != 0)
	   	{
	   		//Process login ie to check if the account is verified
	   		$row = $resultset->fetch_assoc();
			$verified=$row['verified'];
			$username=$row['username'];   
	   		$email=$row['email'];
	   		$date = $row['createdate'];
	   		$date=strtotime($date);
	   		$date = date('M d Y',$date);

	   		if($verified == 1)
	   		{
	   			//continue processing
				 $_SESSION['email_id']=$email_id;
				 $_SESSION['name']=$username;
				 $_SESSION['login_user']=$username;
				 $error="A session has started for the following :  ".$_SESSION['email_id'];
				 if(isset($_SESSION['email_id']))
				 {
				   header('location:home2.php');
				 }
	   		}
	   		else
	   		{
				
	   			$error="This account has not been verified yet.An email was sent to $email on $date";

	   		}


		   }
		   if(($resultset->num_rows == 0))
		   {
			echo '<script language="javascript">';
            echo 'alert("username or password is incorrect")';
			echo '</script>';
			//    echo "<script>alert('username or password is incorrect')</script>";
		   }

}

?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="css/sample2.css">



</head>

<body>

<div id="container_demo" >

	<div id="wrapper">

		<div id="login" class="animate form">

			<form   method="post" action="" autocomplete="on"> 

				<h1>Log in</h1> 

				<p> 

					<label for="username" class="uname" data-icon="u" > Your email or username </label>

					<input id="username" name="email_id" required="required" type="text" placeholder="myusername or mymail@mail.com"/>

				</p>

				<p> 

					<label for="password" class="youpasswd" data-icon="p"> Your password </label>

					<input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 

				</p>

				<p class="keeplogin"> 

					<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 

					<label for="loginkeeping">Keep me logged in</label>

				</p>

				<p class="login button"> 

					<input type="submit" name="submit" value="Login" /> 

				</p>

				<p class="change_link">
					Not a member yet ?
					<a href="sample3.php" class="to_register">Join us</a>
					<a href="http://localhost/wwwf/forgot.php" class="to_register"> Forgot PASSWORD </a>
				</p>

			</form>
			<center>
				<?php echo $error; ?>
			</center>

		</div>		
	</div>
</div>


</body>
</html>