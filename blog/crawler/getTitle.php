<?php

$url = $_GET["url"];
$pattern = $_GET["pattern"];

if ($url != "") {
    if ($pattern == "") {
        $pattern = "#<title>(.*)</title>#";
        $subject = file_get_contents($url);
        if (preg_match_all($pattern, $subject, $matches)) {
            echo $matches[1][0];
            // print_r($matches);
        } else {
            echo "匹配错误";
        }
    } else {
        $subject = file_get_contents($url);
        if (preg_match_all($pattern, $subject, $matches)) {
            print_r($matches);
        } else {
            echo "匹配错误";
        }
    }
} else {
    echo "参数不合法";
}
