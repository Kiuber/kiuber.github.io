<?php

$filename="http://s.qdcdn.com/c/14259500,2700,1280.jpg";
$subject=file_get_contents($filename);

date_default_timezone_set("UTC");
$time = date('Y-m-d H:i:s',time());
file_put_contents($time.".jpg", $subject);
?>
