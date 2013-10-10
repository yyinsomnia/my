<?php

$pdo = new PDO('mysql:host=211.151.78.218;dbname=iautos;charset=utf8','iautos','_qkJeN=hszJ6^KjYu');

$trimid = 13350;

/*prepare*/
$sql = "SELECT d.*,pos.position_name  FROM recommend_data AS d  
	            LEFT JOIN recommend_position AS pos ON d.position_id=pos.position_id 
	            LEFT JOIN recommend_page AS p ON pos.pageid=p.pageid
	            WHERE p.pagename=? AND d.areaid in(0,?) AND d.status=1 AND pos.status=1 AND p.status=1 ORDER BY d.data_order ASC";

$starttime = microtime(TRUE);
for($i=0;$i<10;$i++)
{
	$sth = $pdo->prepare($sql);
	$sth->execute(array('买车首页',12));
	$r = $sth->fetchAll();
	//print_r($r);
}
$endtime = microtime(TRUE);

echo $endtime-$starttime;
echo '<br />';
/*no prepare*/
$sql = "SELECT d.*,pos.position_name  FROM recommend_data AS d  
	            LEFT JOIN recommend_position AS pos ON d.position_id=pos.position_id 
	            LEFT JOIN recommend_page AS p ON pos.pageid=p.pageid
	            WHERE p.pagename='买车首页' AND d.areaid in(0,12) AND d.status=1 AND pos.status=1 AND p.status=1 ORDER BY d.data_order ASC";

$starttime = microtime(TRUE);
for($i=0;$i<10;$i++)
{
	$r = $pdo->query($sql)->fetchAll();
	//print_r($r);
}
$endtime = microtime(TRUE);

echo $endtime-$starttime;

