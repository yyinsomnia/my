<?php
$arr_data = array();

$i = 0;//栏目id
$j = 0;//栏目里面内容id
$handle = @fopen("data.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
		//$buffer = trim($buffer);
		if ($buffer == "\r\n") 
		{
			$i++;
			continue;
		}
        if (strpos($buffer, 'http://') === false) //进入某个栏目模块
		{
			$j = 0;//栏目开始 初始化内容id
			$arr_data[$i]['name'] = trim($buffer);
			//$arr_data[$i]['more_url'] = 'http://so.iautos.cn/';
			continue;
		}
		$arr_buffer = explode('：', $buffer);
		$arr_data[$i]['list'][$j]['name'] = trim($arr_buffer[0]);
		$arr_data[$i]['list'][$j]['url'] = trim($arr_buffer[1]);
		$j++;

    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}


var_export($arr_data);
//echo json_encode($arr_data);