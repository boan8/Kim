<?php
include('database.php');

$id = $_REQUEST["id"];
$t_id = $_REQUEST["t_id"];

$res = mysql_query("
	SELECT dates.t_id,dates.`date`,IFNULL(attend.`presence`,0)  as presence FROM
	(SELECT `training_sched_id` as t_id, `date` FROM `training_schedule` WHERE  `training_id` = $t_id ORDER BY `date`) dates
	LEFT JOIN
	(SELECT `training_sched_id` as t_id, `presence` FROM `attendance` WHERE `training_id` = $t_id AND `person_involve_id` = $id) attend
	ON 
	dates.t_id = attend.t_id;
");

/*
$data = "SELECT dates.t_id,dates.`date`,IFNULL(attend.`presence`,0)  as presence FROM
	(SELECT `training_sched_id` as t_id, `date` FROM `training_schedule` WHERE  `training_id` = $t_id) dates
	LEFT JOIN
	(SELECT `training_sched_id` as t_id, `presence` FROM `attendance` WHERE `training_id` = $t_id AND `person_involve_id` = $id) attend
	ON 
	dates.t_id = attend.t_id;";
	*/
$data = "";
$i = 0;
while ($row = mysql_fetch_assoc($res)) {
	$pres = $row['presence'];
	//$row['t_id'] <-- Training sched ID
	if($pres == 0){
		$data .= "<tr><td><input name='input$i' type='hidden' value='".$row['t_id']."' >".date("d M Y ",strtotime($row['date']))."</td> <td><input name='val$i' type='checkbox'/> </td></tr>";
	} else  {
		$data .= "<tr><td><input name='input$i' type='hidden' value='".$row['t_id']."' >".date("d M Y ",strtotime($row['date']))."</td> <td><input name='val$i' type='checkbox' checked/> </td></tr>";
	}
	$i++;
}
$data .= "<input name='val' value='$i'type='hidden'>";
mysql_close($conn);
echo $data;
?>