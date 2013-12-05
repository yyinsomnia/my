<?php

$content = file_get_contents('http://www.iautos.cn/');
print_r($http_response_header);
$fp = fopen('http://www.iautos.cn/','r');
print_r(stream_get_meta_data($fp));
fclose($fp);