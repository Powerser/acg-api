<?php
$rand = mt_rand(1,2229);
$user = '你的用户名';
$name = '仓库名字';
$path = '目录';

$url = 'https://cdn.jsdelivr.net/gh/'.$user.'/'.$name.'@master/'.$path.'/'.$rand.'.jpg';
//解析结果
$result=array("code"=>"200","imgurl"=>"$url");
 
//Type Choose参数代码
$type=$_GET['return'];

switch ($type) {   
    //Json格式解析
    case 'json':
    $imageInfo = getimagesize($url);  
    $result['width']="$imageInfo[0]";  
    $result['height']="$imageInfo[1]";  
    header('Content-type:text/json');
    echo json_encode($result);  
    break;
    //IMG
    default:
    header("Location:".$result['imgurl']);
    break;
}

function str_re($str) {
    $str = str_replace(' ', "", $str);
    $str = str_replace("\n", "", $str);
    $str = str_replace("\t", "", $str);
    $str = str_replace("\r", "", $str);
    return $str;
}

?>