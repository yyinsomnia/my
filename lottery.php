<?php
function isWinner($first, $last, $total)
{
    $winner = array();
    for ($i=0;;$i++)
    {
        $number = mt_rand($first, $last);
        if (!in_array($number, $winner))
            $winner[] = $number;    // 如果数组中没有该数，将其加入到数组
        if (count($winner) == $total)   break;
    }
    return implode(' ', $winner);

}

// for test

echo isWinner(1, 81, 10);

?>