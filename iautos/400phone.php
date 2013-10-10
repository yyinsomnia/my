<?php
$c = array(//copy后台配置
		'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=iautos',
                'emulatePrepare' => true,
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
        ),

       'db0'=>array(
            'class'=>'CDbConnection',
            'connectionString' => 'sqlsrv:server=211.151.78.198;Database=db_firstauto;',
            'username' => 'iautosuser',
            'password' => '59qLvCjOgvFM',
            'charset' => 'UTF-8',
        )
);

$db = new PDO($c['db']['connectionString'], $c['db']['username'], $c['db']['password']);//mysql
$db->exec('set names "utf8"');

$db0 = new PDO($c['db0']['connectionString'], $c['db0']['username'], $c['db0']['password']);//sqlsrv


$row = 1;
if (($handle = fopen("400.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
			$data[$c] = iconv('gbk','utf-8',$data[$c]);
            //echo $data[$c] . "<br />\n";
        }
		if(strpos($data[2],'400') !== false)
		{
			$sql = "insert into tab_400shop (fld_400phone,fld_source,fld_shopid) values('{$data[2]}','{$data[1]}',{$data[0]})";
			$db0->exec($sql);
		}
    }
    fclose($handle);
}