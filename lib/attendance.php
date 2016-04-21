<?php
include('database.php');
if(isset($_GET['id'])){
	$res = mysql_query("SELECT `title`,max(`date`) as date,`person_involve`.`person_involve_id` as person_id,`name`,`college_center`,`dept`, `training_details`.`status`
							FROM `training_details`,`person_involve`,`trainings`,`training_schedule`
							WHERE `training_details`.`training_id` = $id AND 
									`person_involve`.`person_involve_id` = `training_details`.`person_involve_id` AND
									`trainings`.`training_id` = $id AND
									`training_schedule`.`training_id` = $id
									GROUP BY `person_involve`.`person_involve_id`;
								");
		
	while ($row = mysql_fetch_assoc($res)) {
		$p_id = $row['person_id'];
		$name_Text = $row['name'];
		$date = date("dS F Y ",strtotime($row['date']));
		$array = explode(" ",$date);
		echo "<tr>
			<td>
			<a href='profile.php?id=".$p_id."' >".$name_Text."</td>
			<td>".$row['college_center']."</td>
			<td>".$row['dept']."</td>
			<td>".$row['status']."</td>
			<td>
				<button  title='Check Attendance' onclick='edit(".$p_id.",\"".$name_Text."\",$id)' data-toggle='modal' data-target='#modal2' class='btn btn-info btn-xs' aria-label='Left Align'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>
				<a data-toggle='tooltip' title='Delete' onclick=\"return confirm('Are you want to delete?')\" href='lib/removeParticipant.php?id=".$id."&participant=".$row['person_id']."' type='button' class='btn btn-danger btn-xs' aria-label='Left Align'>
				 <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
			  </a>
			  <a data-toggle='tooltip' href='certificate.php?training=".$row['title']."&name=".$row['name']."&day=".$array[0]."&month=".$array[1]."&year=".$array[2]."' title='Print Certificate' class='btn btn-primary btn-xs' aria-label='Left Align'><span class='glyphicon glyphicon-print' aria-hidden='true'></span></a>
			  
		  </td>
		</tr>";
	}
	mysql_close($conn);
}
?>