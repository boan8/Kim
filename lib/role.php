<?php
include('database.php');

$res = mysql_query("
			SELECT * FROM `role`;
");	

$bo = 0;
while ($row = mysql_fetch_assoc($res)) {
	if($bo != 1){		
		echo "<option value=".$row['role_id']." selected>".$row['role_name']."</option>";
		$bo = 1;
	} else {
		echo "<option value=".$row['role_id']."  >".$row['role_name']."</option>";
	}
}

mysql_close($conn);
 
 
?>