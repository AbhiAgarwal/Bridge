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

#name, #username, #password, #email1, #password_confirm{
	font-family:"PacificoRegular",Arial,sans-serif;
	font-size:30px;
	color:rgb(55,55,55);
	width:350px;
	z-index:2;
}

.input-xlarge { width: 500px; height: 20px; }

#name, #username, #password, #email1, #password_confirm a{
	color:rgb(55,55,55);
	text-decoration:none;
	cursor:pointer;
	border: 0;
}
#name, #username, #password, #email1, #password_confirm a:hover{
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
            padding:10px;
        }

        body, html {}

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
    pointer-events:none;
    display:block;
    overflow:hidden;
}​
    </style>
<?php include_once('classes/signup.class.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" /> -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<title>BridgeMe</title>
	
	<!-- ########## CSS Files ########## -->
	<!-- Screen CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/skins/style_purple.css" type="text/css" media="screen" />
	
	<!-- Framework CSS -->
	<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/text.css" type="text/css" media="screen" />
	
	<!-- UItoTop CSS -->
	<link rel="stylesheet" href="css/ui.totop.css" type="text/css" media="screen,projection" />
	
	<!-- Fancybox CSS -->
	<link rel="stylesheet" type="text/css" href="css/fancybox.css" media="screen" />
	
	<!-- ########## end css ########## -->	
	


</head>

<body id="top">
	
		<!-- Start Head Container -->
		<div class="container_12 margin">
			<?php include_once('header.php'); ?>
		</div><!-- Head Container END -->
							
	<!-- Start Container 12 -->
	<div id="main_content" class="container_12">
	
		<!-- Start Video -->
		<div class="grid_8 featured" style="padding-top: 0;margin-top: none;">
		
			<!-- Start Slider Images -->
			<div id="slider">
				<img src="nyu.jpg" alt="" title="Bridge is a platform that is trying to create a community and connect students at NYU." />
    			<img src="nyu2.jpg" alt="" title="We want to allow students to discover people they can actually meet. People who share interests, ideas and could potentially become amazing friends." />
    			<noscript>Sorry, this site requires Javascript.</noscript>
			</div><!-- Slider Images END -->   
					
		</div><!-- Video END -->
		
		<!-- Start Newsletter Signup -->
		<div class="grid_4" style="background-color:#FFFFFF">
			
			<!-- Start Background Image -->
			<div class="signup" style="background-color:#FFFFFF">
			
				<!-- Start Newsletter Box -->
				<div class="newsletter" style="background-color:#FFFFFF">
			
					<h3>Sign up!</h3>
					<!-- Start Form -->
					   <form id="formElem" name="formElem" action="main.php" method="post">
                        <fieldset class="step" style="width:250px;">
                               <h1 style="color:#800080; font-family:Gotham; font-size:20px; position:left; text-align:left;">Hi I'm </h1><input type="text" class="input-xlarge" id="name" name="name" style="height:30px; width:150px; font-family:'Alpha'; font-size:20px; color:cornflowerblue; background-color: transparent; border: none; text-align: left;" maxlength="35" value="<?php echo $signUp->getPost('name'); ?>" placeholder="">
								</h1><h1 style="color:#800080; font-family:Gotham; font-size:20px; position:left; text-align:left;"> my NetID is</h1> <h1 style="color:#800080; font-family:Gotham; font-size:20px; position:left; text-align:left;"> <input type="emailx" class="input-xlarge" id="emailx" name="emailx" style="height:30px; width:100px; font-family:'Alpha'; font-size:20px; color:cornflowerblue; background-color: transparent; border: none; text-align: left;"  value="<?php echo $signUp->getPost('email'); ?>" placeholder="joh130" maxlength="6">
                                @ <select class="styled" id="email1" name="email1" title="Select one" style="height:30px; width:100px; font-family:'Alpha'; font-size:20px; color:cornflowerblue; background-color: transparent; border: none; text-align: left; border:0; scrolling: no; overflow:hidden;" ><option value="NYU" style="overflow:hidden;width:100px; font-family:'Alpha'; font-size:20px; color:cornflowerblue; background-color: transparent; border: none; text-align: left;" selected>nyu.edu</option><option value="Poly" style="overflow:hidden; width:100px; font-family:'Alpha'; font-size:20px; color:cornflowerblue; background-color: transparent; border: none; text-align: left;">students.poly.edu</option></select>    
                                <h1 style="color:#800080; font-family:Gotham; font-size:20px; position:left; text-align:left;">My username is</h1> <input type="text" class="input-xlarge" id="username" style="height:30px; width:150px; font-family:'Alpha'; font-size:20px; color:cornflowerblue; background-color: transparent; border: none; text-align: left;" name="username" maxlength="11" value="<?php echo $signUp->getPost('username'); ?>" placeholder="">
                                 <h1 style="color:#800080; font-family:Gotham; font-size:20px; position:left; text-align:left;">and my password</h1> <input type="password" class="input-xlarge" id="password" style="height:30px; width:150px; font-family:'Alpha'; font-size:20px; color:cornflowerblue; background-color: transparent; border: none; text-align: left;" name="password" placeholder="">
                                <h1 style="color:#800080; font-family:Gotham; font-size:20px; position:left; text-align:left;">and confirm your password</h1> <input type="password" class="input-xlarge" style="height:30px; width:150px; font-family:'Alpha'; font-size:20px; color:cornflowerblue; background-color: transparent; border: none; text-align: left;" id="password_confirm" name="password_confirm" placeholder="">
                        </fieldset>
						<fieldset class="step" style="width:200px;">
					<?php $signUp->doCaptcha(true); ?>
                            <input type="hidden" name="token" value="<?php echo $_SESSION['bridge']['token']; ?>"/>
							<button type="submit" class="btn btn-primary"><?php _e('Next: Interests!'); ?></button>
                        </fieldset>
                    </form>


					<!-- Form END -->
					
					<div class="clear"></div><!-- CLEAR -->
				
				</div><!-- Newsletter Box END -->
			
			</div><!-- Background Image END-->
			
		</div><!-- Newsletter Signup END -->
		
		<div class="clear"></div><!-- CLEAR -->
		
		<!-- Start Box 1 -->
		<div class="grid_4">
		<div class="box">
			<h3>What is Bridge?</h3>
			<hr />
			<p>Bridge is a platform that allows you to interact with the NYU community through similar interests and ideas. Our analogy of the Bridge came from the connections we are attempting to make between individuals from diverse backgrounds and talents.</p>
		</div>
		</div><!-- Box 1 END -->
		
		<!-- Start Box 2 -->
		<div class="grid_4">
		<div class="box">
			<h3>Mission</h3>
			<hr />
			<p>Our mission is to be able to increase efficiency in searching, posting, and viewing ideas and individuals in the NYU community. We want students with different interets and ideas to come together and give birth to ideas. </p>
		</div>
		</div><!-- Box 2 END -->
		
		<!-- Start Box 3 -->
		<div class="grid_4">
		<div class="box">
			<h3>NYUCollab</h3>
			<hr />
			<p>NYUCollab is our secondary platform that will allow students at NYU to share their ideas and collaborate alongside their teammates. </p>
		</div>
		</div><!-- Box 3 END -->
		
		<div class="clear"></div><!-- CLEAR -->
		
		<!-- Start Features 1 -->
		<div class="grid_6">
		</div><!-- Features 1 END -->
		
		<!-- Start Features 2 -->		
		<div class="clear"></div><!-- CLEAR -->
						
	</div><!-- Container 12 END-->
	
	<div class="clear"></div><!-- CLEAR -->
	<br><br>
	<!-- Start Footer Bottom -->
	<?php include_once('footer2.php'); ?>
    <!-- Clearfix -->    
	<div class="clear"></div>
<br>
		
<!-- IE fix -->
<script type="text/javascript"> Cufon.now(); </script>	
	<!--[if IE 7]>
	<link rel="stylesheet" href="css/ie7.css" type="text/css" />
 	<![endif]-->
 	
 	<!--[if lt IE 8]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
	<![endif]-->
	
	<!-- Jquery -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

	<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
	
	<!-- UItoTop -->
	<script type="text/javascript" src="js/jquery.ui.totop.js"></script>
	<!-- easing plugin ( optional ) -->
	<script src="js/easing.js" type="text/javascript"></script>
	
	<!-- Cufon Font Replacement -->
	<script type="text/javascript" src="js/cufon.js"></script>
	<script type="text/javascript" src="js/Bebas_Neue_400.font.js"></script>
	
	<!-- To customise any of the above, please use this file -->
	<script type="text/javascript" src="js/custom.js"></script>

    <!-- Nivo Slider -->
	<!-- http://nivo.dev7studios.com/ -->
	<script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
    
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'moccaUItoTop', // fading element id
				containerHoverClass: 'moccaUIhover', // fading element hover class
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
</body>
</html>
