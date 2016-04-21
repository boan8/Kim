<?php
include('database.php');


$res = mysql_query("
				SELECT t1.`training_id`,IFNULL(t2.`Trainor`,'')  as `Trainor`,t1.`Dates`, t1.`training_code`,  t1.`number_of_hours`,t1.`status`
				 FROM 
				 ( SELECT `trainings`.`training_id`,`training_code`, `number_of_hours`, `training_details`.`status` ,GROUP_CONCAT(`date`) as `Dates`
				 FROM `training_schedule`,`trainings`,`training_details`
				 WHERE
					`training_schedule`.`training_id` = `trainings`.`training_id` AND 
					`training_details`.`training_id` = `trainings`.`training_id` AND
					`training_details`.`person_involve_id` = $id
				 GROUP BY `trainings`.`training_id`) t1
				 LEFT JOIN
				 ( SELECT `training_team`.`training_id`,GROUP_CONCAT(`name`) as `Trainor`
				 FROM `training_team`,`person_involve`
				 WHERE
					`training_team`.`person_involve_id` = `person_involve`.`person_involve_id` AND
					`training_team`.`role_id` = 3
				 GROUP BY `training_team`.`training_id`) t2
				 ON 
				 t1.`training_id` = t2.`training_id`
");	
							
		
						
						
while ($row = mysql_fetch_assoc($res)) {
	echo "<tr>
		<td><a href=./attendance.php?id=".$row['training_id'].">".$row['training_code']."</td>
		<td>".convertDate($row['Dates'])."</td>
		<td>".$row['number_of_hours']."</td>
		<td>".listItem($row['Trainor'])."</td>
		<td>".$row['status']."</td>
	</tr>";
}

mysql_close($conn);


function convertDate($d){
	$dates = explode(",",$d);
	$convert = "<ul>";
	foreach($dates as $newDate){
		$convert = $convert."<li>".date("dS F Y ",strtotime($newDate))."</li>";
	}
	$convert .= "</ul>";
	return $convert;
}
function listItem($d){
	$list = explode(",",$d);
	$convert = "<ul>";
	foreach($list as $l){
		$convert = $convert."<li>".$l."</li>";
	}
	$convert .= "</ul>";
	return $convert;
}

?>