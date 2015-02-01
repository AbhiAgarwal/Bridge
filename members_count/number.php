<?php

            $server = mysql_connect("localhost","", "");
            $db =  mysql_select_db("",$server);
            $query = mysql_query("select count(*) from login_users");
            $row = mysql_fetch_array($query);
?>
<?php
	$total_data = array(
		array(
			'n1' => "$row[0]",
			'n2' => "40000"
		 ),	
	);	
	echo $_GET['jsonp'].'('. json_encode($total_data) . ')';  
?>