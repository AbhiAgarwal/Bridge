<?php 
session_start();
include_once("idea_header.php");
include_once("idea_functions.php");
?>
<br>
<br>
<?
$id = $_GET["id"];

$result = mysql_query("SELECT * FROM login_posts 
WHERE body IN (
    SELECT body FROM login_posts WHERE id='$id'
)");

 $row = mysql_fetch_assoc($result);
 print_r($row[body]);


?>
<br>
<br>

 <div id="disqus_thread"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'abhiagarwal'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
