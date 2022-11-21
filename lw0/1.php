<?php

echo calculator($argv[1]);

function calculator(string $primer): string
{
    $symbols = "1234567890+-*/";

    for ($i = 0; $i <= strlen($primer); $i++) {
        for ($u = 0; $u <= strlen($symbols); $u++) {
            if (substr($primer, $i, 1) == substr($symbols, $u, 1)) {
                break;
            }
            if ($u === strlen($symbols)) {
                return "Ошибка";
            }
        }
    }

    $result = @eval('return '.$primer.';');

    if ($result === INF) {
        return "Делить на ноль нельзя";
    }

    return $result;
}
