<?php
include('database.php');
$res = mysql_query("
				SELECT t2.id,t2.`training_code`,t2.`ref_no`,t2.`title`,t2.`number_of_hours`,t1.Participants,t2.`venue`,t1.maxDate,t2.`status` FROM
				(SELECT distinct `trainings`.`training_id` as id,`training_code`,`number_of_hours`,`ref_no`,`title`,`venue` ,`status` FROM `trainings`,`so` WHERE `trainings`.`training_id` = `so`.`training_id` ) t2
				LEFT JOIN
				(SELECT t4.id,IFNULL(t3.Participants,0) as Participants,t4.maxDate FROM
				(SELECT `trainings`.`training_id` as id,max(`date`) as maxDate FROM `trainings`,`training_schedule` WHERE `training_schedule`.`training_id` = `trainings`.`training_id` group by `trainings`.`training_id`) t4
				LEFT JOIN
				(SELECT `trainings`.`training_id` as id,count(`person_involve_id`) as Participants FROM `trainings`,`training_details`  WHERE  `training_details`.`training_id`   = `trainings`.`training_id` group by `trainings`.`training_id`) t3
				ON t3.id = t4.id)   t1
				ON t2.id = t1.id
				
					");	
$onGoing = 0;
$done = 0;

while ($row = mysql_fetch_assoc($res)) {
	$train_id = $row['id'];
	$stat = status($row['maxDate'],$train_id );
	if( $stat == "<td class='success'>Done</td>")
		$done++;
	else 
		$onGoing++;
		
		
	echo "<tr>
		<td><a href=./attendance.php?id=".$train_id.">".$row['training_code']."</td>
		<td>".$row['title']."</td>
		<td>".$row['ref_no']."</td>
		<td>".$row['Participants']."</td>
		".$stat."
		<td><button  onclick='updateTraining(".$row['id'].",\"".$row['training_code']."\",\"".$row['title']."\",\"".$row['venue']."\",".$row['number_of_hours'].",\"".$row['ref_no']."\")' title='Update Training' data-toggle='modal' data-target='#editTraining' class='btn btn-info btn-xs' aria-label='Left Align'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Edit</button></td>
	</tr>";
}
$all = $onGoing+$done;
/*
echo "
<script>
	$(document).ready(function(){
		document.getElementById(\"all\").innerHTML = \"All(".$all.")\";
		document.getElementById(\"onGoing\").innerHTML = \"On Going(".$onGoing.")\";
		document.getElementById(\"done\").innerHTML = \"Done(".$done .")\";
	});
</script>
";
*/
//<td><a href=\"?id=&&t_code=&&venue=&&ref=&&title=&&hour=\" ><i class=\"fa fa-fw fa-edit\"></i>Edit</a></td>

//mysql_close($conn);
function status($ab,$id){
	$date1=date_create($ab);
	$date2=date_create(date("Y-m-d") );
	$diff=date_diff($date1,$date2);
	$i = $diff->format("%R%a");
	if(intval($i) > 0){
		mysql_query("UPDATE `trainings` SET `status`='Done' WHERE `training_id`=$id");
		return "<td class='success'>Done</td>";
	} else {
		mysql_query("UPDATE `trainings` SET `status`='On Going' WHERE `training_id`=$id");
		return "<td  class='danger' >On Going</td>";
	}
}

?>