<?php

echo sumTime($argv[1], $argv[2]);

function sumTime(string $term1, string $term2) : string
{
    for ($i = 0; $i <= strlen($term1); $i += 3) {
        if (is_numeric(substr($term1, $i, 2)) === false || is_numeric(substr($term2, $i, 2)) === false) {
            return("Ошибка в полученных данных\n\n");
        }
    }

    $result = strtotime($term1) + strtotime($term2);
    $result = date('H:i:s', $result);

    return $result;
}
