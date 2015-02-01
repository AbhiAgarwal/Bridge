<div class="container_12 margin">
<?php 
session_start();
include_once("idea_header.php");
include_once("idea_functions.php");
?>
</div>
<br>
<br>
<br>
<?
$id = $_GET["id"];

$username = mysql_query("SELECT * FROM  login_users 
WHERE username IN (
    SELECT username FROM login_users WHERE user_id ='$id')");

$username1 = mysql_fetch_assoc($username);

$name = mysql_query("SELECT * FROM  login_users 
WHERE name IN (
    SELECT name FROM  login_users WHERE user_id ='$id')");

 $name1 = mysql_fetch_assoc($name);

$college = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='1')");

$college1 = mysql_fetch_assoc($college);

$year = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='2')");

$year1 = mysql_fetch_assoc($year);

$major = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='3')");

$major1 = mysql_fetch_assoc($major);

$twitter = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='7')");

$twitter1 = mysql_fetch_assoc($twitter);


$pinterest = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='9')");

$pinterest1 = mysql_fetch_assoc($pinterest);

$youtube = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='10')");

$youtube1 = mysql_fetch_assoc($youtube);

$tumblr = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='12')");

$tumblr1 = mysql_fetch_assoc($tumblr);

$flickr = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='11')");

$flickr1 = mysql_fetch_assoc($flickr);

$digg = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='13')");

$digg1 = mysql_fetch_assoc($digg);

$vimeo = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='14')");

$vimeo1 = mysql_fetch_assoc($vimeo);

$dribble = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='15')");

$dribble1 = mysql_fetch_assoc($dribble);

$interestx = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='16')");

$interest1 = mysql_fetch_assoc($interestx);

$interesty = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='17')");

$interest2 = mysql_fetch_assoc($interesty);

$interestz = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='18')");

$interest3 = mysql_fetch_assoc($interestz);

$web = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='4')");

$web1 = mysql_fetch_assoc($web);

$desktop = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='5')");

$desktop1 = mysql_fetch_assoc($desktop);

$design = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id ='$id' AND pfield_id='6')");

$design1 = mysql_fetch_assoc($design);

$avatar = mysql_query("SELECT * FROM login_users 
WHERE avatar IN (
    SELECT avatar FROM login_users WHERE user_id ='$id')");

$avatar1 = mysql_fetch_assoc($avatar);
$backupt = "NYUWeinstein";
$backupC = "New York University";
$backupP = "in the Liberal Studies Program";
$norm1 = "4";
$norm2 = "6";

$interest1B = "Facebook";
$interest2B = "Twitter";
$interest3B = "BridgeMe";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
<head>
	<link rel="stylesheet" type="text/css" href="nprofile.css" media="screen" />
		<style type="css/text">
picturebox1{
   position:absolute;
   right:500px;
   top  :150px;
}
</style>
	<style type="text/css">
		#images .current {
			display: block;
			text-align: center;
			margin: 0 auto;
		}
		
		#images .current img {
			max-height: 100%;
			max-width: 100%;
		}
	</style>

<link type="text/css" rel="stylesheet" href="css/colorbox.css" />

<link type="text/css" rel="stylesheet" href="css/dpSocialTimeline.css" />

<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/skins/style_purple.css" type="text/css" media="screen" />
    
    <!-- Framework CSS -->
    <link rel="stylesheet" href="css/text.css" type="text/css" media="screen" />
    
    <!-- UItoTop CSS -->
    <link rel="stylesheet" href="css/ui.totop.css" type="text/css" media="screen,projection" />
    
    <!-- Fancybox CSS -->
    <link rel="stylesheet" type="text/css" href="css/fancybox.css" media="screen" />


<style type="css/text">
img#left_img {
  float:right;
  margin:5px 10px 5px 0px;

}
</style>
</head>
<body>
<div id="content">
<div id="header">
<h1 style="color:white;">Hi, <? if(empty($name1)) {echo "I currently do not exist!";}else{ echo "I'm " . $name1['name'] . "! ->";} ?> <img id="left_img" style="position:right; background-image: url('images/bg_image.jpg');" src="<? echo $avatar1['avatar'] ?>"> </h1>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				
				<div id="socialTimeline" style=""></div>
				<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
				<h2>About Me</h2>
				        	<?

        	if(empty($college1)){$cvalue = $backupC; }else{$cvalue = $college1['profile_value'];};
        	if(empty($major1)){$mvalue = $backupP; }else{$mvalue = $major1['profile_value'];};

        	?>

        <h3 style="color:white;"><? if(empty($name1)) {echo "";} else { echo "I am currently a student in " . $cvalue . " studying " . $mvalue . "."; } ?></h3>

