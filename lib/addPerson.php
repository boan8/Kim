<?php
include('database.php');
session_start();


if(isset($_POST['submit'])){
	$name = mysql_real_escape_string($_POST['name']);
	$email = mysql_real_escape_string($_POST['email']);
	$collegeCenter = mysql_real_escape_string($_POST['collegeCenter']);
	$cnum = mysql_real_escape_string($_POST['cnum']);
	$dept = mysql_real_escape_string($_POST['dept']);
	$pos = mysql_real_escape_string($_POST['pos']);
	
	$image = mysql_real_escape_string(file_get_contents($_FILES['imagesada']['tmp_name'])); //SQL Injection defence!
	$image_name = mysql_real_escape_string($_FILES['imagesada']['name']);
	$image_type = mysql_real_escape_string($_FILES['imagesada']['type']);
	

	
	mysql_query("
				INSERT INTO `person_involve`(`name`, `college_center`, `dept`, `contact`, `email`, `pos`, `picture`, `image_name`) 
				VALUES ('$name','$collegeCenter','$dept','$cnum','$email','$pos','$image','$image_name');
			");
	
	mysql_close($conn);
	header("Location: ../profiles.php?profiles=successfully_added");
	exit();
} 
