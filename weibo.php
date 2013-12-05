<?php
$url = 'https://api.weibo.com/2/statuses/user_timeline.json';
$url .= '?count=100&uid=3095823163&access_token=2.00hzkDpB18JQ1D6fe1141f23XAQAvC';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$result = curl_exec($ch);
print_r(json_decode($result));