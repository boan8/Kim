<?php
include('database.php');
session_start();

if(isset($_POST['username'],$_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$res = mysql_query("SELECT user_id,f_name ,l_name FROM users WHERE username='".$username."' AND password='".$password."' LIMIT	1;");
	//SELECT user_id,f_name ,l_name FROM users WHERE username='admin' AND password='admin' LIMIT	1;
	$s = mysql_num_rows($res);
	
	if($s > 0){
		while ($row = mysql_fetch_assoc($res)) {
			$_SESSION['adminID'] = $row['user_id']; 
			$_SESSION['fullname'] = $row['f_name']." ".$row['l_name']  ; 
		}
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		mysql_close($conn);
		header("Location: ../index.php?login=successful");
		exit();
	} else { 
		mysql_close($conn);
		header("Location: ".$_SERVER['HTTP_REFERER']."?login=failed");
		exit();
	}
}
