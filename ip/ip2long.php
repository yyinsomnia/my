<?php

$ip = '182.18.15.2';
echo ip2long($ip);//ip2long 有可能返回负数
echo '<br />';
echo sprintf("%u",ip2long($ip));//ip2long 有可能返回负数
echo '<br />';
$arr = explode('.', $ip);
$long = $arr[0]*256*256*256+$arr[1]*256*256+$arr[2]*256+$arr[3];
echo $long;