<?php include_once('header.php'); ?>
<?php include_once('admin/classes/ugeneration.php'); ?>

<html>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" media="screen" href="phpsearch/css.css" />
<script type="text/javascript" src="phpsearch/jquery-1.2.6.min.js"></script>
<style type="text/css">
.cf:before, .cf:after{
    content:"";
    display:table;
}
 
.cf:after{
    clear:both;
}
 
.cf{
    zoom:1;
}    

/* Form wrapper styling */
.form-wrapper {
    width: 450px;
    padding: 15px;
    margin: 100px auto 50px auto;
    background: #444;
    background: rgba(0,0,0,.2);
    border-radius: 10px;
    box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
}
 
/* Form text input */
 
.form-wrapper input {
    width: 400px;
    height: 20px;
    padding: 10px 5px;
    float: left;   
    font: bold 15px 'lucida sans', 'trebuchet MS', 'Tahoma';
    border: 0;
    background: #eee;
    border-radius: 3px 0 0 3px;     
}
 
.form-wrapper input:focus {
    outline: 0;
    background: #fff;
    box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
}
 
.form-wrapper input::-webkit-input-placeholder {
   color: #999;
   font-weight: normal;
   font-style: italic;
}
 
.form-wrapper input:-moz-placeholder {
    color: #999;
    font-weight: normal;
    font-style: italic;
}
 
.form-wrapper input:-ms-input-placeholder {
    color: #999;
    font-weight: normal;
    font-style: italic;
}   
 
/* Form submit button */
.form-wrapper button {
    overflow: visible;
    position: relative;
    float: right;
    border: 0;
    padding: 0;
    cursor: pointer;
    height: 40px;
    width: 110px;
    font: bold 15px/40px 'lucida sans', 'trebuchet MS', 'Tahoma';
    color: #fff;
    text-transform: uppercase;
    background: #d83c3c;
    border-radius: 0 3px 3px 0;     
    text-shadow: 0 -1px 0 rgba(0, 0 ,0, .3);
}  
   
.form-wrapper button:hover{    
    background: #e54040;
}  
   
.form-wrapper button:active,
.form-wrapper button:focus{  
    background: #c42f2f;
    outline: 0;  
}
 
.form-wrapper button:before { /* left arrow */
    content: '';
    position: absolute;
    border-width: 8px 8px 8px 0;
    border-style: solid solid solid none;
    border-color: transparent #d83c3c transparent;
    top: 12px;
    left: -6px;
}
 
.form-wrapper button:hover:before{
    border-right-color: #e54040;
}
 
.form-wrapper button:focus:before,
.form-wrapper button:active:before{
        border-right-color: #c42f2f;
}     
 
.form-wrapper button::-moz-focus-inner { /* remove extra button spacing for Mozilla Firefox */
    border: 0;
    padding: 0;
}    
</style>
</html>
<center>
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

		$("#content #sub_cont").load("phpsearch/search.php?val=" + $("#search").val(), hideLoader());



      }

  

      });

	  

	$(".searchBtn").click(function(){

	

		//show the loading bar

		showLoader();

		$('#sub_cont').fadeIn(1500);

		  

		$("#content #sub_cont").load("phpsearch/search.php?val=" + $("#search").val(), hideLoader());



	});

});

</script>

	<p style="background-color:#FFFFFF">
		<div class="form-wrapper cf">

        <input type="text" value="" maxlength="100" name="searchBox" placeholder="Search here..." id="search" required>

 <button type="submit" class="searchBtn">Search</button>
    </div>

	<br clear="all" />

	<div id="content">

		<div class="search-background">

			<label><img src="phpsearch/loader.gif" alt="" /></label>

		</div>

		<div id="sub_cont">

		

		</div>

	</div>
	<br clear="all" /><br clear="all" /><br clear="all" />
</center>

</p>
<hr>
<br><tr>
<?php include_once('footer.php'); ?>