<?php


$arr = array(
	'code'=>0,
	'total'=>94,
	'next'=>true,
	'data'=>array(
		array(
			'openId'=>'openId86',
			'avatar'=>'http://99touxiang.com/public/upload/nvsheng/182/24-011828_43.jpg',
			'nickName'=>'虚拟用户86',
			'noreplyCount'=>17,
			'lastMsg'=>array(
				'openId'=>'openId86',
				'sendUser'=>'sendUser',
				'msgId'=>0,
				'msgType'=>'text',
				'createTime'=>'1405661768066',
				'content'=>'文本内容消息',
				'field1'=>0,
				'field2'=>'',
				)
			),
		)
	);
echo json_encode($arr);