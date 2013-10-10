<?php
set_time_limit(0);
$files = glob('*.html');
foreach ($files as $file)
{
	$content = file_get_contents($file);
	preg_match_all('/href="(.*?)+"/', $content ,$matches);
	//print_r($matches[0]);die;
	foreach ($matches[0] as $href)
	{
		$url = substr($href, 6, -1);
		$headers = get_headers($url);
		if (strpos($headers[0], '301') !== false)
		{
			$location_arr =  explode(' ', $headers[3]);
			$redirect = $location_arr[1];
			$content = str_replace($url, $redirect, $content);
		}
	}
	file_put_contents('new_'.$file, $content);
}