<?php
$str = '{"code":0,"data":{"country":"\u4e2d\u56fd","country_id":"CN","area":"\u534e\u5317","area_id":"100000","region":"\u5317\u4eac\u5e02","region_id":"110000","city":"\u5317\u4eac\u5e02","city_id":"110000","county":"","county_id":"-1","isp":"\u4e2d\u56fd\u79d1\u6280\u7f51","isp_id":"1000114","ip":"210.75.225.254"}}';
print_r(json_decode($str));