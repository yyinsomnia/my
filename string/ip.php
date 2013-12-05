<?php 
$dsn = 'mysql:dbname=iautos;host=localhost';
$user = 'root';
$password = '';
$i=0;
try {
    $dbh = new PDO($dsn, $user, $password);
	$dbh->exec('set names UTF8');
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$fp = fopen('ip_standard.txt','r');
$string = '';
if($fp)
{
	while(($buffer = fgets($fp,4096))!=false) {
		$r = explode("\t", $buffer);
		if($r[2] =='中国' && !($r[3]=='未知'&&$r[4]=='未知')){
			if($r[4]=='未知') $i++;
			unset($r[2]);
			unset($r[7]);
			unset($r[5]);
			unset($r[6]);
			$string .= implode("\t",$r)."\r\n";
			$sql = "insert into ip_area (ip_start,ip_end,province,city) values ($r[0],$r[1],'$r[3]','$r[4]')";
			//$dbh->exec($sql);
		}
	}
	if(!feof($fp)){
		echo "Error: unexpected fgets() fail\n";
	}
	fclose($fp);
}

file_put_contents('ip_new_standard.txt',$string);
echo 50522-$i;


