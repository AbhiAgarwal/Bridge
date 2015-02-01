<html>
		<style>
		#section1{
	padding:30px;
	width:1000px;
	margin:0 auto;
	color:rgb(55,55,55);
}
#section1 h1{
	font-family:"BebasRegular", Arial, sans-serif;
	font-size:60px;
	font-weight:800;
	z-index:2;
}
#name, #username, #password, #email, #password_confirm{
	font-family:"PacificoRegular",Arial,sans-serif;
	font-size:40px;
	color:rgb(55,55,55);
	width:500px;
	z-index:2;
}

.input-xlarge { width: 254px; height: 20px; }

#name, #username, #password, #email, #password_confirm a{
	color:rgb(55,55,55);
	text-decoration:none;
	cursor:pointer;
	border: 0;
}
#name, #username, #password, #email, #password_confirm a:hover{
	color:rgb(55,55,55);
	text-decoration:none;
	cursor:pointer;
}
#signup_username{
	position:relative;
	bottom:15px;
	border-style:none;
	border-bottom-style:solid;
	background-color: transparent;
	outline:none;
	width:400px;
	height:20px;
	font-family:"BallparkWeiner",Arial,sans-serif;
	font-size:40px;
}

	</style>
</html>
<?php include_once('classes/signup.class.php'); ?>
<?php include_once('header.php'); ?>
<br>
<br>
<div class="row">

		<form class="form-horizontal" method="post" action="sign_up.php" id="sign-up-form">
		
				<div class="control-group">
				<div id="controls">
				<h1>Hi, I'm, <input type="text" class="input-xlarge" id="name" name="name" style="height:60px" value="<?php echo $signUp->getPost('name'); ?>" placeholder="">,</h1>
				<h1>my email is, <input type="email" class="input-xlarge" id="email" name="email" style="height:60px"  value="<?php echo $signUp->getPost('email'); ?>" placeholder="">,</h1>
				<h1>make my username, <input type="text" class="input-xlarge" id="username" style="height:60px" name="username" maxlength="15" value="<?php echo $signUp->getPost('username'); ?>" placeholder="">,</h1>
				<h1>and my password, <input type="password" class="input-xlarge" id="password" style="height:60px" name="password" placeholder="">,</h1>
				<h1>finally confirm your password, <input type="password" class="input-xlarge" style="height:60px" id="password_confirm" name="password_confirm" placeholder="">.</h1>
				</div>
				</div>
				<div class="control-group">
					<?php $signUp->profileSignUpFields(); ?>
				</div>
				
				<div class="control-group">
					<?php $signUp->doCaptcha(true); ?>
				</div>

				
			<input type="hidden" name="token" value="<?php echo $_SESSION['bridge']['token']; ?>"/>
			<button type="submit" class="btn btn-primary"><?php _e('Create my account'); ?></button>
		</form>
	

</div>

<?php include_once('footer.php'); ?>