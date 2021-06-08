<?php
if(!isset($_SESSION['login_user']))
{
  echo '<script language="javascript">';
  echo 'alert("You must login to access this page")';
  echo '</script>';
  die();  
}

$file_name='details.json';
session_start();
echo"it worked ";
//echo $_GET['submit']; // wokring statement 
if (isset($_GET['submit']))
{
$a= $_GET['submit'];  
echo $a;
}
else 
{echo"value GET nh jhali check database ";}

$mysqli=new MySQLi('localhost','root','','sportsarena');
$sql = "SELECT * FROM slots WHERE slot_id= ('$a') ";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {  
    $extra_data = array (
    'name' => $_SESSION['login_user'],
    'slot_id' => $row['slot_id'],
    'slot_name' => $row['slot_name'],
    'slot_day' => $row['day'],
    'beg_time' => $row['start_time'],
    'end_time' => $row['end_time'],
    'fees' => $row['fees']
    );
    }
}
else 
{
    echo"not working ";
}


$update= $mysqli -> query("UPDATE slots set availability=0 WHERE slot_id= ('$a')");

if (file_exists('details.json'))
    {
        $current_data=  file_get_contents('details.json');
        $array = json_decode($current_data ,true);
        $array[] = $extra_data;
        $final_data= json_encode($array);
        if (file_put_contents ('details.json', $final_data))
        {
           $message = 'json challa';     
            echo "$message";
        }   
        else 
        {
            $error= 'json hagla ';
            echo "$error";
        }     
    }
if (! $update )
{
    echo "didnt work "; 
}
header("Location: http://localhost/www/dashboard1.php");
?>


<HTML>


</html>

