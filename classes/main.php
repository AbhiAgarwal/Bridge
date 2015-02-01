<?php include_once('classes/signup.class.php'); ?>
<?php include_once('header.php'); ?>

<html>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="css/style2.css" type="text/css" media="screen"/>
<script>
document.querySelector("button").addEventListener("click", function(){
    document.querySelector("div register").style.display = "block";
});
</script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
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

@font-face {
    font-family: 'Gotham';
    src: url('fonts/Gotham-Light.otf');
    src: url('fonts/Gotham-Medium.eot?#iefix') format('embedded-opentype'),
         url('fonts/Gotham-Medium.woff') format('woff'),
         url('fonts/Gotham-medium.ttf') format('truetype'),
         url('fonts/Gotham-Medium.svg#alphamack_aoeregular') format('svg');
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'Alpha';
    src: url('fonts/alphamacaoe2-webfont.eot');
    src: url('fonts/alphamacaoe2-webfont.eot?#iefix') format('embedded-opentype'),
         url('fonts/alphamacaoe2-webfont.woff') format('woff'),
         url('fonts/alphamacaoe2-webfont.ttf') format('truetype'),
         url('fonts/alphamacaoe2-webfont.svg#alphamack_aoeregular') format('svg');
    font-weight: normal;
    font-style: normal;

}

#name, #username, #password, #email, #password_confirm{
	font-family:"PacificoRegular",Arial,sans-serif;
	font-size:30px;
	color:rgb(55,55,55);
	width:350px;
	z-index:2;
}

.input-xlarge { width: 500px; height: 20px; }

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
	border-style:none;
	background-color: transparent;
	outline:none;
	width:400px;
	height:20px;
	font-family:"BallparkWeiner",Arial,sans-serif;
	font-size:30px;
}

.input{
font-family:'Alpha';    
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

        body, html {background:#444; text-align:center; padding:50px 0;}

/* The CSS */
select {
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    height:30px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#888;
    border:none;
    outline:none;
    overflow:hidden;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
}

/* Targetting Webkit browsers only. FF will show the dropdown arrow with so much padding. */
@media screen and (-webkit-min-device-pixel-ratio:0) {
    select {padding-right:18px; overflow:hidden;}
}

label {position:relative}
label:after {
    content:'<>';
    font:11px "Gotham";
    color:#aaa;
    -webkit-transform:rotate(90deg);
    -moz-transform:rotate(90deg);
    -ms-transform:rotate(90deg);
    transform:rotate(90deg);
    right:8px; top:0px;
    padding:0 0 2px;
    position:absolute;
    pointer-events:none;
    overflow:hidden;
}
label:before {
    content:'';
    right:6px; top:0px;
    width:30px; height:30px;
    background:#f8f8f8;
    position:center;
    pointer-events:none;
    display:block;
    overflow:hidden;
}​
    </style>
            <script type="text/javascript" src="sliding.form.js"></script>
<br><br>


<div class="register" name="register" id="register" style="display: ;">
<body style="background-image:url('assets/css/bg.png');">
	<p style="background-color:#FFFFFF">
		<div class="row">
			        <div id="content">
            <div id="wrapper">
                <div id="steps">
                    <form id="formElem" name="formElem" action="main.php" method="post">
                        <fieldset class="step">
                               <left>	<h1 style="color:#800080; font-family:Gotham; font-size:45px; position:left;">Hi I'm <input type="text" class="input-xlarge" id="name" name="name" style="height:30px; width:350px; font-family:'Alpha'; font-size:35px; color:cornflowerblue; background-color: transparent; border: none; text-align: center;" maxlength="35" value="<?php echo $signUp->getPost('name'); ?>" placeholder="">
								, my NetID is <input type="email" class="input-xlarge" id="email" name="email" style="height:30px; width:100px; font-family:'Alpha'; font-size:35px; color:cornflowerblue; background-color: transparent; border: none; text-align: center;"  value="<?php echo $signUp->getPost('email'); ?>" placeholder="joh130" maxlength="6">
                                @ <select class="styled" id="email" name="email" title="Select one" style="height:40px; width:100px; font-family:'Alpha'; font-size:35px; color:cornflowerblue; background-color: transparent; border: none; text-align: center; border:0; scrolling: no; overflow:hidden;" ><option value="NYU" style="overflow:hidden;width:100px; font-family:'Alpha'; font-size:35px; color:cornflowerblue; background-color: transparent; border: none; text-align: center;" selected>nyu.edu</option><option value="Poly" style="overflow:hidden; width:100px; font-family:'Alpha'; font-size:35px; color:cornflowerblue; background-color: transparent; border: none; text-align: center;">poly.edu</option></select>.    
                                </h1><h1 style="color:#800080; font-family:Gotham; font-size:45px; position:left; text-align:center;">My username is <input type="text" class="input-xlarge" id="username" style="height:30px; width:150px; font-family:'Alpha'; font-size:35px; color:cornflowerblue; background-color: transparent; border: none; text-align: center;" name="username" maxlength="11" value="<?php echo $signUp->getPost('username'); ?>" placeholder="">
                                , and my password <input type="password" class="input-xlarge" id="password" style="height:30px; width:150px; font-family:'Alpha'; font-size:35px; color:cornflowerblue; background-color: transparent; border: none; text-align: center;" name="password" placeholder="">
                                .</h1><h1 style="color:#800080; font-family:Gotham; font-size:45px; position:left; text-align:center;">P.S also confirm your password, <input type="password" class="input-xlarge" style="height:30px; width:150px; font-family:'Alpha'; font-size:35px; color:cornflowerblue; background-color: transparent; border: none; text-align: center;" id="password_confirm" name="password_confirm" placeholder="">.
                                    <div class="control-group">
                                     <?php //$signUp->profileSignUpFields(); ?>
                                    </div>
                        </fieldset>
						<fieldset class="step">
					<?php $signUp->doCaptcha(true); ?>
                            <input type="hidden" name="token" value="<?php echo $_SESSION['bridge']['token']; ?>"/>
							<button type="submit" class="btn btn-primary"><?php _e('Next: Interests!'); ?></button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
	</div>    
    </div>
    <center style="color:black;">* We use your NetID only for verification purposes, therefore you don't have to use the same password as your NYU one.</center>

</div>
</div>
</body>

</div>
</p>
</div>
</html>
<?php include_once('footer2.php'); ?>