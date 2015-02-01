<br>
<br>
<?php 
session_start();
include_once('idea_header.php');
include_once('idea_functions.php');

$_SESSION['userid'] = $_SESSION['bridge']['user_id'];
?>

<?php
if (isset($_SESSION['message'])){
	echo "<b>". $_SESSION['message']."</b>";
	unset($_SESSION['message']);
}
?>
<form method='post' action='idea_add.php'>
<p>Your status:</p>
<textarea name='body' rows='5' cols='40' wrap=VIRTUAL></textarea>
<p><input type='submit' value='submit'/></p>
</form>
<?php
$posts = show_posts($_SESSION['userid']);

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
<p><b>You haven't posted anything yet!</b></p>
<?php
}
?>
<p><a href='idea_users.php'>see list of users</a></p>

<h2>Users you're following</h2>

<?php
$users = show_users($_SESSION['userid']);

if (count($users)){
?>
<ul>
<?php
foreach ($users as $key => $value){
	echo "<li>".$value."</li>\n";
}
?>
</ul>
<?php
}else{
?>
<p><b>You're not following anyone yet!</b></p>
<?php
}
?>

</body>
</html>
