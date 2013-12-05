<?php

function h($key,$m)
{
	$strlen = strlen($key);
	$val = 0;
	for($i=0;$i<$strlen;$i++)
	{
		$val += ord($key[$i]);
	}
	return $val%$m;
}

function hash33($key)
{
	$strlen = strlen($key);
	$hash = 0;
	for($i=0;$i<$strlen;$i++)
	{
		$hash = $hash*33 + ord($key[$i]);
	}
	return $hash;
}

//echo h('abc',5),'<br />';
echo hash33('abc');
