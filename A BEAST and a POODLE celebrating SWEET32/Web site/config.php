<?php
// Here are some global settings, modify as needed
// Set to somewhere outside www root or prevent browsing
// Apache must be able to write to this directory
$orderdir = "orders";
// List of users is in an array so we do not complicate with a MySQL database
$logins = array(
		'admin' => 'youcannotguessthis',
		'user' => 'sec642',
);
session_start();
if(!isset($_SESSION['login_user']) && basename($_SERVER['PHP_SELF']) != 'index.php'){
	header("location: index.php");
	exit;
}
?>
