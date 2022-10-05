<?php


function e()
{
    exit("Неверный ввод");
}

set_error_handler('e');

echo calculator($argv[1]);

function calculator(string $primer): string
{
    $simvoly = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, '+', '-', '*', '/');
    for ($i = 0; $i <= strlen($primer); $i++) {
        if (in_array(substr($primer, $i, 1), $simvoly) === false) {
            return "Неверный ввод";
        }
    }

    $result = eval('return '.$primer.';');

    return $result;
}
