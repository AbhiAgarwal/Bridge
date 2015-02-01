<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
<?php

function IsNullOrEmptyString($question){
    return (!isset($question) || trim($question)==='');
}

function checkValues($value)
{
	 // Use this function on all those values where you want to check for both sql injection and cross site scripting
	 //Trim the value
	 $value = trim($value);
	 
	// Stripslashes
	if (get_magic_quotes_gpc()) {
		$value = stripslashes($value);
	}
	
	 // Convert all &lt;, &gt; etc. to normal html and then strip these
	 $value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
	
	 // Strip HTML Tags
	 $value = strip_tags($value);
	
	// Quote the value
	$value = mysql_real_escape_string($value);
	return $value;
	
}	

include("dbcon.php");

$rec = checkValues($_REQUEST['val']);

if(IsNullOrEmptyString($rec) == true) {
echo "Enter something please!";
}
else
{
//get table contents


if($rec)

{

	$sql = "select * from login_profiles where profile_value like '%$rec%'";

}

else

{

	$sql = "select * from login_profiles";

}



$rsd = mysql_query($sql);

$total =  mysql_num_rows($rsd);

?>


<?php

while ($rows = mysql_fetch_assoc($rsd))


{
	?>
<div id="user_list">
	<tr>
	<td><a href="../profile.php?uid=<?php echo $rows['user_id'];?>" ><?php echo $rows['profile_value'];?></a></div></td>
</tr>
</div>
<?php

}

if($total==0){ echo 'No Record Found !';}
}

?>