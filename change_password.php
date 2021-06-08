<?php 

require_once('PHPMailer/PHPMailerAutoload.php');
if(isset($_POST['submit']))
{
$password=$_POST['password'];
$password1=$_POST['password1'];
$email_id=$_GET['email'];
    if($password1!=$password)
    {
        echo '<script language="javascript">';
        echo 'alert("Confirm password does not match previous password")';
        echo '</script>';
    }
    else 
    {
        $mysqli = new MYSQLi ('localhost','root','','sportsarena');
        $password=$mysqli->real_escape_string($password);
        $password1=$mysqli->real_escape_string($password1);
        $password=md5($password);
        $check = $mysqli->query("SELECT password from registration WHERE email='$email_id' ");
        if($check->num_rows == 0)
        {
            echo '<script language="javascript">';
            echo 'alert("You have not registered yet to forgot any password ")';
            echo '</script>';
            header("Location: http://localhost/www/home1.php");            //home page redirection   
        }
        else 
        {
            $update =$mysqli->query("UPDATE registration set password='$password' where email='$email_id' ");
            echo '<script language="javascript">';
            echo 'alert("Your Password has been changed, Login again to play your sport freely")';
            echo '</script>';
            //login page
        }
    }
header("Location: http://localhost/www/sample2.php");
}


?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="abc.css">
</head>
<body>
    <div id="container_demo" >
        <div id="wrapper">
            <div id="signup">
                <h1>NEW PASSWORD</h1> 
                <form method="post" action="" autocomplete="on">
                <p> 
                    <label for="password" class="youpasswd" data-icon="p"> Password </label><br>
                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                </p>
                <p> 
                    <label for="confirm_password" class="c_passwd" data-icon="cp"> Confirm Password </label>
                    <input id="password" name="password1" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                </p> 
                <p class="login button"> 
                    <input type="submit" name="submit" value="CHANGE PASSWORD"/> 
                </p>
            </form>
            </div>
        </div>
    </div>            
</body>