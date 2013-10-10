<?php

function generateSalt($cost = 10) {
        if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
            throw new CException(Yii::t('Cost parameter must be between 4 and 31.'));
        }
        // Get some pseudo-random data from mt_rand().
        $rand = '';
        for ($i = 0; $i < 8; ++$i)
            $rand.=pack('S', mt_rand(0, 0xffff));
        // Add the microtime for a little more entropy.
        $rand.=microtime();
        // Mix the bits cryptographically.
        $rand = sha1($rand, true);
        // Form the prefix that specifies hash algorithm type and cost parameter.
        $salt = '$2a$' . str_pad((int) $cost, 2, '0', STR_PAD_RIGHT) . '$';
        // Append the random salt string in the required base64 format.
        $salt.=strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
        return $salt;
    }
	$a = array();
	echo crypt('123');die;
for($i = 0; $i <10; $i++)
{
	echo generateSalt();echo '<br />';
	$str =  crypt('123', generateSalt());
	if (in_array($str, $a)){
		exit('chongfu');
	}
	else {
		$a[] = $str;
	}
}
//print_r($a);

//file_put_contents('1.txt', $str);
	//echo "<br />";
	//echo crypt('123','$2a$10$Kv1PycIwIpgq6DiDCjXS8u0/GonLwrxl0PWNQme3Vm7NCKGAPXN3.');