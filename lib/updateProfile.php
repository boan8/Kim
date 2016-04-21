<?php
include('database.php');
session_start();


if(isset($_POST['submit'])){
	$id = mysql_real_escape_string($_GET['id']);
	$name = mysql_real_escape_string($_POST['name']);
	$college = mysql_real_escape_string($_POST['college']);
	$dept = mysql_real_escape_string($_POST['dept']);
	$contact = mysql_real_escape_string($_POST['contact']);
	$email = mysql_real_escape_string($_POST['email']);
	$pos = mysql_real_escape_string($_POST['pos']);
	if($_FILES['images']['error'] <= 0){
		
		$image = mysql_real_escape_string(file_get_contents($_FILES['images']['tmp_name'])); //SQL Injection defence!
		$image_name = mysql_real_escape_string($_FILES['images']['name']);
		$image_type = mysql_real_escape_string($_FILES['images']['type']);
		
		mysql_query("
					UPDATE `person_involve` SET 
						`name`= '$name',
						`college_center`= '$college',
						`dept`= '$dept',
						`contact`= '$contact',
						`email`= '$email',
						`pos`= '$pos',
						`image_name`= '$image_name',
						`picture`= '$image'
						WHERE 
						`person_involve_id`=$id;
				");
				mysql_close($conn);
				
	} else{
		
		mysql_query("
					UPDATE `person_involve` SET 
						`name`= '$name',
						`college_center`= '$college',
						`dept`= '$dept',
						`contact`= '$contact',
						`email`= '$email',
						`pos`= '$pos'
						WHERE 
						`person_involve_id`=$id;
				");
				mysql_close($conn);
	}

	
	header("Location: ../profile.php?id=$id&training=successfully_updated");
	exit();
	
} 
