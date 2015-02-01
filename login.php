<?php include_once('classes/login.class.php'); ?>
<?php include_once('header.php'); ?>

<div id="forgot-form" class="modal hide fade">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>
		<h3><?php _e('Account Recovery'); ?></h3>
	</div>
	<div class="modal-body">
		<div id="message"></div>
		<form action="forgot.php" method="post" name="forgotform" id="forgotform" class="form-stacked forgotform normal-label">
			<div class="controlgroup forgotcenter">
			<label for="usernamemail"><?php _e('Username or Email Address'); ?></label>
				<div class="control">
					<input id="usernamemail" name="usernamemail" type="text"/>
				</div>
			</div>
			<input type="submit" class="hidden" name="forgotten">
		</form>
	</div>
	<div class="modal-footer">
		<button data-complete-text="<?php _e('Done'); ?>" class="btn btn-primary pull-right" id="forgotsubmit"><?php _e('Submit'); ?></button>
		<p class="pull-left"><?php _e('It\'ll be easy, I promise.'); ?></p>
	</div>
</div>

<div class="row">
	<div class="main login">
		<form method="post" class="form normal-label" action="login.php">
		<fieldset>
			<br>
		<h4><?php _e('Sign in to BridgeMe'); ?></h4>
			<div class="control-group">
			<label for="username" class="login-label"><?php _e('Username'); ?></label>
				<div class="controls">
					<input class="xlarge" id="username" name="username" maxlength="15" type="text"/>
					<span class="forgot"><a data-toggle="modal" href="#forgot-form" id="forgotlink" tabindex=-1><?php _e('Trouble signing in'); ?></a>?</span>
				</div>
			</div>

			<div class="control-group">
			<label for="password" class="login-label"><?php _e('Password'); ?></label>
				<div class="controls">
					<input class="xlarge" id="password" name="password" size="30" type="password"/>
				</div>
			</div>
		</fieldset>

		<input type="hidden" name="token" value="<?php echo $_SESSION['bridge']['token']; ?>"/>
		<input type="submit" value="<?php _e('Sign in'); ?>" class="btn login-submit" id="login-submit" name="login"/>

		<label class="remember" for="remember">
			<input type="checkbox" id="remember" name="remember"/><span><?php _e('Stay signed in'); ?></span>
		</label>

<?
	//	<p class="signup"><a href="sign_up.php"><?php _e('New to BridgeMe? <strong>Join today!</strong>'); ?>
<? //</a></p>
?>

<br><br>

		<?php if ( !empty($bridge_integration->enabledMethods) ) : ?>

		<div class="">
			<?php foreach ($bridge_integration->enabledMethods as $key ) : ?>
				<p><a href="login.php?login=<?php echo $key; ?>"><img src="assets/img/<?php echo $key; ?>_signin.png" alt="<?php echo $key; ?>"></a></p>
			<?php endforeach; ?>
		</div>

		<?php endif; ?>

		</form>
	</div>

</div>
<?php include_once('footer.php'); ?>