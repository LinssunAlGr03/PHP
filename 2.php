<?php

echo sumTime($argv[1], $argv[2]);

function sumTime(string $term1, string $term2) : string
{

    $symbols = "1234567890:";

    for ($i = 0; $i <= strlen($term1); $i++) {
        for ($u = 0; $u <= strlen($symbols); $u++) {
            if (substr($term1, $i, 1) == substr($symbols, $u, 1)) {
                break;
            }
            if ($u === strlen($symbols)) {
                return "Ошибка";
            }
        }
    }

    for ($i = 0; $i <= strlen($term2); $i++) {
        for ($u = 0; $u <= strlen($symbols); $u++) {
            if (substr($term2, $i, 1) == substr($symbols, $u, 1)) {
                break;
            }
            if ($u === strlen($symbols)) {
                return "Ошибка";
            }
        }
    }


    $result = strtotime($term1) + strtotime($term2);
    return date('H:i:s', $result);

}
