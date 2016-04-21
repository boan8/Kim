<?php
include('database.php');
session_start();


if(isset($_POST['submit'],$_GET['id'],$_POST['participant'])){
	$role = $_POST['role'];
	$training_id = mysql_real_escape_string($_GET['id']);
	$id = mysql_real_escape_string($_POST['participant']);
	if($role == 1){
		mysql_query("
					INSERT INTO `training_details`(`training_id`, `person_involve_id`, `status`) 
					VALUES ($training_id,$id,'Incomplete');
					
				");
		
	}	else {
		mysql_query("
					INSERT INTO `training_team`(`training_id`, `person_involve_id`, `role_id`) VALUES ($training_id,$id,$role);
				");
	}
	mysql_close($conn);
	header("Location: ../attendance.php?id=$training_id");
	
} else{
	$training_id = $_GET['id'];
	mysql_close($conn);
	header("Location: ../attendance.php?id=$training_id");
	exit();
}