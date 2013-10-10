<?php

$date = date('Y-m-d',strtotime('yesterday'));
$url = 'http://api.maxvox.com.cn/api/pci_pull/getCallByDateTime?';
$auth = array(
	'userkey'=>'5908300d5f',
	'secretkey'=>'3e57f14028077b053a9b03990a530a57',
);
$opts = array(
	'userkey'=>$auth['userkey'],
	'start_time'=>date('Y-m-d H:i:s',strtotime('yesterday')),
	'end_time'=>date('Y-m-d H:i:s',strtotime('today')),
);
//var_dump($opts);die;
ksort($opts);
$str = '';
foreach($opts as $k=>$v)
{
	$str .=($k.'='.$v);
}
$str .= $auth['secretkey'];
$sign = md5($str);
$opts['sign'] = $sign;
$url .= http_build_query($opts);
$r = json_decode(file_get_contents($url));
if($r->code != 200)
	return null;
$data = $r->result;
var_dump($data);
$a = array();
foreach($data as $item)
{
	$key = $item->tel;
	if(!isset($a[$key]['t'])) $a[$key]['t']=0;
	if(!isset($a[$key]['f'])) $a[$key]['f']=0;
	if($item->state == 1)   // 1 : connected
	{
		$a[$key]['t']++;
	}
	else
	{
		$a[$key]['f']++;
	}
}
var_export($a);die;