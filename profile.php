<?php include_once('classes/profile.class.php');?>
<?php include_once('header.php');?>
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
<h1>
<?

$id = $_GET["uid"];

if (empty($_GET["uid"])) {
    $id = $_SESSION['bridge']['user_id'];
}

$result = mysql_query("SELECT * FROM login_users 
WHERE avatar IN (
    SELECT avatar FROM login_users WHERE user_id='$id'
)");

 $row = mysql_fetch_assoc($result);

?>
		<?php if ( !$profile->guest ) : ?>
		<a href="mysettings.php" class="a-tooltip" data-rel="tooltip-bottom" title="<?php _e('Change your avatar at MySettings'); ?>">
		<?php endif; ?>
		<img class="MyBridge" src="<?php echo $row['avatar'] ?>"/>
		<?php if ( !$profile->guest ) : ?>
		</a>
		<?php endif; ?>
	<?php echo $profile->getField('name'); ?>

</h1>

<br>

<div class="tabs-left">

	<ul class="nav nav-tabs">

		<?php if ( !$profile->guest ) : ?>
			<li class="active"><a href="#usr-control" data-toggle="tab"><i class="icon-cog"></i> <?php _e('General'); ?></a></li>
		<?php endif; ?>

		<?php $profile->generateProfileTabs($profile->guest); ?>
		<?php if (!$profile->guest && !$profile->denyAccessLogs()) : ?>
		<li><a href="#usr-access-logs" data-toggle="tab"><i class="icon-list-alt"></i> <?php _e('Access logs'); ?></a></li>
		<?php endif; ?>

		<?php if ( !$profile->guest && !empty( $bridge_integration->enabledMethods ) ) : ?>
		<li><a href="#usr-integration" data-toggle="tab"><i class="icon-random"></i> <?php _e('Integration'); ?></a></li>
		<?php endif; ?>

	</ul>

	<form class="form-horizontal" method="post" action="profile.php">
	<div class="tab-content">

		<?php if ( !$profile->guest ) : ?>
		<div class="tab-pane fade in active" id="usr-control">
			<fieldset>
				<legend><?php _e('General'); ?></legend>
				<div class="control-group">
					<label class="control-label" for="CurrentPass"><?php _e('Current password'); ?></label>
					<div class="controls">
						<input type="password" autocomplete="off" class="input-xlarge" id="CurrentPass" name="CurrentPass">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="name"><?php _e('Name'); ?></label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="name" name="name" value="<?php echo $profile->getField('name'); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="email"><?php _e('Email'); ?></label>
					<div class="controls">
						<input type="email" class="input-xlarge" id="email" name="email" value="<?php echo $profile->getField('email'); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="password"><?php _e('New password'); ?></label>
					<div class="controls">
						<input type="password" autocomplete="off" class="input-xlarge" id="password" name="password" placeholder="<?php _e('Leave blank for no change'); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="confirm"><?php _e('New password again'); ?></label>
					<div class="controls">
						<input type="password" autocomplete="off" class="input-xlarge" id="confirm" name="confirm">
					</div>
				</div>

				<?php if ( $profile->getOption('profile-public-enable') ) : ?>
				<div class="control-group">
					<label class="control-label" for="confirm"><?php _e('Your public link'); ?></label>
					<div class="controls">
						<span class="uneditable-input"><?php echo SITE_PATH . 'profile.php?uid=' . $profile->getField('user_id'); ?></span>
					</div>
				</div>
				<?php endif; ?>

			</fieldset>
		</div>
		<?php endif; ?>

		<?php $profile->generateProfilePanels($profile->guest); ?>

		<?php if (!$profile->guest && !$profile->denyAccessLogs()) : ?>
		<div class="tab-pane fade" id="usr-access-logs">
			<fieldset>
				<legend><?php _e('Access Logs'); ?></legend>
				<?php $profile->generateAccessLogs(); ?>
			</fieldset>
		</div>
		<?php endif; ?>

		<?php if ( !$profile->guest && !empty( $bridge_integration->enabledMethods ) ) : ?>
		<div class="tab-pane fade" id="usr-integration">
			<fieldset>
				<legend><?php _e('Integration'); ?></legend><br>

				<p><?php _e('Use your preferred social method to login the next time you visit our site.'); ?></p><br>

				<?php

					foreach ($bridge_integration->enabledMethods as $key ) :
						$inUse = $bridge_integration->isUsed($key);
						?><div class="span3">
							<a class="a-tooltip" href="#" data-rel="tooltip" tabindex="99" title="<?php echo ucwords($key); ?>">
								<img src="assets/img/<?php echo $key; ?>.png" alt="<?php echo $key; ?>">
							</a>
							<a href="<?php echo $inUse ? '#' : '?link='.$key; ?>" class="btn btn-small btn-info<?php echo $inUse ? ' disabled' : ''; ?>"><?php _e('Link'); ?></a>
							<a href="<?php echo !$inUse ? '#' : '?unlink='.$key; ?>" class="btn btn-small<?php echo !$inUse ? ' disabled' : ''; ?>"><?php _e('Unlink'); ?></a>
							</div><?php

					endforeach;

				?>

			</fieldset>
		</div>
		<?php endif; ?>

		<?php if ( !$profile->guest ) : ?>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary"><?php _e('Save changes'); ?></button>
		</div>
		<?php endif; ?>

	</div>
	</form>
</div>

<?php include ('footer.php'); ?>