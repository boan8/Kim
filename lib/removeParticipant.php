<?php
include('database.php');
session_start();


if(isset($_GET['id'],$_GET['participant'])){
	$id = mysql_real_escape_string($_GET['id']);
	$person_id = mysql_real_escape_string($_GET['participant']);
	
	if(isset($_GET['role'])){
		mysql_query("
					DELETE FROM `training_team` WHERE `person_involve_id` =  $person_id AND `training_id` = $id;
				");
	
	} else {
		mysql_query("
					DELETE FROM `training_details` WHERE `person_involve_id` =  $person_id AND `training_id` = $id;
				");
	}
	mysql_close($conn);
	header("Location: ../attendance.php?id=$id&training=successfully_deleted");
	exit();
}  else{
	mysql_close($conn);
	header("Location: ../attendance.php?id=$id");

}
