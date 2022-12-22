<?php


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
    DatabaseConnection();

    $ID = 0;
    $sql = "select count(0) from users";
    if ($result = mysqli_query(DatabaseConnection(), $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $ID = $row[0] + 1;
        }
    }
    else {
        echo "Произошла ошибка";
    }
    if ($ID < 1) {
        $ID = 1;
    }
    $Login = readline('Введите логин: ');
    $Password = readline('Введите пароль: ');
    $Name = readline('Введите имя: ');

    $sql = "INSERT INTO users SET
        id = {$ID},
        login = '{$Login}',
        password = '{$Password}',
        name = '{$Name}'";

    $result = mysqli_query(DatabaseConnection(), $sql);
    if ($result == false) {
        echo "\nОшибка";
    }
}

function editUser()
{
    DatabaseConnection();
    $ID = readline('Введите ID: ');


    $sql = "select `ID` from users where `ID` = '{$ID}'";
    if ($result = mysqli_query(DatabaseConnection(), $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $ID = $row[0];
        }
    }
    else {
        echo "Ошибка";
    }

    if ($ID === null) {
        echo "ID не существет \n";
        return;
    }
    $Login = readline('Введите логин: ');
    $Password = readline('Введите пароль: ');
    $Name = readline('Введите имя: ');

    $sql = "UPDATE users SET
        id = {$ID},
        login = '{$Login}',
        password = '{$Password}',
        name = '{$Name}'
        WHERE ID = {$ID}";

    $result = mysqli_query(DatabaseConnection(), $sql);
    if ($result == false) {
        echo "Ошибка";
    }
}


function deleteUser()
{
    DatabaseConnection();
    $ID = readline('Введите ID: ');

    $sql = "select `ID` from users where `ID` = '{$ID}'";
    if ($result = mysqli_query(DatabaseConnection(), $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $ID = $row[0];
        }
    }
    else {
        echo "Ошибка";
    }

    if ($ID === null) {
        echo "ID не существет \n";
        return;
    }

    $sql = "DELETE FROM users WHERE ID = {$ID}";

    $result = mysqli_query(DatabaseConnection(), $sql);
    if ($result == false) {
        echo "Ошибка";
    }
}

function DatabaseConnection()
{
    $conn = mysqli_connect("localhost", "root", "root", "database");
    if ($conn == false) {
        echo "Ошибка";
        exit();
    }
    else {
        return $conn;
    }
}
