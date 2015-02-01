<?php include_once('header.php');

	include_once(dirname(__FILE__) . '/classes/generic.class.php');
	include_once(cINC . 'header.php');

	if(empty($_SESSION['bridge']['username'])) { header('Location: main.php'); }
	?>
<html>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/coda-slider.css">
<link rel="stylesheet" type="text/css" href="3column.css" media="screen" />
</html>
<style>h1{margin:100px;}</style>
<br>
<br>
<div class="hero-unit" style="background-color:#800080;">
	<p style="background-color:#800080;">
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				<h2>Feed</h2>
				<p>TESTTTT.</p>
				<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
				<h3>Connections</h3>
				<p>Abhi is now friends with YX.</p>
				<!-- Column 2 end -->
			</div>
			<div class="col3">
				<!-- Column 3 start -->
				<h3>Idea Stream</h3>
				<p>I'm the best ~ Zuks</p>


				<!-- Column 3 end -->
			</div>
		</div>
	</div>
</div>

</p>
</div>
<?php include_once('footer.php'); ?>