<?php 
session_start();
include_once("idea_header.php");
include_once("idea_functions.php");
$_SESSION['userid'] = 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Bridge me - Ideas</title>
</head>
<body>

<h1>List of Users</h1>
<?php
$users = show_users();
$following = following($_SESSION['userid']);

if (count($users)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500'>
<?php
foreach ($users as $key => $value){
	echo "<tr valign='top'>\n";
	echo "<td>".$key ."</td>\n";
	echo "<td>".$value;
	if (in_array($key,$following)){
		echo " <small>
		<a href='action.php?id=$key&do=unfollow'>unfollow</a>
		</small>";
	}else{
		echo " <small>
		<a href='action.php?id=$key&do=follow'>follow</a>
		</small>";
	}
	echo "</td>\n";
	echo "</tr>\n";
}
?>
</body>
</html>
