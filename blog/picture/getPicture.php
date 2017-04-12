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
    $bmobObj = new BmobObject("picture");
    //$res=$bmobObj->create(array("content"=>"game","device"=>"20"));
    $res=$bmobObj->get("",array('order=-createdAt','groupcount=true','groupby=month'));

    $res1=$bmobObj->get("",array('order=-createdAt'));
    //$res=$bmobObj->get("",array('$res=$bmobObj->get("",array("keys=content"))'));

    //var_dump($res);
    $array = (array)$res;
    $array1 = (array)$res1;
    $res = "";

    $pos = 0;
    for ($i=0; $i < count($array["results"]); $i++) { 
        $mm = (array)$array["results"][$i];
        $all = "";
        for ($j=$pos ; $j < $pos + $mm["_count"]; $j++) { 
            $nn = (array)$array1["results"][$j];
            if ($j+1==$pos + $mm["_count"]) {
               $all = $all."描述：".$nn["alt"] ."链接：". $nn["url"];
            }else{
                 $all = $all."描述：".$nn["alt"] ."链接：". $nn["url"]."||";
            }
        }
        $pos = $pos + $mm["_count"];
        if ($i+1==count($array["results"])) {
            echo "月：".$mm["month"]."组：".$all;
        }else{
            echo "月：".$mm["month"]."组：".$all."<br>";
        }
    }

} catch (Exception $e) {
    echo $e;
}
