<?php ob_start(); ?>
<?php include_once('classes/translate.class.php'); ?>
<?php if (!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>BridgeMe</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="BridgeMe">

		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le styles -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/bridge.css" rel="stylesheet">
	</head>

	<body>

<!-- Navigation
================================================== -->

	<div class="navbar navbar-fixed-top">
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container">

				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<a class="brand" href="home.php"><img src="logo_small.png"></a>
				<div class="nav-collapse">
					<ul class="nav">
						<li><a href="home.php"><?php _e('Home'); ?></a></li>
						<li><a href="discover.php"><?php _e('Discover'); ?></a></li>
						<li><a href="idea.php"><?php _e('Idea'); ?></a></li>
						<li><a href="events.php"><?php _e('Events'); ?></a></li>

					</ul>
		<?php if(isset($_SESSION['bridge']['username'])) { ?>
		<ul class="nav pull-right">
			<li class="dropdown">
				<p class="navbar-text dropdown-toggle" data-toggle="dropdown" id="userDrop">
					<a href="#"><?php echo $_SESSION['bridge']['username']; ?></a>
					<b class="caret"></b>
				</p>
				<ul class="dropdown-menu">
		<?php if(in_array(1, $_SESSION['bridge']['user_level'])) { ?>
					<li><a href="admin/index.php"><i class="icon-home"></i> <?php _e('Control Panel'); ?></a></li>
					<li><a href="admin/settings.php"><i class="icon-cog"></i> <?php _e('Settings'); ?></a></li> <?php } ?>
					<li><a href="profile.php"><i class="icon-user"></i> <?php _e('My Account'); ?></a></li>
					<li class="divider"></li>
					<li><a href="logout.php"><?php _e('Sign out'); ?></a></li>
				</ul>
			</li>
		</ul>
		<?php } else { ?>
		<ul class="nav pull-right">
			<li><a href="login.php" class="signup-link"><em><?php _e(''); ?></em> <strong><?php _e('Sign in!'); ?></strong></a></li>
		</ul>
		<?php } ?>
				</div>
				</div>
			</div><!-- /navbar-inner -->
		</div><!-- /navbar -->
	</div><!-- /navbar-wrapper -->

<!-- Main content
================================================== -->
		<div class="container" >
			<div class="row">

				<div class="span12">
<?
$SERVER = 'localhost';
$USER = '';
$PASS = '';
$DATABASE = '';  

if (!($mylink = mysql_connect( $SERVER, $USER, $PASS))){
	echo  "<h3>Sorry, could not connect to database.</h3><br/>
	Please contact your system's admin for more help\n";
	exit;
}

mysql_select_db( $DATABASE );
?>