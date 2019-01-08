<?php
$myfile = fopen("last.txt", "w") or die("Unable to open file!");
$txt = $_GET['data'].",".(string)time();
fwrite($myfile, $txt);
fclose($myfile);
?>
