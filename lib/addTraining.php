<?php
include('database.php');
session_start();
function returnDates($fromdate, $todate) {
    $fromdate = DateTime::createFromFormat('d/m/Y', $fromdate);
    $todate = DateTime::createFromFormat('d/m/Y', $todate);
    return new DatePeriod(
        $fromdate,
        new DateInterval('P1D'),
        $todate->modify('+1 day')
    );
}


if(isset($_POST['submit'])){
	$training_code = mysql_real_escape_string($_POST['training_code']);
	$title = mysql_real_escape_string($_POST['title']);
	$noh = mysql_real_escape_string($_POST['noh']);
	$venue = mysql_real_escape_string($_POST['venue']);
	$soNumber = mysql_real_escape_string($_POST['soNumber']);
	$rad = $_POST['sched'];
	//$f = $_FILES["fileToUpload"];
	//$tmpName  = $_FILES['fileToUpload']['tmp_name'];

	//echo $tmpName;
	$adminID = $_SESSION['adminID'];
	
	mysql_query("
			INSERT INTO `trainings`(`training_code`, `title`, `venue`, `user_id`,`number_of_hours`,`status`) VALUES ('$training_code','$title','$venue',$adminID,$noh,'$status');
		");
	
	echo "INSERT INTO `trainings`(`training_code`, `title`, `venue`, `user_id`,`number_of_hours`,`status`) VALUES ('$training_code','$title','$venue',$adminID,$noh,'$status');";
	$trainingid = 0;
	$res = mysql_query("SELECT MAX(`training_id`) AS lastID FROM trainings");	
	while ($row = mysql_fetch_assoc($res)) {
		$trainingid = $row['lastID']; 
	}
	
	
	mysql_query("
			INSERT INTO `so`(`ref_no`, `training_id`) VALUES ('$soNumber', $trainingid);
		");
		
	if($rad == 1){
		$date_from = mysql_real_escape_string($_POST['date_From']);
		$date_to = mysql_real_escape_string($_POST['date_To']);
		
		
		$begin = new DateTime($date_from);
		$end = new DateTime($date_to);

		$daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);
		
		
		foreach($daterange as $date){
			 //echo $date->format("Y-m-d") . "<br>";
			 $newDate = $date->format("Y-m-d");
			 mysql_query("
				INSERT INTO `training_schedule`(`training_id`, `date`) VALUES ($trainingid,'$newDate');
			");
		}
		$lastDate = $end->format("Y-m-d");
		mysql_query("
				INSERT INTO `training_schedule`(`training_id`, `date`) VALUES ($trainingid,'$lastDate');
			");
		
			
			
	}else {
	
		// get unique date
		$datesStr = $_POST['selectedDinput'];
		$dates = explode(PHP_EOL,$datesStr);
	
		$inUniqDates = array_unique($dates);
		$uniqDates = array();
		
		$i=0;
		foreach ($inUniqDates as $value) {
			 $uniqDates[$i] = $value;
			 $i++;
		}
		
		
		
		for($i=0;$i < count($uniqDates); $i++){
			 $strDate = new DateTime($uniqDates[$i]);
			 $newDate = $strDate->format("Y-m-d");
			mysql_query("INSERT INTO `training_schedule`(`training_id`, `date`) VALUES ($trainingid,'$newDate');");
			
		}
		
	}
	mysql_close($conn);
	header("Location: ../trainings.php?training=successfully_added");
	exit();
} 
