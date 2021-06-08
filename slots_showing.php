<html>
    <head>
        <link rel="stylesheet"  type="text/css"  href="css/display.css">
    <style>

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
.main
{
	position: relative;
	margin-top: 0%;
}

#table{
    margin-left:25%;
    margin-top:0%;
}
#one{
    margin-left:35%;
    color:darkcyan;
    font-size:20px;
}
    </style>
    </head>
    <body>
    <div class="myclass" style="width:100%; height:40vh; margin-top:30px; background-color: rgba(0, 0, 0, 1);";>
  	<img src="images\image1.png" alt="Trulli" width="400" height="250" style="margin-top: 10px; margin-left: 50px; float: left;">
    <h1 style="margin-top:50px; float: right; margin-right: 370px; color: silver; font-family: 'Aclonica';font-size: 70px; ">Book My <br>    Sports Arena</h1>
   
    </div> 
    
    <div class="main" style="width:100%; height:10%;">
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

    </div>
    <br>
    <br>
    <p id="one"> THESE ARE THE AVAILABLE SLOTS </p>
    <div id="table">
        <table >
           <thead>     
            <tr class="table_header"> 
                <th>SLOT ID</th>
                <th>SLOT NAME</th>
                <th>DATE</th>
                <th>START TIME</th>
                <th>END TIME</th>
                <th>FEES</th>
                <th>AVAILABILITY</th>
            </tr>
           </thead>
               
               <?php 
               $var=$_GET['name'];
               $mysqli=new mysqli('localhost','root','','sportsarena');

               if ($mysqli)
               {    
                $display = $mysqli->query("SELECT * FROM slots WHERE slot_name='$var' "); 

                            while ($row = $display ->fetch_assoc())
                            {
                                echo "<tr><form action=after_click.php >" ;   
                                echo "<td id=".$row ["slot_id"]."> ". $row ["slot_id"]. "</td>" ;
                                echo "<td>". $row ["slot_name"]. "</td>" ;
                                echo "<td>". $row ["day"]. "</td>" ;
                                echo "<td>". $row ["start_time"]. "</td>" ;
                                echo "<td>". $row ["end_time"]. "</td>" ;
                                echo "<td>". $row ["fees"]. "</td>" ;
                                if ($row ["availability"] == 1)
                                {echo "<td> <button id=btn type=submit  name=submit value=".$row ["slot_id"]."> book </button></td>" ;}
                                else 
                                {echo "<td> <button id=btn disabled  > book </button></td>" ;}
                                echo "</form></tr>";
                            }
               }
                else {
                   die ("haagg diya for reason: ". $mysqli->connect_error);
                    }
               ?>

        </div>    
    </body>
</html>