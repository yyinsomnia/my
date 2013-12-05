<?php 
$dsn = 'mysql:dbname=iautos;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->exec('set names UTF8');

$sql = "select a.fld_IPBegin,a.fld_IPEnd,b.id from tab_sIPArea as a left join area as b on a.fld_AreaPingying = area_ename";
$r = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$content = '';
foreach($r as $item)
{
	if (!empty($item['id']))
		$content .= $item['fld_IPBegin']."\t".$item['fld_IPEnd']."\t".$item['id']."\r\n";
}

file_put_contents('ip_query.txt',$content);