<!DOCTYPE html>
<html>
<head>
<style>
* {
  font-family: sans-serif; /* Change your font family */
}

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  position:absolute;
  top:30%;
  left:35%;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}


</style>
</head>
<body>

<?php

require_once('PHPMailer/PHPMailerAutoload.php');
echo'<h1>Please confirm order details</h1>';
$tp=$_GET['tp'];
$odakh=$_GET['odakh'];
$change=$_GET['change'];
$del=$_GET['deldate'];
$sel=$_GET['sel'];
$email=$_GET['email'];
$nref=$_GET['nref'];
$stock=$_GET['stock'];
echo '<form  action="confirmorder.php?email='.$email.'&odakh='.$odakh.'&nref='.$nref.'&stock='.$stock.'&change='.$change.'&del='.$del.'&sel=buy" method="post">';
$mysqli=new MySQLi('localhost','root','','sportsarena');
$sql = "SELECT * FROM $sel where odakh='$odakh' ";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    echo '<table class="content-table">';
    echo'<tbody>';
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>Email</td><td>" . $row["email"]. "</td></tr>";
        echo "<tr><td>Address</td><td>" . $row["address"]. "</td></tr>";
        echo "<tr><td>Pincode</td><td>" . $row["pincode"]. "</td></tr>";
        echo "<tr><td>Quantity</td><td>" . $row["quantity"]. "</td></tr>";
        echo "<tr><td>Contact</td><td>" . $row["contact"]. "</td></tr>";
        echo "<tr><td>Total Amount Payable</td><td>" . $row["total"]. "</td></tr>";
        echo "<tr><td>Delivery Date</td><td>"  .$del. "</td></tr>";
        

      
   }

echo'<input style="margin-left:35%; margin-top:32%;"type="submit" name="submit" value="Confirm Order" id="r01">';

echo'</form>';
   echo'</tbody>';
    echo "</table>";
   
}
else if(isset($_POST['submit']))
{
   
    $sql = "update $sel set cofirm=1 where odakh='$odakh' ";
    $result = $mysqli->query($sql);
    if($result)
    {
       // $message =  "<a href='http://loc   qwalhost/www/order.php?vkey=$vkey'>Register Account</a>";
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
        $mail->Body = "<a href='http://localhost/www/verify.php?vkey=$vkey'>Your order has been Confirmed you will get your order on .$del. </a>";
        $mail->AddAddress($email_id);
        $mail->send();
        if($mail->Send())
        {
            echo "succesful";
             header('location:thankyou.php');
        }
    }

}

?>
<br>

</body>
</html>