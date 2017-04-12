<?php

$subject = $_GET["subject"];
$pattern = $_GET["pattern"];
$pattern = "#".$pattern."#";


if ($subject!=""&&$pattern!="") {
	if(preg_match_all($pattern,$subject,$matches)){
		print_r($matches);
	}else{
		echo "res:".$res.$subject.$pattern;
		echo "匹配错误";
		echo "<br>";
		echo $matches;
	}
}else{
	echo "参数不合法";
}
?>