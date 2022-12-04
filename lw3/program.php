<?php

if (!file_exists('users.json')){
    fopen('users.json', "w");
    $structure = '{"users": []}';
    file_put_contents('users.json', $structure);
}

do {
    echo "\nВыберите действие: \n";
    echo "1 - добавить \n";
    echo "2 - изменить \n";
    echo "3 - удалить \n";
    echo "4 - выход \n\n";
    $selection = readline();
    switch ($selection) {
        case "1":
            addUser();
            break;
        case "2":
            editUser();
            break;
        case "3":
            deleteUser();
            break;
        case "4":
            return false;
            break;
    }
}while (true);

function addUser()
{
    $array = json_decode(file_get_contents('users.json'), true);
    if (count($array['users']) == 0) {
        $ID = 1;
    } else {
        $ID = $array['users'][count($array['users']) - 1]['id'] + 1;
    }

    $Login = readline('Логин: ');
    $Password = readline('Пароль: ');
    $Name = readline('Имя: ');
    $user = array(
        'id' => $ID,
        'login' => $Login,
        'password' => $Password,
        'name' => $Name
    );
    $array['users'][] = $user;
    file_put_contents('users.json', json_encode($array));
}

function editUser()
{
    $ID = intval(readline('Введите ID: '));
    $Login = readline('Введите логин: ');
    $Password = readline('Введите пароль: ');
    $Name = readline('Введите имя: ');

    $find = null;
    $array = json_decode(file_get_contents('users.json'), true);
    for ($i = 0; $i < count($array['users']); $i++) {
        if (array_search($ID, $array['users'][$i]) !== false) {
            $find = $i;
            $i = count($array['users']);
        }
        else {
            $find = null;
        }
    }
    if ($find === null) {
        echo "ID не существет \n";
        return;
    }
    $user = array(
        'id' => $ID,
        'login' => $Login,
        'password' => $Password,
        'name' => $Name
    );
    $array['users'][$find] = $user;
    file_put_contents('users.json', json_encode($array));
}

function deleteUser()
{
    $ID = readline('Введите ID : ');
    $find = null;
    $array = json_decode(file_get_contents('users.json'), true);
    for ($i = 0; $i < count($array['users']); $i++) {
        if (array_search($ID, $array["users"][$i]) !== false) {
            $find = $i;
            $i = count($array['users']);
        }
        else {
            $find = null;
        }
    }
    if ($find === null) {
        echo "ID не существет \n";
        return;
    }
    array_splice($array['users'], $find, 1);
    file_put_contents('users.json', json_encode($array));
}
