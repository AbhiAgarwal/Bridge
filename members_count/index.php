<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<title>BridgeMe - How Many Members?</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<?php

            $server = mysql_connect("localhost","", "");
            $db =  mysql_select_db("",$server);
            $query = mysql_query("select count(*) from login_users");
            $row = mysql_fetch_array($query);
?>
<?php
            $n1 = $row[0];
            $n2 = "38391";
?>

<style>
    #number1{
        font-size: 900%;
    }

    #number2{
        font-size: 500%;
    }

    .total{
        width: 100%;
    }

    .label {
        color: #6aa135;
        font-size: 24px;
        padding-top: 10px;
        padding-bottom: 10px;
        font-family:Georgia, "Times New Roman", Times, serif;
        font-style:italic;
    }

    .count {
        text-shadow: 0 -1px 0 #72a441;
        color:#8cce5b;
        font-weight:700;
    }

    #position {
        display: table-cell;
        vertical-align: middle;
        text-align: center;
    }
</style>

</head>
<body>
<div id="position">
        <div id="content">
            <center>
            <div class="total">
                <div class="label">Members we have</div>
                <div id="number1" class="count"><? echo $n1 ?></div>
                <br><br><br>
                 <div class="label">Members to go</div>
                <div id="number2" class="count"><? echo $n2-$n1 ?></div>
            </center>
            </div>
        </div>
    </div>
</center>
</body>
</html>