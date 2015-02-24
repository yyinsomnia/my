<?php

$ch = curl_init();
$url = 'http://localhost/github/my/get/host.php?a=1';
$urlinfo = parse_url($url);
$scheme = $urlinfo['scheme'];//http or https
$host = $urlinfo['host'];
$path = $urlinfo['path'];
$query = $urlinfo['query'];

$rela_url = $path;
if ($query) 
	$rela_url .= '?'.$query;

$headers = array("Host: $host");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。c
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch,CURLOPT_URL, $rela_url); //设置请求URL
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");//使用一个自定义的请求信息来代替"GET"或"HEAD"作为HTTP请求
curl_setopt($ch, CURLOPT_PROXY, '127.0.0.1'); //代理服务器的IP
curl_setopt($ch, CURLOPT_PROXYPORT, 80); //代理服务器的端口
curl_setopt($ch, CURLOPT_TIMEOUT, 20);//设置超时时间，单位为s
$output = curl_exec($ch); //这边的output就是返回的response
if (curl_errno($ch))
{
	return false;
}
curl_close($ch);
var_dump($output);