<?php
include('database.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];

		
	$res = mysql_query("SELECT * FROM `person_involve` WHERE `person_involve_id`=$id ;");

	$id_num = 0;	
	$name = "";	
	$college = "";
	$dept = "";	
	$contact = "";
	$email = "";	
	$pos = "";
	$image = "";

	/*							

	`person_involve_id`
	`name`
	`college_center`
	`dept`
	`contact`
	`email`
	`pos`
	`image_name`
	`picture`
			*/


			
	$row = mysql_fetch_array($res);
	$id_num = $row['person_involve_id'];	
	$name = $row['name'];
	$college = $row['college_center'];
	$dept = $row['dept'];
	$contact = $row['contact'];
	$email = $row['email'];
	$pos = $row['pos'];
	$image =  $row['picture'];
	mysql_close($conn);
}
?>