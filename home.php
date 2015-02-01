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
<div class="hero-unit" style="background-color:#800080;">
	<p style="background-color:#800080;">
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
				<h3>Feed</h3>
				<blockquote class="twitter-tweet"><p>@<a href="https://twitter.com/mb">mb</a> @<a href="https://twitter.com/brianhax">brianhax</a> - Thanks for the amazing presentation today on the iPhone app! It was inspiring to see such young people working on it!</p>&mdash; Abhi Agarwal (@AbhiAgarwal) <a href="https://twitter.com/AbhiAgarwal/status/277262665922015233" data-datetime="2012-12-08T04:05:45+00:00">December 8, 2012</a></blockquote>
<script src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<blockquote class="twitter-tweet"><p>I need a better twitter client than tweetdeck for iOS. Any suggestions?</p>&mdash; Josh Nussbaum (@josh_nussbaum) <a href="https://twitter.com/josh_nussbaum/status/276573021454606336" data-datetime="2012-12-06T06:25:21+00:00">December 6, 2012</a></blockquote>
				<!-- Column 1 end -->
			</div>
			<div class="col2">
				<!-- Column 2 start -->
				<blockquote style="border-left: 0; border-right: 5px solid #eeeeee; text-align:right;"><h3>Connections</h3></blockquote>
				<blockquote style="border-left: 0; border-right: 5px solid #eeeeee; text-align:right;">Josh became friends with Jonathan.</blockquote>
				<blockquote style="border-left: 0; border-right: 5px solid #eeeeee; text-align:right;">You are now friends with Josh.</blockquote>
				<!-- Column 2 end -->
			</div>
			<div class="col3">
				<!-- Column 3 start -->
				<blockquote><h3>Idea Stream</h3></blockquote>
				<blockquote>Abhi posted a new idea <i>"An iPhone case with holes on it that allows you to accessories it."</i></blockquote>
				<blockquote>Josh posted a new idea <i>"Medical iPhone addon."</i></blockquote>
				<blockquote>Jonathan posted a new idea <i>"Clip-on Earbud Cord Holder."</i></blockquote>
				<blockquote>Sarah posted a new idea <i>"A robot that is simply legendary."</i></blockquote>
				<!-- Column 3 end -->
			</div>
		</div>
	</div>
</div>

</p>
</div>
<h3>
<?php include_once('footer.php'); ?>