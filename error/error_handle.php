<?php

$opts = array(
	'http'=>array(
		'method'=>"GET",
		'timeout'=>5,
	)
);

$context = stream_context_create($opts);
$a = file_get_contents('http://upload1.photo.iautos.cn/', false, $context);
var_dump($a);
echo get_current_user();
echo ini_get('error_log');