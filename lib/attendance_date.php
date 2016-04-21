<?php
$id = 0;
$date = "";

if(!isset($_GET['id'])){
	header("Location: ../trainings.php");
} else {
	$id  = $_GET['id'];
}
include('database.php');
$res = mysql_query("SELECT `training_sched_id`,`date` FROM `training_schedule` WHERE `training_id` = ".$id."");	
$list_Of_Dates = array();
$list_Of_id = array();
$index_Of_Date = 0;
while ($row = mysql_fetch_assoc($res)) {
		$list_Of_id[$index_Of_Date] = $row['training_sched_id'];
		$list_Of_Dates[$index_Of_Date++] = $row['date'];
}
mysql_close($conn);

if(!isset($_GET['sched_id'])){
	$date = $list_Of_id[0];
} else {
	$date = $_GET['sched_id'];
}


function list_Dates($dates,$a,$id){
	$i = 0;
	$ret = 0;
	foreach($id as $d){
		if($a == $d){
			$ret = $i;
			echo "<option value=".$d." selected>".$dates[$i++]."</option>";
		} else {
			echo "<option value=".$d." >".$dates[$i++]."</option>";
		}
	}
	return $ret;
}

?>