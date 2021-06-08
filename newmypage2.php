
<!DOCTYPE html>
<html>
<head>
 <title>Cards</title>
 <script>
 </script>
</head>
<style type="text/css">
*{
 margin: 0px;
 padding: 5px;
}
.dropbtn {
  background-color: #4CAF50;
    color: white;
    position:relative;
    margin-top:3%;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: absolute;
    margin-top:-2%;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: lightgrey;
    min-width: 200px;
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.dropdown-content a:hover {background-color: white;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: grey;}

body{
 font-family: arial;
}
.main{

 margin: 2%;
}

.card{
     width: 20%;
     display: inline-block;
     box-shadow: 2px 2px 20px black;
     border-radius: 5px; 
     margin: 2%;
    }

.image img{
  width: 100%;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
   }
.title{
 
  text-align: center;
  padding: 10px;
   }
h1{
  font-size: 20px;
 }
.des{
  padding: 3px;
  text-align: center;
 
  padding-top: 10px;
        border-bottom-right-radius: 5px;
  border-bottom-left-radius: 5px;
}
button{
  margin-top: 40px;
  margin-bottom: 10px;
  background-color: white;
  border: 1px solid black;
  border-radius: 5px;
  padding:10px;
}
button:hover{
  background-color: black;
  color: white;
  transition: .5s;
  cursor: pointer;
}

</style>
<body>
<div class="main">
<div class="dropdown">
<button class="dropbtn" style="margin-top:2%;">Select Sport </button>
<div class="dropdown-content">
<a href="selectsport.php?var2=football" >Football </a>
<a href="selectsport.php?var2=cricket"  >Cricket </a>
<a href="selectsport.php?var2=basketball" >Basketball</a>
<a href="selectsport.php?var2=badminton">Badminton</a>
<a href="selectsport.php?var2=swimming" >Swimming</a>
</div>
</div>
</body>
</html>
<?php
$var="₹";
session_start();
$mysqli=new MySQLi('localhost','root','','sportsarena');
$sql = "SELECT product_id,price,imagepath FROM product1";
$result = $mysqli->query($sql);
$prods = null;
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {

      echo'<div class="card">';
      echo '<div class="image">';
      echo'<img class="prodimage" id ="img1" src="'.$row["imagepath"].'" width=300 height=200 alt="Ae gayab">';
     
      echo'</div>';
      echo'<div class="title">';
      echo"<h1>".$var. $row["price"]."</h1>";
      echo'</div>';
      echo'<div class="des">';
      echo'<p>You can Add Desccription Here...</p>';
      echo'<button>Buy</button>';
      echo'</div>';
      echo'</div>';

    }
  
}
if(!isset($_SESSION['email_id']))
{
  echo '<script language="javascript">';
  echo 'alert("You must login to access this page")';
  echo '</script>';
  die();
  
}
?>
