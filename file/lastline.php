<?php
phpinfo()
//die('222');
$handle=fopen("php_error_log","r");
//var_dump($handle);die;
fseek($handle,-5000,SEEK_END);
while($str=fgets($handle))
	echo $str,'<br />';     
fclose($handle);