<?php
$s = 'FooBar';
$s = lcfirst($s);
$count = strlen($s);
for ($i=0; $i < $count; $i++) {
	if ($s[$i] >= 'A' && $s[$i] <= 'Z')
		$s[$i] = '_'.strtolower($s[$i]);
}
echo $s;