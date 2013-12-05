<?php
$aaa = escape('张小羽');
header("Set-Cookie:aaa=$aaa; expires=Sat, 06-Apr-2013 05:33:43 GMT; path=/",false);
header("Set-Cookie:bbb=5; expires=Sat, 06-Apr-2013 05:33:43 GMT; path=/",false);
header("Set-Cookie:ccc=6; expires=Sat, 06-Apr-2013 05:33:43 GMT; path=/",false);

header("S-Cookie:ccc=6; expires=Sat, 06-Apr-2013 05:33:43 GMT; path=/",false);
header("S-Cookie:ccc=6; expires=Sat, 06-Apr-2013 05:33:43 GMT; path=/",false);
header("S-Cookie:ccc=6; expires=Sat, 06-Apr-2013 05:33:43 GMT; path=/",false);



function escape($string, $in_encoding = 'UTF-8',$out_encoding = 'UCS-2') {
	$return = '';
	if (function_exists('mb_get_info')) {
		for($x = 0; $x < mb_strlen ( $string, $in_encoding ); $x ++) {
			$str = mb_substr ( $string, $x, 1, $in_encoding );
			if (strlen ( $str ) > 1) { // 多字节字符
				$return .= '%u' . strtoupper ( bin2hex ( mb_convert_encoding ( $str, $out_encoding, $in_encoding ) ) );
			} else {
				$return .= '%' . strtoupper ( bin2hex ( $str ) );
			}
		}
	}
	return $return;
}