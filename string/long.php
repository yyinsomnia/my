<?php
set_time_limit(0);

$content = file_get_contents('bak_long.html');
preg_match_all('/http:\/\/(.*?)+html/', $content ,$matches);
print_r($matches[0]);die;
foreach ($matches[0] as $url)
{
	$url = trim($url);
	$headers = get_headers($url);
	if (strpos($headers[0], '301') !== false)
	{
		$location_arr =  explode(' ', $headers[3]);
		$redirect = $location_arr[1];
		$content = str_replace($url, $redirect, $content);
	}
}
file_put_contents('long_test.html', $content);
