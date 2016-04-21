<?php

$conn = mysql_connect("localhost", "root", "");
if (!$conn) {
	 echo "Unable to connect to DB: " . mysql_error();
	 exit;
}
 
if (!mysql_select_db("kim")) { // job_order kay ang name sa database
	 echo "Unable to select database kim: " . mysql_error();
	 exit;
}



/*
$conn = mysqli_connect("mysql8.000webhost.com", "a9319067_kimasd", "CHerrie123","a9319067_kimasd");
if (mysqli_connect_error()) {
	die("Database connection failed: " . mysqli_connect_error());
}


$conn = mysql_connect("mysql8.000webhost.com", "a9319067_kimasd", "CHerrie123");
if (!$conn) {
	 echo "Unable to connect to DB: " . mysql_error();
	 exit;
}
 
if (!mysql_select_db("a9319067_kimasd")) { // job_order kay ang name sa database
	 echo "Unable to select database kim: " . mysql_error();
	 exit;
}
*/