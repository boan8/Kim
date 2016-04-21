<?php
include('database.php');
session_start();


if(isset($_POST['submit'],$_GET['id'])){
	$name = mysql_real_escape_string($_POST['name']);
	$person_id = mysql_real_escape_string($_POST['person_id']);
	$training_ID = mysql_real_escape_string($_GET['id']);
	$status = mysql_real_escape_string($_POST['status']);
	$val = $_POST['val'];
	
	
	for($i=0; $i < $val;$i++){
		$id  = mysql_real_escape_string($_POST["input$i"]);
		if (isset($_POST["val$i"])) {
			
			mysql_query("
				INSERT INTO `attendance`(`training_sched_id`, `training_id`, `person_involve_id`, `presence`) VALUES ($id,$training_ID,$person_id,1);
			");	
			 
			
		} else{
			 mysql_query("DELETE FROM `attendance` WHERE `training_sched_id` = $id AND  `training_id` = $training_ID  AND `person_involve_id` = $person_id;");	
		}
	}
	mysql_query("
		UPDATE `training_details` SET `status` = '$status' WHERE  `training_id`=$training_ID AND `person_involve_id`= $person_id;
	"); 
	mysql_close($conn);
	header("Location: ../attendance.php?id=$training_ID&Attendance=Succeessfully Saved");
	exit();
	
} 
mysql_close($conn);
