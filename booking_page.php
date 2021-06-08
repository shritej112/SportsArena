<?php
$mysqli=new MySQLi('localhost','root','','sportsarena');
$result= $mysqli->query("SELECT * FROM SLOTS ");  
echo "$result[1]";    
?>

<!DOCTYPE html>
<body>

<table style="width:100%">
  <tr>
    <th>slot_id</th>
    <th>slot_name</th>
    <th>date</th>
    <th>beg</th>
    <th>end</th>
</tr>
<?php while ($row = $mysqli->fetch(PDO::FETCH_ASSOC)) 
  
  {
      extract ($row);
      echo 
    "<tr>
    <td>{$row['slot_id']}</td>
    <td>{$row['slot_name']}</td>
    <td>{$row['slot_day']}</td>
    <td>{$row['start_time']}</td>
    <td>{$row['end_time']}</td>
    </tr>";
  }
?>
</table>

<body> 
</html>