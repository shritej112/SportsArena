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
  top:10%;
  left:3%;
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
   // $mail= $_SESSION['email'];
 //echo $name;
$mysqli=new MySQLi('localhost','root','','sportsarena');
$sql="SELECT * from buy where confirm=1 ";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
  
  echo'<h1>All Orders</h1>';
echo'<table class="content-table">';
  echo'<thead>';
    echo'<tr>';
      echo'<th>Product</th>';
      echo'<th>Order Date</th>';
      echo'<th>Buyername</th>';
      echo'<th>Email</th>';
      echo'<th>Delivery Address</th>';
      echo'<th>Pincode</th>';
      echo'<th>Contact</th>';
      echo'<th>Quantity</th>';
      echo'<th>Total Price</th>';
      echo'<th>Payment Mode</th>';
      echo'<th>Delivery Date</th>';
    echo'</tr>';
  echo'</thead>';
  echo'<tbody>';
    
  while($row = $result->fetch_assoc())
   {
    echo'<tr>';
    echo'<td>'.$row['category'].'</td>';
    echo'<td>'.$row['orderdate'].'</td>';
    echo'<td>'.$row['buyername'].'</td>';
    echo'<td>'.$row['email'].'</td>';
    echo'<td>'.$row['address'].'</td>';
    echo'<td>'.$row['pincode'].'</td>';
    echo'<td>'.$row['contact'].'</td>';
    echo'<td>'.$row['quantity'].'</td>';
    echo'<td>'.$row['total'].'</td>';
    echo'<td>'.$row['payment_mode'].'</td>';
    echo'<td>'.$row['deliverydate'].'</td>';


  echo'</tr>';

   }
 
}
else{
  echo '<br>';
  echo'You have not placed any order yet ';
}
echo'</tbody';


?>

</table>
</body>
</html>