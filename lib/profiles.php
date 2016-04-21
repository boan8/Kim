<?php
include('database.php');
$res = mysql_query("SELECT `person_involve_id`,`name`,`college_center`,`dept` FROM `person_involve`;");	
while ($row = mysql_fetch_assoc($res)) {
	echo "<tr>
		<td><a href=./profile.php?id=".$row['person_involve_id'].">".$row['name']."</td>
		<td>".$row['dept']."</td>
		<td>".$row['college_center']."</td>
	
	</tr>";
}
mysql_close($conn);
?>