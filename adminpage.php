<!DOCTYPE html>
<html>
<?php   
session_start();
if(isset($_SESSION['name']))
{
//  $var=$_GET['per'];
// $name=$_GET['uname'];
$connect = mysqli_connect("localhost", "root", "", "tourinfo");  
 //$sql = "SELECT * FROM tournaments";  
 //$result = mysqli_query($connect, $sql);
} 
 ?>  

<head>
<link rel="stylesheet"  type="text/css"  href="css/style1.css">
</head>
<body>

  <div class="myclass" style="width:100%; height:12vh; background-color:#00688b";>
        
         <h1 style=" margin-left:40%; ">Admin Page</h1>
    </div>
<div style="margin-left:92%;">
    <?php
    if(isset($_SESSION['name']))
    {
        echo'<br>';
        echo'<br>';
        echo'<div class="dropdown">';
      echo'<button class="dropbtn" style="margin-top:4%;">'.$_SESSION['name'].' </button>';
      echo'</div>';
    }
      else
      {

      }
    ?>
</div>
<div class="main" style="width:100%; height:10%;">
<ul>
<li><a href="addproduct.php">Add Product</a></li>
<li><a href="sample3.php">Add Turf</a></li>
<li><a href="vieworder.php">View Orders</a></li>

</ul>

</div>





</body>
</html>

