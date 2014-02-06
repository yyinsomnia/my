<?php

$a = 0;

foreach(haha() as $i)
{
	echo $i;
}

echo '<br />',$a;
function haha()
{
	global $a;
	$a++;
	return array(1,2,3);
}