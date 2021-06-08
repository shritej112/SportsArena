<?php

if(isset($_POST['submit']))
{
    $slot_id=$_POST['slot'];
    $name=$_POST['name'];
    $day=$_POST['day'];
    $fees=$_POST['fee'];
    $start=$_POST['start'];
    $end=$_POST['end'];
    $city=$_POST['city'];

    echo $end;

    $mysqli=new MySQLi('localhost','root','','sportsarena');
    $slot_id=$mysqli->real_escape_string($slot_id);
    $name=$mysqli->real_escape_string($name);
    $day=$mysqli->real_escape_string($day);
    $fees=$mysqli->real_escape_string($fees);
    $start=$mysqli->real_escape_string($start);
    $end=$mysqli->real_escape_string($end);
    $city=$mysqli->real_escape_string($city);
    echo $start;
    $insert=$mysqli->query("INSERT into slots  values ('$slot_id','$name','$day','$fees','$start','$end',1,'$city')");

    if (!$insert)
    {
        echo "not working";
    }

header("Location: http://localhost/slots_booking/slots_entering.php");
}
?>


<!DOCTYPE html>
<body>
    <form action="slots_entering.php" method="post">
        SLOT_ID <input type="number" name="slot"><br>
        NAME<input type="text" name="name"><br>
        DATE<input type="date" name="day"><br>
        FEES<input type="number" name="fee"><br>
        start time <input type="time" name="start"><br>        
        end time <input type="time" name="end"><br>
        CITY<input type="text" name="city"><br>
        <input type="submit" name="submit">
    </form>
</body>    
</html>
