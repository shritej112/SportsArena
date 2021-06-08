<?php 
$error=NULL;
require_once('PHPMailer/PHPMailerAutoload.php');

if (isset($_POST['submit']))
{
    $email_id = $_POST['email_id'];
    $mysqli=new MySQLi('localhost','root','','sportsarena');
    $email_id=$mysqli->real_escape_string($email_id);

    $check= $mysqli->query("SELECT email from registration where email='$email_id' ");
    if($check->num_rows == 0)
    {
        //$error="<p>This email already exists </p>";
        echo '<script language="javascript">';
        echo 'alert("You have not registered yet to forgot any password ")';
        echo '</script>';
	}
    else
    {
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = '465';
		$mail->isHTML();
		$mail->Username = 'pmpandit31086@gmail.com';
		$mail->Password = 'daalbhajiyechawal';
		$mail->setFrom('sportsarena');
		$mail->Subject = 'Hello World';
		$mail->Body = "<a href='http://localhost/www/change_password.php?email=$email_id'>Register Account</a>";
		$mail->AddAddress($email_id);
		$mail->send();
		if ($mail->Send())
		{
			echo '<script language="javascript">';
			echo 'alert(" To change your password, plz check your mail, passwrod changing link have been sent their ")';
			echo '</script>';
		}
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

		<div id="login">

			<form  method="post" action="" autocomplete="on"> 

				<h1>Trouble Logging In ???</h1> 

				<p> 

					<label for="username" class="uname" data-icon="u" > Your email </label>

					<input id="username" name="email_id" required="required" type="text" placeholder="enter your registered e-mail id"/>

				</p>

				<p class="login button"> 

					<input type="submit" name="submit" value="Change Password" /> 

				</p>

				<p class="change_link">

					Did you recollect the Password

					<a href="http://localhost/www/sample2.php" class="to_register">LOG IN</a>
				</p>

			</form>
		</div>		

	</div>

</div>  



</body>
</html>