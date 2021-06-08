 <?php
$message="";
if(isset($_POST['submit']))
{
    $mysqli=new MySQLi('localhost','root','','sportsarena');
    $tname=$_POST['tname'];
        $pname=$_POST['pname'];
        $price=$_POST['price'];
        $quantity=$_POST['quantity'];
        $category=$_POST['category'];
        $imagepath=$_POST['imagepath'];
$servername ='localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbname = 'sportsarena';

// create connection
$conn = new mysqli($servername,$dbUsername,$dbPassword,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
	$SELECT = "Select product_name from $tname where product_name= ? Limit 1";
	$INSERT = "INSERT into $tname( product_name,quantity,price,imagepath,category)  values(?,?,?,?,?)";
//Prepare Statement
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s",$pname);
$stmt->execute();
$stmt->bind_result($pname);
$stmt->store_result();
$rnum = $stmt->num_rows;
if($rnum==0)
{
	$stmt->close();
	$stmt=$conn->prepare($INSERT);
	$stmt->bind_param("siiss",$pname,$quantity,$price,$imagepath,$category);
    $stmt->execute();
    $resultset = $mysqli->query("insert into product1(product_name,quantity,price,imagepath) values('$pname','$quantity','$price','$imagepath') ");
    echo '<script language="javascript">';
                echo 'alert("Product inserted in the database")';
                echo '</script>';

}
     else if($rnum>0)
    {
        echo '<script language="javascript">';
                echo 'alert("Product Already exists in the database")';
                echo '</script>';
    }

$stmt->close();
$conn->close();
}	
    }

?> 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="abc.css">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>

<body>

<div id="container_demo" >

        <div id="wrapper">

                <div id="signup" class="animate form">

                    <form  method="post" action="" autocomplete="on"> 

                        <h1>Add Product</h1> 

                        <p> 

                            <label for="Product Name" class="uname" data-icon="u" > Table Name </label>

                            <input id="username" name="tname" required="required" type="text" />

                        </p>
                        <p> 

                            <label for="Product Name" class="uname" data-icon="u" > Product Name </label>

                            <input id="username" name="pname" required="required" type="text" />

                        </p>

                        <p> 

                            <label for="quantity" class="email" data-icon="e" > Quantity </label>

                            <input id="email_id" name="quantity" required="required" type="number"/>

                        </p>

                        <p> 

                            <label for="price" class="youpasswd" data-icon="p"> Price </label>

                            <input id="password" name="price" required="required" type="number" /> 

                        </p>

                        <p> 

                            <label for="category" class="c_passwd" data-icon="cp"> Category </label>

                            <input id="password" name="category" required="required" type="text" placeholder="Cricket,Football etc" /> 

                        </p>

                        <p> 

                            <label for="imagepath" class="address" data-icon="d">Image Path </label>

                            <input id="address" name="imagepath" required="required" type="text" placeholder="images/pic_name.jpg/png" /> 

                        </p>

                        



                        <p class="Sign Up button"> 

                            <input type="submit" name="submit" value="Add Product" /> 

                        </p>

            

                    </form>
                <center>
                   
                </center>
                </div>



                </body>
                </html>
            