<?php 

$url = "http://www.csiautos.cn/index.php?c=sina&a=insert";
//$url = "http://localhost/my/post.php";


$post = array
(
    'fld_SinaId' => 40,
    'fld_WeiboId' => 1785311805,
    'fld_NtrimId' => 85578,
    'fld_Appraise' => 30.00,
    'fld_szdmain' => 13,
    'fld_szd' => 1,
   	'fld_FirstRegDate' => '2012-08-01',
    'fld_Mileage' => 10.00,
    'fld_Color' => '黑',
    'fld_DecorationType' => '黑',
    'fld_ycyt' => 1,
    'fld_ryzl' => 1,
    'fld_cph' => '黑:123456',
    'fld_ExchangeTimes' => 0,
    'fld_RoadMaintanceFeeDate' => '2009-03-01',
    'fld_BidExpireDate' => '2012-09-01',
    'fld_caraddess' => '理想国际大厦16层北区7列-3-666',
    'fld_ContactPhone' => '4006388186',
    'fld_MiscInfo' => '请选择附言;请选择附言;请选择附言;请选择附言;',
    'fld_IautosId' => 0,
    'fld_ShopId' => 28193,
	'fld_szd' => 186,
	'fld_szdmain' => 1,
);
$post_string = http_build_query($post);
//echo $post_string;die;
$context = array(
		'http'=>array(
            'method' => 'POST',
            'header' => "".
                "Connection: close\r\n".
                "Content-Length: ".strlen($post_string)."\r\n".
                "Content-type: "."application/x-www-form-urlencoded"."\r\n",
            "content"=> $post_string )
         );

$stream_context = stream_context_create($context);
$response = file_get_contents($url, false, $stream_context);
echo $response;
//return json_decode($response, TRUE);