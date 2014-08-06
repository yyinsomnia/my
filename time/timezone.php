<?php

$server_zone = date_default_timezone_get();
date_default_timezone_set('UTC');
echo strtotime("2014-02-01 00:00:00");
date_default_timezone_set($server_zone);