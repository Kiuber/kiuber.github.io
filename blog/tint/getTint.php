<?php
include_once 'lib/BmobObject.class.php';
include_once 'lib/BmobUser.class.php';
include_once 'lib/BmobBatch.class.php';
include_once 'lib/BmobFile.class.php';
include_once 'lib/BmobImage.class.php';
include_once 'lib/BmobRole.class.php';
include_once 'lib/BmobPush.class.php';
include_once 'lib/BmobPay.class.php';
include_once 'lib/BmobSms.class.php';
include_once 'lib/BmobApp.class.php';
include_once 'lib/BmobSchemas.class.php';
include_once 'lib/BmobTimestamp.class.php';
include_once 'lib/BmobCloudCode.class.php';
include_once 'lib/BmobBql.class.php';

try {

    /*
     *  bmobObject 的例子
     */
    $bmobObj = new BmobObject("Tint");
    //$res=$bmobObj->create(array("content"=>"game","device"=>"20"));
    $res=$bmobObj->get("",array('order=-createdAt'));
    //$res=$bmobObj->get("",array('$res=$bmobObj->get("",array("keys=content"))'));

    //var_dump($res);
    $array = (array)$res;

    for ($i=0; $i < count($array["results"]); $i++) {
        $array2 = "";
        $array2 = (array)$array["results"][$i];
        //echo $array2["content"].$array2["content"]."<br>";
        echo "发表时间：".$array2["createdAt"];
        echo "<br>";
        echo "标签：".$array2["label"];
        echo "<br>";
        echo "内容：".$array2["content"];
        echo "<br>";
        echo "地点：".$array2["location"];
        if (count($array["results"])!=$i+1) {
            echo "<br><br>";
        }
    }

} catch (Exception $e) {
    echo $e;
}
