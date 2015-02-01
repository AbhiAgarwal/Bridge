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

$id = $_GET["uid"];
$number = $_GET["number"];

if (empty($_GET["uid"])) {
   	print_r("Please enter a user ID");
}

$result = mysql_query("SELECT * FROM login_users 
WHERE username IN (
    SELECT username FROM login_users WHERE user_id='$id'
)");

 $row = mysql_fetch_assoc($result);

 $interest = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id='$id' AND pfield_id = '7'
)");

  $interest2 = mysql_fetch_assoc($interest);

   $school = mysql_query("SELECT * FROM login_profiles 
WHERE profile_value IN (
    SELECT profile_value FROM login_profiles WHERE user_id='$id' AND pfield_id = '1'
)");

  $school2 = mysql_fetch_assoc($school);
?>

    <?php
            $mail_to_send_to = "dropbox@nexious.com";
            $your_feedbackmail = "dropbox@nexious.com";
            
                    $email = "dropbox@nexious.com";
                    $message = "The users name is ".$row['name'] . " he/she goes to " . $school2['profile_value'] . ", and his/her email is " .$row['email'] . "." ;
                    $headers = "From: $your_feedbackmail" . "\r\n" . "Reply-To: $email" . "\r\n" ;
                    $a = mail( $mail_to_send_to, $number, $message, $headers );
                    if ($a)
                    {
                         print("Message was sent, you can send another one");
                    } else {
                         print("Message wasn't sent, please check that you have changed emails in the bottom");
                    }
            
    ?>
