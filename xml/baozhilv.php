<?php
$arr_data = array();

$i = 0;//第$i年
$j = 0;//车型
$k = 0;//数据
$handle = @fopen("baozhilv.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
		//$buffer = trim($buffer);
		if (strpos($buffer, 'http://') === false && $buffer != "\r\n") 
		{
			$i++;
			$j = 0;
			$k = 0;
			continue;
		}
        if ($buffer == "\r\n") //进入某个栏目模块
		{
			$j++;
			$k = 0;
			continue;
		}
		$arr_buffer = explode('：', $buffer);

		if (count($arr_buffer) == 3)
		{
			$arr_data[$i][$j][$k]['name'] = trim($arr_buffer[1]);
			$arr_data[$i][$j][$k]['url'] = trim($arr_buffer[2]);
			$temp = explode('?id=', $arr_data[$i][$j][$k]['url']);
			$id = $temp[1];
			$response = json_decode(file_get_contents('http://so.iautos.cn/so/tools/getSeriesPy?seriesid='.$id),true);
			//print_r($response);
			$arr_data[$i][$j][$k]['url'] = 'http://so.iautos.cn/quanguo/'.$response['data'][0]['brandPy'].'/'.$response['data'][0]['modelNamePy'].'/';
			$arr_data[$i][$j][$k]['num'] = trim($arr_buffer[0]);
		}
		else
		{
			$arr_data[$i][$j][$k]['name'] = trim($arr_buffer[0]);
			$arr_data[$i][$j][$k]['url'] = trim($arr_buffer[1]);
			$arr_data[$i][$j][$k]['num'] = '';
		}
		$k++;

    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}


var_export($arr_data);
//echo json_encode($arr_data);