<?php
//session_start();
include('config.php');
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	}
	else
	{
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		// This can be extended in the future to support a database
		// But currently it's overkill
		if ( $password == $logins[$username] ) {
			$_SESSION['login_user'] = $username;
			session_write_close();
		}
		else {
			$error = "Username or Password is invalid";
		}
	}
}
?>
