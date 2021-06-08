<?php
$tp=$_GET['tp'];
$odakh=$_GET['odakh'];
$sel=$_GET['sel'];
$mysqli=new MySQLi('localhost','root','','sportsarena');
$sql = "SELECT * FROM $sel where odakh=$odakh ";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
while($row = $result->fetch_assoc()) {
   
    
}


?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>

<table>
<tbody>
<form action='insert.php' method='POST'>
<tr>
<td>Email Address:</td>
<td></td>
</tr>
<tr>
<td>Delivery Address:</td>
<td></td>
</tr>
<tr>
<td>Pincode:</td>
<td >

</td>
</tr>
<tr>
<td>Quantity:</td>
<td></td>
</tr>
<tr>
<td>Total Amount Payable:</td>
<td></td>
</tr>
<tr>
<td>Contact:</td>
<td> </td>
</tr>
<tr>
<td>Payment Method: </td>
<td></td>
</tr>

<tr>
<td><input type="submit" value="Confirm Order" id="r01"></td>
</tr>
</tbody>
</table>
</form>
</body>
