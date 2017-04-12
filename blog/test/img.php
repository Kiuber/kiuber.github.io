<?php

$filename="https://alpha.wallhaven.cc/wallpaper/200000";
$subject=file_get_contents($filename);
$pattern = '<img id="wallpaper" src="(.*)" alt=".*"/>';

if (preg_match_all($pattern,$subject,$matches)) {
	$img_url = "http:".$matches[1][0];
	echo $img_url;
	$data = file_get_contents($img_url);
	date_default_timezone_set("UTC");
	$time = date('Y-m-d H:i:s',time());
	$pic_num = strrpos($img_url, "/");
	$filename = "wallhaven.cc".$time.substr($img_url, $pic_num+1);
	file_put_contents($filename, $data);
}
?>
