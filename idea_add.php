<?php
session_start();
include_once("idea_header.php");
include_once("idea_functions.php");

$userid = $_SESSION['userid'];
$body = substr($_POST['body'],0,140);

add_post($userid,$body);
$_SESSION['message'] = "Your post has been added!";

header("Location:idea.php");
?>