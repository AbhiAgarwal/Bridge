<?php
session_start();
include_once('idea_header.php');
include_once('idea_functions.php');

$id = $_GET['id'];
$do = $_GET['do'];

switch ($do){
	case "follow":
		follow_user($_SESSION['userid'],$id);
		$msg = "You have followed a user!";
	break;

	case "unfollow":
		unfollow_user($_SESSION['userid'],$id);
		$msg = "You have unfollowed a user!";
	break;

}
$_SESSION['message'] = $msg;

header("Location:idea.php");
?>
