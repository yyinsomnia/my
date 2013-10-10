<?php

$pdo = new PDO('sqlsrv:server=211.151.78.198;Database=db_firstauto;','iautosuser','59qLvCjOgvFM');

$trimid = 13350;

/*prepare*/
$sql = "select a.fld_itemid, a.fld_name, a.fld_classid, a.fld_configid, isnull(c.fld_value,0) as fld_value from tab_sconfigitems as a inner join (select distinct b.fld_configid from tab_sconfig as a inner join tab_sconfigitems as b on a.fld_itemid=b.fld_itemid where a.fld_trimid= :trimid1) as b on a.fld_configid=b.fld_configid left join (select fld_itemid, 1 as fld_value from tab_sconfig where fld_trimid= :trimid2) as c on a.fld_itemid=c.fld_itemid where a.fld_ClassID=0 or c.fld_value=1 order by b.fld_configid, a.fld_index";

$starttime = microtime(TRUE);
for($i=0;$i<10;$i++)
{
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':trimid1'=>$trimid,':trimid2'=>$trimid));//You cannot use a named parameter marker of the same name twice in a prepared statement
	$r = $sth->fetchAll();
	//print_r($r);
}
$endtime = microtime(TRUE);

echo $endtime-$starttime;
echo '<br />';
/*no prepare*/
$sql = "select a.fld_itemid, a.fld_name, a.fld_classid, a.fld_configid, isnull(c.fld_value,0) as fld_value from tab_sconfigitems as a inner join (select distinct b.fld_configid from tab_sconfig as a inner join tab_sconfigitems as b on a.fld_itemid=b.fld_itemid where a.fld_trimid={$trimid}) as b on a.fld_configid=b.fld_configid left join (select fld_itemid, 1 as fld_value from tab_sconfig where fld_trimid={$trimid}) as c on a.fld_itemid=c.fld_itemid where a.fld_ClassID=0 or c.fld_value=1 order by b.fld_configid, a.fld_index";
$starttime = microtime(TRUE);
for($i=0;$i<10;$i++)
{
	$r = $pdo->query($sql)->fetchAll();
	//print_r($r);
}
$endtime = microtime(TRUE);

echo $endtime-$starttime;

