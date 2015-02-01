<?php include_once('header.php'); ?>
<?php include_once('admin/classes/ugeneration.php'); ?>
        <?php

            $server = mysql_connect("localhost","", "");
            $db =  mysql_select_db("",$server);
            $query = mysql_query("select * from login_users");
        ?>

<html>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
        <style type="text/css">
            tr.header
            {
                font-weight:bold;
            }
            tr.alt
            {
                background-color: #777777;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
               $('.striped tr:even').addClass('alt');
            });
        </script>
</html>
	<p style="background-color:#FFFFFF">
		<div class="hero-unit" style="background-image:url('assets/css/bg.png');">
			        <table class="striped">
            <tr class="header">
                <td>Id</td>
                <td>Name</td>
            </tr>
        <?php
           $i = 0;
           while ($row = mysql_fetch_array($query)) {
               $class = ($i == 0) ? "" : "alt";
               echo "<tr class=\"".$class."\">";
               echo "<td>".$row['name']."</td>";
               echo "</tr>";
               $i = ($i==0) ? 1:0;
           }

        ?>
        </table>
</div>
</p>
<br>
<?php include_once('footer.php'); ?>