<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
session_start();
$mail=$_GET['mail'];

echo'<p>Your order has been confired and details have been mailed to '.$mail.'</p>';
sleep(3);
header('location:home2.php');
?>
</body>
</html>