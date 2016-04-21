<?php
include('database.php');

$res = mysql_query("SELECT `title`, `training_code`, `venue`,`status`,`ref_no` FROM `trainings`,`so` WHERE  `trainings`.`training_id` = $id AND `so`.`training_id` = `trainings`.`training_id`;");	
							
							
$row = mysql_fetch_assoc($res);
echo "
	
 <h5>Training Code: ".$row['training_code']."</h5>
 <h5>Training Name: ".$row['title']."</h5>
  <h5>Venue: ".$row['venue']."</h5>
  <h5>SO-Ref.No.: ".$row['ref_no']."</h5>
  <h5>Status: ".$row['status']."</h5>
";
mysql_close($conn);
?>