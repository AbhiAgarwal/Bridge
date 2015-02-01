<?php include_once('classes/signup.class.php'); ?>
<?php include_once('header.php'); ?>
<html>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="css/style2.css" type="text/css" media="screen"/>

<style>
		#section1{
	padding:30px;
	width:1000px;
	margin:0 auto;
	color:rgb(55,55,55);
}
#section1 h1{
	font-family:"BebasRegular", Arial, sans-serif;
	font-size:20px;
	font-weight:500;
	z-index:2;
}
#name, #username, #password, #email, #password_confirm{
	font-family:"PacificoRegular",Arial,sans-serif;
	font-size:30px;
	color:rgb(55,55,55);
	width:250px;
	z-index:2;
}

.input-xlarge { width: 400px; height: 20px; }

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
	width:100px;
	height:20px;
	font-family:"BallparkWeiner",Arial,sans-serif;
	font-size:30px;
}

	</style>

	<style>
        span.reference{
            position:fixed;
            left:5px;
            top:5px;
            font-size:10px;
            text-shadow:1px 1px 1px #fff;
        }
        span.reference a{
            color:#555;
            text-decoration:none;
			text-transform:uppercase;
        }
        span.reference a:hover{
            color:#000;
            
        }
        h1{
            color:#ccc;
            font-size:20px;
            text-shadow:1px 1px 1px #fff;
            padding:20px;
        }
    </style>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="sliding.form.js"></script>


<body style="background-image:url('assets/css/bg.png');">
	<div class="hero-unit" style="background-image:url('assets/css/bg.png');">
	<p style="background-color:#FFFFFF">
		<div class="row">
			        <div id="content">
            <div id="wrapper">
                <div id="steps">
                    <form id="formElem" name="formElem" action="home.php" method="post">
                        <fieldset class="step">
                               	<h1>Hi, I'm,</h1><input type="text" class="input-xlarge" id="name" name="name" style="height:30px" value="<?php echo $signUp->getPost('name'); ?>" placeholder="">
								<h1>make my username,</h1><input type="text" class="input-xlarge" id="username" style="height:30px" name="username" maxlength="15" value="<?php echo $signUp->getPost('username'); ?>" placeholder="">,</h1>
                                <h1>my email is,</h1><input type="email" class="input-xlarge" id="email" name="email" style="height:30px"  value="<?php echo $signUp->getPost('email'); ?>" placeholder="">
                                <h1>and my password,</h1><input type="password" class="input-xlarge" id="password" style="height:30px" name="password" placeholder="">
                                <h1>finally confirm your password,</h1><input type="password" class="input-xlarge" style="height:30px" id="password_confirm" name="password_confirm" placeholder="">
                        </fieldset>
                        <fieldset class="step">
                            	<?php $signUp->profileSignUpFields(); ?>
                        </fieldset>
						<fieldset class="step">
					<?php $signUp->doCaptcha(true); ?>
                            <input type="hidden" name="token" value="<?php echo $_SESSION['bridge']['token']; ?>"/>
                            <p> Now you're offically going to become a part of Bridge! Welcome to our community</p>
							<button type="submit" class="btn btn-primary"><?php _e('Build Your Bridge'); ?></button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
	</div>    
    </div>
</div>
  </body>

</div>
</p>
</div>
</html>
<?php include_once('footer2.php'); ?>