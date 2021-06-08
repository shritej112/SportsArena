<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
require_once('PHPMailer/PHPMailerAutoload.php');
if(isset($_POST['submit']))
{
    $email_id=$_GET['email'];
    $odakh=$_GET['odakh'];
    $sel=$_GET['sel'];
    $del=$_GET['del'];
    $nref=$_GET['nref'];
    $change=$_GET['change'];
    $stock=$_GET['stock'];
    $mysqli=new MySQLi('localhost','root','','sportsarena');
    $update=$mysqli->query(" update $nref set quantity=$stock where product_id=$change ");
    $update=$mysqli->query(" update product1 set quantity=$stock where product_id=$change ");
    $sql="select * from $nref where product_id='$change' ";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

           $stock= $row["quantity"];
        }
           if($stock>0)
           {
    $sql = "update $sel set confirm=1 where odakh='$odakh' ";
    $result = $mysqli->query($sql);
    if($result)
    {
       // $message =  "<a href='http://localhost/www/order.php?vkey=$vkey'>Register Account</a>";
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
        $mail->Body = "<p>Your order has been Confirmed you will get your order will be delivered on .$del.</p>";
        $mail->AddAddress($email_id);
        $mail->send();
        if($mail->Send())
        {
            echo "succesful";
             header('location:confirmationmail.php?mail='.$email_id.'');
        }
    }
           }
        
else
{
    echo '<script language="javascript">';
        echo 'alert("Sorry this product is currently  out of stock")';
        echo '</script>';
}
    }
    
}


?>
</body>
</html>