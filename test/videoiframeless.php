<?php 
$url=$_GET["url"];
//the 2>&1 at the end of the command is to capture any error if that occurs
$script='youtube-dl -f best -g '.$url.' 2>&1';
//this dosent work in php safe mode, this was testit in a linux OS and work fine
//check the permissions of the user that runs the server, they have to have permission to exec the youtube-dl command
$output = exec($script);
echo "<pre>THE URL IS: $output</pre><br>";
?>
