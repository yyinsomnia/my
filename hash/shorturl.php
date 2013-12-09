<?php
ini_set('memory_limit', '2G');
ini_set("max_execution_time", 0); 

function base62($x){
$show='';
while($x>0){
	$s= $x%62;
if ($s>35) {
$s= chr($s+61);
}elseif ($s>9&&$s<=35){
$s=chr($s+55);
}
$show.=$s;
$x=floor($x/62);
}
return $show;
}
function urlShort($url){
$url=crc32($url);
$result=sprintf("%u",$url);
return base62($result);
}

function shorturl($url='', $prefix='', $suffix='') {
$base32 = array (
'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p',
'q', 'r', 's', 't', 'u', 'v', 'w', 'x',
'y', 'z', '0', '1', '2', '3', '4', '5');

$hex = md5($prefix.$url.$suffix);
$hexLen = strlen($hex);
$subHexLen = $hexLen / 8;
$output = array();

for ($i = 0; $i < $subHexLen; $i++) {
$subHex = substr ($hex, $i * 8, 8);
$int = 0x3FFFFFFF & (1 * ('0x'.$subHex));
$out = '';
for ($j = 0; $j < 6; $j++) {
$val = 0x0000001F & $int;
$out .= $base32[$val];
$int = $int >> 5;
}
$output[] = $out;
}
return $output;
}

$a = array();
for($i=1; $i<200000; $i++)
{
	$urls = shorturl($i,'aiche111<><>[]');
	
	if(!isset($a[$urls[0]]))
	{
		$a[$urls[0]] = $i;
	}
	elseif(!isset($a[$urls[1]]))
	{
		$a[$urls[1]] = $i;
	}
	elseif(!isset($a[$urls[2]]))
	{
		$a[$urls[2]] = $i;
	}
	elseif(!isset($a[$urls[3]]))
	{
		$a[$urls[3]] = $i;
	}
	else
	{
		echo $i;
	}
	
}
//print_r($a);