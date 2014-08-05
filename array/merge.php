<?php

$a = array(
		34 => array(
				'shop_id' => 34,
				'comment' => 12,
				'news' => 1,
			),
		100 => array(
				'shop_id' => 100,
				'comment' => 12,
			),
		340 => array(
				'shop_id' => 340,
				'news' => 3
			),
	);

$b = array(
		34 => array(
				'shop_id' => 34,
				'comment' => 12,
			),
		100 => array(
				'shop_id' => 100,
				'news' => 10,
			),
		340 => array(
				'shop_id' => 340,
				'comment' => 12,
			),
	);

//print_r($a + $b);

print_r(array_merge($a, $b));