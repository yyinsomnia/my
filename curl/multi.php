<?php
$start = microtime(true);
$urls = array(
	'http://www.baidu.com/',
	'http://www.sogou.com/',
	//'http://localhost/github/my/response/slow.php'
	'http://item.taobao.com/item.htm?id=40641472143',
	'http://item.taobao.com/item.htm?id=41716014615',
	'http://item.taobao.com/item.htm?id=41744617916',
	'http://item.taobao.com/item.htm?id=19290950247',
	'http://item.taobao.com/item.htm?id=35404485533',
	'http://item.taobao.com/item.htm?id=37133271101',
	'http://item.taobao.com/item.htm?id=37133271102',
	'http://item.taobao.com/item.htm?id=37133271103',
	'http://item.taobao.com/item.htm?id=37133271104',
	);


$i = $j = 0;

print_r(classic_curl($urls, 1));
$end = microtime(true);

echo $end - $start . '<br />';

function classic_curl($urls, $delay) {
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
	$leo = 0;
	// execute the handles
	do {
	    $mrc = curl_multi_exec($queue, $active);
	} while ($mrc == CURLM_CALL_MULTI_PERFORM);

	while ($active > 0 && $mrc == CURLM_OK) {
		$GLOBALS['i']++;

	    //while (curl_multi_exec($queue, $active) === CURLM_CALL_MULTI_PERFORM);

   		if (curl_multi_select($queue) == -1) {
   			$GLOBALS['j']++;
            usleep(10000);
        }
	    if (true || curl_multi_select($queue, 0.5) != -1) {
	        do {
	            $mrc = curl_multi_exec($queue, $active);
	        } while ($mrc == CURLM_CALL_MULTI_PERFORM);
	    }
	}

	$responses = array();
	foreach ($map as $url=>$ch) {
	    $responses[$url] = callback(curl_multi_getcontent($ch), $delay);
	    curl_multi_remove_handle($queue, $ch);
	    curl_close($ch);
	}

	curl_multi_close($queue);
	return $responses;
}

function callback($data, $delay) {
    preg_match_all('/<title>(.+)<\/title>/iU', $data, $matches);
    usleep($delay);
    return $matches;
    return compact('data', 'matches');
}

register_shutdown_function(function() {
	echo $GLOBALS['i'] . ' ' . $GLOBALS['j'];
});