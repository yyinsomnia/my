<?php

/**
 * dirty 
 * classic
 * rolling 
 * rolling-my
 *
 */
$urls = array(
// "http://www.baidu.com/",
// "http://www.taobao.com/",
// "http://www.qq.com/",
// "http://www.tmall.com/",
// "http://www.sogou.com/",
// "http://www.douban.com/",
// "http://www.sohu.com/",
// "http://www.cnbeta.com/",
// "http://www.oschina.net/",
// "http://tieba.baidu.com/",
// "http://map.baidu.com/",
// "http://music.baidu.com/",
// "http://news.baidu.com/",
// "http://image.baidu.com/",
// "http://v.baidu.com/",
// "http://zhidao.baidu.com/",
// "http://wenku.baidu.com/",
"http://www.iautos.cn/usedcar/3706869.html",
"http://www.iautos.cn/usedcar/3706870.html",
"http://www.iautos.cn/usedcar/3706871.html",
"http://www.iautos.cn/usedcar/3706872.html",
"http://www.iautos.cn/usedcar/3706873.html",
"http://www.iautos.cn/usedcar/3706874.html",
"http://www.iautos.cn/usedcar/3706875.html",
"http://www.iautos.cn/usedcar/3706876.html",
"http://www.iautos.cn/usedcar/3706877.html",
"http://www.iautos.cn/usedcar/3706878.html",
"http://www.iautos.cn/usedcar/3706879.html",
"http://www.iautos.cn/usedcar/3706880.html",
"http://www.iautos.cn/usedcar/3706881.html",
"http://www.iautos.cn/usedcar/3706882.html",
"http://www.iautos.cn/usedcar/3706883.html",
"http://www.iautos.cn/usedcar/3706819.html",
"http://www.iautos.cn/usedcar/3706810.html",
"http://www.iautos.cn/usedcar/3706811.html",
"http://www.iautos.cn/usedcar/3706812.html",
"http://www.iautos.cn/usedcar/3706813.html",
"http://www.iautos.cn/usedcar/3706814.html",
"http://www.iautos.cn/usedcar/3706815.html",
"http://www.iautos.cn/usedcar/3706816.html",
"http://www.iautos.cn/usedcar/3706817.html",
"http://www.iautos.cn/usedcar/3706818.html",
"http://www.iautos.cn/usedcar/3706819.html",
"http://www.iautos.cn/usedcar/3706820.html",
"http://www.iautos.cn/usedcar/3706821.html",
"http://www.iautos.cn/usedcar/3706822.html",
"http://www.iautos.cn/usedcar/3706823.html",
// "http://www.iautos.cn/usedcar/3706829.html",
// "http://www.iautos.cn/usedcar/3706820.html",
// "http://www.iautos.cn/usedcar/3706821.html",
// "http://www.iautos.cn/usedcar/3706822.html",
// "http://www.iautos.cn/usedcar/3706823.html",
// "http://www.iautos.cn/usedcar/3706824.html",
// "http://www.iautos.cn/usedcar/3706825.html",
// "http://www.iautos.cn/usedcar/3706826.html",
// "http://www.iautos.cn/usedcar/3706827.html",
// "http://www.iautos.cn/usedcar/3706828.html",
// "http://www.iautos.cn/usedcar/3706829.html",
// "http://www.iautos.cn/usedcar/3706830.html",
// "http://www.iautos.cn/usedcar/3706831.html",
// "http://www.iautos.cn/usedcar/3706832.html",
// "http://www.iautos.cn/usedcar/3706833.html",
);

var_dump(classic_curl($urls, 0));

function dirty_curl($urls, $delay)
{
	$queue = curl_multi_init();
    $map = array();
 
    foreach ($urls as $url) {
        // create cURL resources
        $ch = curl_init();
 
        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOSIGNAL, true);
 
        // add handle
        curl_multi_add_handle($queue, $ch);
        $map[$url] = $ch;
    }
 
    $active = null;
 
    // execute the handles
    do {
        $mrc = curl_multi_exec($queue, $active);
    } while ($active);
 
    $responses = array();
    foreach ($map as $url=>$ch) {
        $responses[$url] = callback(curl_multi_getcontent($ch), $delay);
        curl_multi_remove_handle($queue, $ch);
        curl_close($ch);
    }
 
    curl_multi_close($queue);
    return $responses;
}

function classic_curl($urls, $delay) 
{
    $queue = curl_multi_init();
    $map = array();
 
    foreach ($urls as $url) {
        // create cURL resources
        $ch = curl_init();
 
        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOSIGNAL, true);
 
        // add handle
        curl_multi_add_handle($queue, $ch);
        $map[$url] = $ch;
    }
 
    $active = null;
 
    // execute the handles
    do {
        $mrc = curl_multi_exec($queue, $active);
    } while ($mrc == CURLM_CALL_MULTI_PERFORM);
 	
 	$i = $j = 0;
    while ($active > 0 && $mrc == CURLM_OK) {
    	$i++;
    	//while (curl_multi_exec($queue, $active) === CURLM_CALL_MULTI_PERFORM);
        if (curl_multi_select($queue, 0.5) === -1) {
            usleep(1000);
            $j++;
        }
        if (true || curl_multi_select($queue, 0.5) !== -1) {
            do {
                $mrc = curl_multi_exec($queue, $active);
            } while ($mrc == CURLM_CALL_MULTI_PERFORM);
        }

    }
    echo $i, '<br />', $j;
 
    $responses = array();
    foreach ($map as $url=>$ch) {
        $responses[$url] = callback(curl_multi_getcontent($ch), $delay);
        curl_multi_remove_handle($queue, $ch);
        curl_close($ch);
    }
 
    curl_multi_close($queue);
    return $responses;
}

function rolling_curl($urls, $delay) {
    $queue = curl_multi_init();
    $map = array();
 
    foreach ($urls as $url) {
        $ch = curl_init();
 
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOSIGNAL, true);
 
        curl_multi_add_handle($queue, $ch);
        $map[(string) $ch] = $url;
    }
 
    $responses = array();
    do {
        while (($code = curl_multi_exec($queue, $active)) == CURLM_CALL_MULTI_PERFORM) ;
 
        if ($code != CURLM_OK) { break; }
 
        // a request was just completed -- find out which one
        while ($done = curl_multi_info_read($queue)) {
 
            // get the info and content returned on the request
            $info = curl_getinfo($done['handle']);
            $error = curl_error($done['handle']);
            $results = callback(curl_multi_getcontent($done['handle']), $delay);
            $responses[$map[(string) $done['handle']]] = compact('info', 'error', 'results');
 
            // remove the curl handle that just completed
            curl_multi_remove_handle($queue, $done['handle']);
            curl_close($done['handle']);
        }
 
        // Block for data in / output; error handling is done by curl_multi_exec
        if ($active > 0) {
            curl_multi_select($queue, 1);
        } 
    } while ($active);
    curl_multi_close($queue);
    return $responses;
}


function callback($data, $delay) 
{
    preg_match_all('/<h3>(.+)<\/h3>/iU', $data, $matches);
    usleep($delay);
    return compact('data', 'matches');
}
