<?php
include('database.php');

$res = mysql_query("
			SELECT DISTINCT `person_involve_id`,`name` 
			FROM `person_involve` 
			WHERE NOT EXISTS(
				SELECT `person_involve`.`person_involve_id` 
				FROM `training_details` 
				WHERE `training_id` = $id 
						AND `person_involve`.`person_involve_id` = `training_details`.`person_involve_id`
						) AND NOT EXISTS(
						SELECT `name` FROM `training_team` WHERE `training_id` = $id AND `person_involve`.`person_involve_id`= `training_team`.`person_involve_id`) 
						
						;
");	

$bo = 0;
while ($row = mysql_fetch_assoc($res)) {
	if($bo != 1){		
		echo "<option value=".$row['person_involve_id']." selected>".$row['name']."</option>";
		$bo = 1;
	} else {
		echo "<option value=".$row['person_involve_id']."  >".$row['name']."</option>";
	}
}
mysql_close($conn);

 
 
?>