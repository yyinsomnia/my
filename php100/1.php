<?php
$a = complex_function_abc('a','b','c');

function complex_function_abc($a, $b, $c) {

$key = __FUNCTION__ . serialize

(func_get_args());
var_dump($key);
if (!($result = memcache_get($key))) {

$result = //函数代码

// 储存执行结果1小时

memcache_set($key, $result, NULL, 3600);

}

return $result;

}

?>