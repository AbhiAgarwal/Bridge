<br>
<br>
<?php 
session_start();
include_once('idea_header.php');
include_once('idea_functions.php');
?>
<?php include_once('classes/check.class.php'); ?>
<?php if( protectThis("*") ) : ?>
    <a href="idea_loggin.php">Post Idea</a> 
<?php endif; ?>
<?
$result = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE pfield_id='7'
)");

 $row = mysql_fetch_assoc($result);
 print_r($row[profile_value]);
 ?>
<?php
if (isset($_SESSION['message'])){
	echo "<b>". $_SESSION['message']."</b>";
	unset($_SESSION['message']);
}
?>
<?php
$posts = show_posts1(1);

if (count($posts)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500'>
<?php
foreach ($posts as $key => $list){
	echo "<tr valign='top'>\n";
	echo "<td>".$list['userid'] ."</td>\n";
	echo "<td>".$list['body'] ."<br/>\n";
	echo "<small>".$list['stamp'] ."</small></td>\n";
	echo "</tr>\n";
}
?>

</table>
<?php
}else{
?>
<p><b>No Ideas in our database!</b></p>
<?php
}
?>


</body>
</html>
<?php include_once('footer.php'); ?>