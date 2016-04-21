<?php
include('database.php');


$res = mysql_query("SELECT `person_involve`.`person_involve_id` as person_id,`name`,`college_center`,`dept` FROM `training_team`,`person_involve` WHERE `training_team`.`training_id` = $id AND `person_involve`.`person_involve_id` = `training_team`.`person_involve_id` AND
									`training_team`.`role_id` = 2
");	

while ($row = mysql_fetch_assoc($res)) {
		$p_id = $row['person_id'];
		echo "<tr>
			<td>
			<a href='profile.php?id=".$p_id."' >".$row['name']."</td>
			<td>".$row['college_center']."</td>
			<td>".$row['dept']."</td>
			<td><select class='form-control'>
				<option>Approve</option>
				<option>Disapprove</option>
			</select></td>
			<td>
			
				<a data-toggle='tooltip' title='Delete'  onclick=\"return confirm('Are you want to delete?')\"  href='lib/removeParticipant.php?id=".$id."&participant=".$row['person_id']."&role=2' type='button' class='btn btn-danger btn-xs' aria-label='Left Align'>
				 <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
			  </a>
		  </td>
		</tr>";
}
mysql_close($conn);
?>