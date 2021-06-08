
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
 <title>BOOK</title>
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
    margin-top:5%;
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
ul
{
	list-style-type: none;
	float:right;
}
ul li
{
	display: inline-block;
	margin-top:5%;
}
ul li a
{
	text-decoration: none;
	color:#000000;
	padding:5px 20px;
	transition: 0.6s ease;
}
ul li a:hover
{
	background-color:#000;
	color:white; 
	
}  
a {
    Font :23px Charm;
}

.card_keeper
{
  margin-top:10%;
}
</style>
<body>
<div class="myclass" style="width:100%; height:40vh; margin-top:-10px; background-color: rgba(0, 0, 0, 1);";>
  	<img src="images\image1.png" alt="Trulli" width="400" height="250" style="margin-top: 10px; margin-left: 50px; float: left;">
    <h1 style="margin-top:50px; float: right; margin-right: 370px; color: silver; font-family: 'Aclonica';font-size: 70px; ">Book My <br>    Sports Arena</h1>
   
    </div> 
<div class="main" style="position:relative; width:100%; height:10%;">
<ul>
<li><a href="home2.php">Home</a></li>
<li><a href="sample3.php">Sign Up</a></li>
<li><a href="sample2.php">Login</a></li>
<li><a href="logout.php">Logout</a></li>
<li><a href="turf.php?var2=turf_football">Book</a></li>
<li><a href="selectsport.php?var2=product1">Buy</a></li>
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="dashboard1.php">Activities</a></li>
<li><a href="#">About Us</a></li>

</ul>
<div class="main">
<div class="dropdown">
<button class="dropbtn" style="margin-top:2%;">Select Sport </button>
<div class="dropdown-content">

<a href="turf.php?var2=turf_football" >Football </a>
<a href="turf.php?var2=turf_basketball" >Basketball </a>
<a href="turf.php?var2=turf_badminton" >Badminton </a>
<a href="turf.php?var2=turf_Swimming" >Swimming </a>


</div>
</div> 
<div class=card_keeper>
<?php

$turf=$_GET['var2'];
session_start();

//echo '<p>'.$_SESSION['login_user'].'</p>';
$mysqli=new MySQLi('localhost','root','','sportsarena');
$sql = "SELECT * FROM $turf ";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    
  while($row = $result->fetch_assoc()) {  
    echo'<div class="card">';
    echo'<div class="image">';
    echo'<img class="prodimage" id ="img1" src="'.$row["turf_image"].'" width=300 height=200 alt="Ae gayab">';
    echo'</div>';
    echo'<div class="title">';
    echo"<h1>".$row["turf_name"]."</h1>";
    echo'</div>';
    echo'<div class="des">';
    echo"<p>".$row["turf_city"]."</p>";
    echo"<a href=slots_showing.php?name=".$row["turf_name"]."><button>CHECK AVAILABILITY</button> </a>";
    echo'</div>';
    echo'</div>';
    

  }
}
?>
</div>


</body>
</html>
