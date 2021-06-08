 <?php
require_once('PHPMailer/PHPMailerAutoload.php');
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
        $password=$_POST['password'];
        $password1=$_POST['password1'];
        $email_id=$_POST['email_id'];
        $address=$_POST['address'];
        $phone_no=$_POST['phone_no'];
        if(strlen($username)<5)
        {
            echo '<script language="javascript">';
            echo 'alert("Username must be at least 5 characters long")';
            echo '</script>';
    }
    else if($password1!=$password)
    {
        echo '<script language="javascript">';
            echo 'alert("Password and Confirm Password does not match")';
            echo '</script>';
    }
    else
    {
$servername ='localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbname = 'sportsarena';
$vkey=md5(time().$username);
$password=md5($password);
// create connection
$conn = new mysqli($servername,$dbUsername,$dbPassword,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
	$SELECT = "Select email from registration where email= ? Limit 1";
	$INSERT = "INSERT into registration(username,password,email,address,contact,vkey)  values(?,?,?,?,?,?)";
//Prepare Statement
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s",$email_id);
$stmt->execute();
$stmt->bind_result($email_id);
$stmt->store_result();
$rnum = $stmt->num_rows;
if($rnum==0)
{
	$stmt->close();
	$stmt=$conn->prepare($INSERT);
	$stmt->bind_param("ssssis",$username,$password,$email_id,$address,$phone_no,$vkey);
	$stmt->execute();
       $mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'bookmysports36@gmail.com';
$mail->Password = 'book@123';
$mail->setFrom('sportsarena');
$mail->Subject = 'Hello World';
$mail->Body = "<a href='http://localhost/www/verify.php?vkey=$vkey'>Register Account</a>";
$mail->AddAddress($email_id);
$mail->send();
if($mail->Send())
{
    echo "succesful";
     header('location:thankyou.php');
}
else
{
    echo "so jaa chupchaap";
    echo "Mailer Error: " . $mail->ErrorInfo;
}
    
}
    else if($rnum>0)
    {
        echo '<script language="javascript">';
                echo 'alert("Someone already registered using this email")';
                echo '</script>';
    }

$stmt->close();
$conn->close();
}	
    }
}
?> 




<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="abc.css">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>

<body>

<div id="container_demo" >

        <div id="wrapper">

                <div id="signup" class="animate form">

                    <form  method="post" action="" autocomplete="on"> 

                        <h1>Sign Up</h1> 

                        <p> 

                            <label for="username" class="uname" data-icon="u" > Username </label>

                            <input id="username" name="username" required="required" type="text" placeholder="myusername"/>

                        </p>

                        <p> 

                            <label for="email_id" class="email" data-icon="e" > Email Address </label>

                            <input id="email_id" name="email_id" required="required" type="email" placeholder="myemail@gmail.com"/>

                        </p>

                        <p> 

                            <label for="password" class="youpasswd" data-icon="p"> Password </label>

                            <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 

                        </p>

                        <p> 

                            <label for="confirm_password" class="c_passwd" data-icon="cp"> Confirm Password </label>

                            <input id="password" name="password1" required="required" type="password" placeholder="eg. X8df!90EO" /> 

                        </p>

                        <p> 

                            <label for="address" class="address" data-icon="d"> Address </label>

                            <input id="address" name="address" required="required" type="text" placeholder="eg. Moon lane, Sun Apartments, Mumbai - 400001" /> 

                        </p>

                        <p> 

                            <label for="phone_no" class="phone" data-icon="pn"> Contact </label>

                            <input id="phone_no" name="phone_no" required="required" type="number" placeholder="eg. 9876543210" /> 

                        </p>



                        <p class="Sign Up button"> 

                            <input type="submit" name="submit" value="Sign Up" /> 

                        </p>

                        <p class="change_link">  

                            Already a member ?

                            <a href="sample2.html" class="to_login"> Go and log in </a>

                        </p> 

                    </form>
                <center>
                   
                </center>
                </div>



                </body>
                </html>
            