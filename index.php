<?php include_once('header.php'); ?>
<?php include_once('classes/check.class.php'); ?>
<?php if( protectThis("*") ) : ?>
<? header( 'Location: home.php' ); exit; ?>
<?php endif; ?>


<?php header('Location: main.php'); ?>
<?php
include 'mobilecheck/Mobile_Detect.php';
$detect = new Mobile_Detect();
if ($detect->isMobile()) {
    header( 'Location: http://www.bridgeme.co/mobile/index.php' );
    exit;
}
if($detect->isTablet()){
    header( 'Location: http://www.bridgeme.co/tablet/index.php' );
    exit;
}
?>