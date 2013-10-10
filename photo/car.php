<?php

$photo = $_GET['photo'];
header('Content-type: image/jpeg');
echo file_get_contents("http://car.iautos.cn/PingAnDownLoadSource/Service1/{$photo}");