

<!DOCTYPE html>
<html>
<!-- <?php   
session_start();
if(isset($_SESSION['name']))
{
 $var=$_GET['per'];
$name=$_GET['uname'];
$connect = mysqli_connect("localhost", "root", "", "tourinfo");  

} 
 ?>  
 -->
<head>
<link rel="stylesheet"  type="text/css"  href="style2.css">
</head>
<body>

  <div class="myclass" style="width:100%; height:40vh; margin-top:0px; background-color: rgba(0, 0, 0, 1);";>
  	<img src="images\image1.png" alt="Trulli" width="400" height="250" style="margin-top: 10px; margin-left: 50px; float: left;">
    <h1 style="margin-top:50px; float: right; margin-right: 370px; color: silver; font-family: 'Aclonica';font-size: 70px; ">Book My <br>    Sports Arena</h1>
   
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


<div class="main" style="width:100%; height:10%; margin-left: 0px; margin-top: -40px; font-family: 'Charm'; font-size: 23px;">
<ul>
  <li><a href="home2.php">Home</a></li>
<li><a href="register.php">Sign Up</a></li>
<li><a href="userlogin.php">Login</a></li>
<li><a href="logout.php">Logout</a></li>
<li><a href="turf.php?var2=turf_football">Book</a></li>
<li><a href="selectsport.php?var2=product1">Buy</a></li>
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="dashboard1.php">Activities</a></li>
<li><a href="#">About Us</a></li>
</ul>

</div>
<div class="info" style="margin-top: 8%; height:20%; border:1px solid black;" >
<marquee height="60px" behavior="scroll" direction="left" scrollamount="20" onmouseover="this.stop();" onmouseout="this.start();">  
           <?php
                 $connect = mysqli_connect("localhost", "root", "", "tourinfo");    
                $sql = "SELECT * FROM tournaments";  
                $result = mysqli_query($connect, $sql);
                     if(mysqli_num_rows($result) > 0)  
                     {    
                          echo '<ul style="list-style-type:none;">';
                          echo '<li style="display:inline-block;"> NOTICE!! ABOUT TOURNAMENT : </li>';
                          while($row = mysqli_fetch_array($result))  
                          {    
                               echo '<li style="display:inline-block;"><label><a href="'.$row['news_link'].'" target="_blank">'.$row['news_title'].'</a></label></li>';                                 
                          }  
                          echo "</ul>";
                     }  
                ?>  
                </marquee>  
</div>

<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 5</div>
    <img src="images/football.jpg" style="width:100%">
    <div class="text">Caption One</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 5</div>
    <img src="images/badminton.jpg" style="width:100%">
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 5</div>
    <img src="images/basketball.jpg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">4 / 5</div>
    <img src="images\swimming.jpg" style="width:100%">
    <div class="text">Caption Four</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">5 / 5</div>
    <img src="images\cricket1.jpg" style="width:100%">
    <div class="text">Caption Five</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>
</div>

<script type="text/javascript">
	var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>



<div class = "footersection" style="height:200px; background-color: black; opacity: 0.85; margin-top:-4.5%;">
<ul style="list-style-type: none; float:left">
<img src="images\contact-us.jpg" alt="Trulli" width="250" height="150" style="margin-top: 20px; margin-left: 40px;">
</ul>
<ul style="list-style-type: none; float:left; margin-top: 20px;  margin-left: 80px; ">

    <li class="footerlist" style="color:white;">Prathamesh</li>
    <br>
    <li class="footerlist">810880918</li>
</ul>
<ul style="list-style-type: none; float:left; margin-top: 20px;   margin-left: 100px; ">

    <li class="footerlist" style="color:white;">Paresh</li>
    <br>
    <li class="footerlist" >9082787101</li>
 
                    </ul>

<ul style="list-style-type: none; float:left; margin-top: 20px;  margin-left: 100px;">

    <li class="footerlist" style="color:white;">Shritej</li>
    <br>
    <li class="footerlist" >7718055423</li>
    <li style="color:white;"></li>
</ul>
    <a href="#"><img src="images\facebook.png" alt="Trulli" width="80" height="80" style="position: relative; top: 50%; float:right; margin-right: 30px"></a>
    <a href="#"><img src="images\twitter.png" alt="Trulli" width="80" height="80" style="position: relative; top: 50%; float:right;" ></a>
    <a href="#"><img src="images\linkedIn.png" alt="Trulli" width="80" height="80" style="position: relative; top: 50%;float:right;"></a>


</div>

</body>
</html>