<br>

        	<?
			if(empty($interest3)){$cinterest = $interest1B; } else{$cinterest = $interest3['profile_value'];};
        	if(empty($interest2)){ $cinterest2 = $interest2B; } else{ $cinterest2 = $interest2['profile_value'];};
        	if(empty($interest1)){$cinterest3 = $interest3B; } else{$cinterest3 = $interest1['profile_value'];};
        	?>
        	<h2>Interests</h2>
        <h3 style="color:white;"><? if(empty($name1)) { echo ""; } else { echo "I live for " . $cinterest . ", " . $cinterest2 . ", and especially for " . $cinterest3 . "."; }; ?></h3>

				<!-- Column 2 end -->
			</div>
			<div class="col3">
				<!-- Column 3 start -->
				<h2>Skill</h2>
<h3 style="color:white;"> 
        <?
	$desktopt = false;
	$designt = false;
	$webt = false;
if(!empty($name1))
{

        if(empty($web1))
        {
        	if(!empty($desktop1)){
        		echo $desktop1['profile_value'];
        		$desktopt = false;
        	}
        	else
        	{
        		echo $design1['profile_value'];
        		$designt = true;
        	}
        	
        }
        else
        {
			echo $web1['profile_value'];
			$webt = true;

        }
}

        ?>
    </h3>

<br>

<h3 style="color:white;"> 
        <?
if(!empty($name1))
{
        if(!empty($desktop1) && $desktopt == false)
        {
        		echo $desktop1['profile_value'];
        		$desktopt = true;
        	}
        	else
        	{
        		if(!empty($design1) && $designt == false){
        		echo $design1['profile_value'];
        		$designt = true;
        	}
        	}

}

        ?>
    </h3>

    <br>

<h3 style="color:white;"> 
        <?
if(!empty($name1))
{
      if(!empty($design1) && $designt == false){
        	echo $design1['profile_value'];
        	$designt = true;
       }
        	

}

        ?>
    </h3>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

<script type="text/javascript" src="js/jquery.colorbox.min.js"></script>

<script type="text/javascript" src="js/jquery.isotope.min.js"></script>

<script type="text/javascript" src="js/jquery.dpSocialTimeline.js"></script>

<script type="text/javascript" src="js/reddit.js"></script>

<link type="text/css" rel="stylesheet" href="css/styles.css" />

    <script type="text/javascript">
        $(document).ready(function() {
            <?php if (isset($_GET["r"])): ?>
            subreddit = "<?= $_GET["r"] ?>";
            <?php elseif (isset($_GET["url"])): ?>
            customUrl = "<?= $_GET["url"] ?>";
            <?php else: ?><?php endif; ?>
            
            loadImages(null);
        });
    </script>

<script type="text/javascript">

var twitter ="<?php if(empty($twitter1)) { echo $backupt; } else { echo $twitter1['profile_value'];} ?>";
var pinterest ="<?php echo $pinterest1['profile_value']; ?>";
var youtube ="<?php echo $youtube1['profile_value']; ?>";
var tumblr ="<?php echo $tumblr1['profile_value']; ?>";
var digg ="<?php echo $digg1['profile_value']; ?>";
var vimeo ="<?php echo $vimeo1['profile_value']; ?>";
var dribble ="<?php echo $dribble1['profile_value']; ?>";

    $(document).ready(function(){
        
        $('#socialTimeline').dpSocialTimeline({
            feeds: 
            {
                'twitter': {data: twitter, limit: <?php if(empty($twitter1)) { echo $norm2; } else { echo $norm1;} ?>},
                'pinterest': {data: pinterest, limit: 4},
                'youtube': {data: youtube, limit: 2},
                'tumblr': {data: tumblr, limit: 6}, 
                'digg': {data: digg, limit: 2},     

            },
            custom: 
            { 

            },
            layoutMode: 'timeline',
            itemWidth: 200,
            skin: 'light',
            showFilter: true,
            showLayout: false,
            total: 10,
            addColorbox: true
        });
    });
</script>
				<!-- Column 3 end -->
			</div>
		</div>
	</div>
</div>
</body>
</html>
</div> <!-- /.span9 -->
	</div> <!-- /.row -->
</div> <!-- /.container -->
</div>

	<!-- Le javascript -->
	<script src="assets/js/bootstrap-transition.js"></script>
	<script src="assets/js/bootstrap-collapse.js"></script>
	<script src="assets/js/bootstrap-modal.js"></script>
	<script src="assets/js/bootstrap-dropdown.js"></script>
	<script src="assets/js/bootstrap-button.js"></script>
	<script src="assets/js/bootstrap-tab.js"></script>
	<script src="assets/js/bootstrap-alert.js"></script>
	<script src="assets/js/bootstrap-tooltip.js"></script>
	<script src="assets/js/jquery.ba-hashchange.min.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/jquery.placeholder.min.js"></script>
	<script src="assets/js/jquery.bridge.js"></script>

  </body>
</html>
<?php ob_flush(); ?>