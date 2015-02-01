<br>
<br>
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" src="ideal/js/vote_submit.js"></script>
<link rel="stylesheet" type="text/css" href="ideal/css/style.css" />
</head>
<?php 
session_start();
include_once('idea_header.php');
define("auth", true);//define a variable to prevent users from direct going to our files
include_once 'ideal/config/config.php';//include our session start and db connections
include('ideal/vote-system.php');//core file for voting and commenting
?>
<?php include_once('classes/check.class.php'); ?>
<?php if( protectThis("*") ) : ?>
    <?  getItemVotes('Test');//show the vote buttons and allow users to comment ?>
<?php endif; ?>

</body>
</html>
<?php include_once('footer.php'); ?>