<?php

$start = microtime();

for($n=65; $n<70; $n++)
{
	$className = 'Class'.chr($n);
	spl_autoload($className);
	$ins = new $className;
	echo $ins->val;
}

//0.006072s
//0.000410s
//0.000404s 


spl_autoload_extensions('.php');
for($n=65; $n<70; $n++)
{
	$className = 'Class'.chr($n);
	spl_autoload($className);
	$ins = new $className;
	echo $ins->val;
}

//0.000315s
//0.000323s
//0.000317s

function my_autoload($className)
{
	$fileName = $className.'.php';
	require($fileName);
}

for($n=65; $n<70; $n++)
{
	$className = 'Class'.chr($n);
	my_autoload($className);
	$ins = new $className;
	echo $ins->val;
}
//0.000272s
//0.000273s
//0.000271s

$end = microtime();

echo $end-$start;