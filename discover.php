<div class="container_12 margin">
<?
session_start();
include_once('header.php');
?>
</div>
<?php include_once('admin/classes/ugeneration.php'); ?>

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
<?

function getSmallProfile($id) {

$name = mysql_query("SELECT * FROM  login_users 
WHERE name IN (
    SELECT name FROM  login_users WHERE user_id ='$id')");

$name1 = mysql_fetch_assoc($name);

$avatar = mysql_query("SELECT * FROM login_users 
WHERE avatar IN (
    SELECT avatar FROM login_users WHERE user_id ='$id')");

$avatar1 = mysql_fetch_assoc($avatar);

$profile = array(
    "name" => $name1['name'],
    "avatar" => $avatar1['avatar'],
    "id" => $id,
);

return $profile;

}

?>

<html>
        <style type="text/css">

            .clear{
                clear:both;
            }

            #grid{
                width: 600px;
            }

            .grid-element{
                width:200px;
                float:left;
            }


        </style>
<br><br>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="2column.css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/skins/style_purple.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/text.css" type="text/css" media="screen" /></html>
<body style="background-color:#800080;">
    <br><br>
<div class="colmask leftmenu">
    <div class="colleft">
        <div class="col1">
            <!-- Column 1 start -->

                        <center><h2>Discover Individuals</h2></center>
<br><br>

<? 

$profile1 =  getSmallProfile(1); 
$profile2 =  getSmallProfile(6); 
$profile3 =  getSmallProfile(9); 
$profile4 =  getSmallProfile(10); 
$profile5 =  getSmallProfile(16); 
$profile6 =  getSmallProfile(8); 


?>
                    <div id="grid">
            <div class="grid-element">
              <a href="nprofile.php?id=<? echo $profile1['id']; ?>"> <center> <img src="<? echo $profile1['avatar'] ?>"/><br></a>
                <span><? echo $profile1['name'] ?></span>
            </div>

            <div class="grid-element">
                <a href="nprofile.php?id=<? echo $profile2['id']; ?>"> <center> <img src="<? echo $profile2['avatar'] ?>"/><br></a>
                <span><? echo $profile2['name'] ?></span>
            </div>

            <div class="grid-element">
               <a href="nprofile.php?id=<? echo $profile3['id']; ?>">  <center> <img src="<? echo $profile3['avatar'] ?>"/><br></a>
                <span><? echo $profile3['name'] ?></span>
                </div><br><br>

                            <div class="grid-element">
                <a href="nprofile.php?id=<? echo $profile4['id']; ?>"><center> <img src="<? echo $profile4['avatar'] ?>"/><br></a>
                <span><? echo $profile4['name'] ?></span>
                </div>

                            <div class="grid-element">
                <a href="nprofile.php?id=<? echo $profile5['id']; ?>"><center> <img src="<? echo $profile5['avatar'] ?>"/><br></a>
                <span><? echo $profile5['name'] ?></span>
                </div>

                                            <div class="grid-element">
               <a href="nprofile.php?id=<? echo $profile6['id']; ?>"> <center> <img src="<? echo $profile6['avatar'] ?>"/><br></a>
                <span><? echo $profile6['name'] ?></span>
                </div>

<br><br>
        </div>

        <div class="clear"></div>
            
            <!-- Column 1 end -->
        </div>
        <div class="col2">
            <!-- Column 2 start -->
            <h2>Interests</h2>
            <p>Computer Science [x]</p>
            <p>Physics [x]</p>
            <p>Marketing [x]</p>
            <p>Technology [x]</p>
            <p>Sports [x]</p>
           
                      <br>
            <h2>Skills</h2>
            <p>Theatre [x]</p>
            <p>Python [x]</p>
            <p>Photoshop [x]</p>
            <!-- Column 2 end -->
        </div>
    </div>
</div>

</div>
</p>
<br>
    <script type="text/javascript" src="js/Bebas_Neue_400.font.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
        <style type="text/css">
            tr.header
            {
                font-weight:bold;
            }
            tr.alt
            {
                background-color: #800080;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
               $('.striped tr:even').addClass('alt');
            });
        </script>
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
<?php include_once('footer.php'); ?>