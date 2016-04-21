<?php
include('database.php');
session_start();


$res = mysql_query("SELECT date FROM training_schedule;");
$i = 0;
$dates = array();
while ($row = mysql_fetch_assoc($res)) {
	 $dates[$i] = $row['date']; 
	 $i++;
}

$js_array = json_encode($dates);
mysql_close($conn);
echo "var tex = ".$js_array;



?>
	
	