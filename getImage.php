<?php
include('lib/database.php');


$ids = $_GET['id'];
$res = mysql_query("SELECT picture FROM `person_involve` WHERE `person_involve_id`=$ids;");
$row = mysql_fetch_assoc($res);
$imahe =  $row['picture'];
header("Content-type: image/jpg");
echo $imahe;

?>