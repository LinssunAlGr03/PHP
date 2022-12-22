<?php

DatabaseConnection();

$id = null;
$login = $_POST['auth_login'];
$password = $_POST['auth_pass'];
$sql = "select `id` from users where `login` = '{$login}' and `password` = '{$password}'";
if ($result = mysqli_query(DatabaseConnection(), $sql)) {
    while ($row = mysqli_fetch_array($result)) {
        $id = $row[0];
    }
}
else {
    echo "Ошибка";
}

if ($id !== null) {
    $name = "";
    $sql = "select `name` from users where `id` = '{$id}'";
    if ($result = mysqli_query(DatabaseConnection(), $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $name = $row[0];
        }
    }
    printf("<span style='color: #%X%X%X'>Успешная авторизация</span><br>", 50, 255, 50);
    printf("<span style='color: #%X%X%X'>Имя: $name</span><br>", 50, 50, 255);"";
}
else {
    printf("<span style='color: #%X%X%X'>Пользователя не существует</span><br>", 255, 50, 50);
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


include ('index.html');
