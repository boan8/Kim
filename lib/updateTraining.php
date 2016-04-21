<?php
include('database.php');
session_start();
function returnDates($fromdate, $todate) {
    $fromdate = \DateTime::createFromFormat('d/m/Y', $fromdate);
    $todate = \DateTime::createFromFormat('d/m/Y', $todate);
    return new \DatePeriod(
        $fromdate,
        new \DateInterval('P1D'),
        $todate->modify('+1 day')
    );
}


if(isset($_POST['submit'])){
	$trainingid = mysql_real_escape_string($_POST['id']);
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
	$status = "";
	
	
	mysql_query("
			UPDATE `trainings`
			SET
				`title` = '$title',
				`training_code` = '$training_code',
				`venue` = '$venue',
				`status` = '$status',
				`number_of_hours` = '$noh',
				`user_id` = $adminID
			WHERE
				`training_id` = $trainingid
		");
	
	mysql_query("
			UPDATE `so`
			SET 
				`ref_no` = '$soNumber'
			WHERE
				`training_id` = $trainingid
		");
	
	
	if($rad == 1){
		if($_POST['date_From'] != "" && $_POST['date_To'] != "" ){
			
		mysql_query("
				DELETE FROM `training_schedule`
				WHERE
					`training_id` = $trainingid
			");
			
			
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
			
				
		}
	}else {
		if(isset($_POST['selectedDinput'])){
			// get unique date
			
			mysql_query("
				DELETE FROM `training_schedule`
				WHERE `training_id` = $trainingid
			");
			
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
	}
	mysql_close($conn);
	header("Location: ../trainings.php?training=successfully_updated");
	exit();
} 
