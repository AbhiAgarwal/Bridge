<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<script type="text/javascript" src="jquery-1.2.6.min.js"></script>

<link rel="stylesheet" type="text/css" media="screen" href="css.css" />

</head>

<script language="javascript">

$(document).ready(function(){

	//show loading bar

	function showLoader(){

		$('.search-background').fadeIn(200);

	}

	//hide loading bar

	function hideLoader(){

		$('#sub_cont').fadeIn(1500);

		$('.search-background').fadeOut(200);

	};

	

	$('#search').keyup(function(e) {

  

      if(e.keyCode == 13) {

  

      	showLoader();

		$('#sub_cont').fadeIn(1500);

		$("#content #sub_cont").load("search.php?val=" + $("#search").val(), hideLoader());



      }

  

      });

	  

	$(".searchBtn").click(function(){

	

		//show the loading bar

		showLoader();

		$('#sub_cont').fadeIn(1500);

		  

		$("#content #sub_cont").load("search.php?val=" + $("#search").val(), hideLoader());



	});

});

</script>

<body>

	<div class="textBox">

        <input type="text" value="" maxlength="100" name="searchBox" id="search">

		<div class="searchBtn">

		&nbsp;

		</div>

    </div>

	<br clear="all" />

	<div id="content">

		<div class="search-background">

			<label><img src="loader.gif" alt="" /></label>

		</div>

		<div id="sub_cont">

		

		</div>

	</div>

	

	

<br clear="all" /><br clear="all" /><br clear="all" />


</body>

</html>

