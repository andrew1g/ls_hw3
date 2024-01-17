<?php 

header("Content-Type: text/html; charset=utf-8;");
require("src/functions.php");

// **Задание #3.1**

// 1. Программно создайте **массив** из **50** пользователей, 
// у каждого пользователя есть поля `id`, `name` и `age`:
// - `id` - уникальный идентификатор, равен номеру эл-та в массиве
// - `name` - случайное имя из **5-ти** возможных (сами придумайте каких)
// - `age` - случайное число от **18 до 45**
// 1. Преобразуйте массив в **json** и сохраните в файл `users.json`
// 2. Откройте файл `users.json` и преобразуйте данные из него обратно **ассоциативный** массив РНР.
// 3. Посчитайте **количество** пользователей с **каждым** именем в массиве
// 4. Посчитайте **средний** возраст пользователей

// **Задание выполняется в отдельном проекте.**



//Создаем Массив из 50ти пользователей
$users = task1();


// echo '<pre>';
// var_dump($users);
// echo '</pre>';

// 1. Преобразуйте массив в **json** и сохраните в файл `users.json`
$json_arr = json_encode($users);
$file = fopen('users.json', 'w+');
fwrite($file,$json_arr);
fclose($file);

// 2. Откройте файл `users.json` и преобразуйте данные из него обратно 
//**ассоциативный** массив РНР.
$file_read = 'users.json';
$json_arr_read = json_decode(file_get_contents($file_read),true);
// echo '<pre>';
// var_dump($json_arr_read);
// echo '</pre>';

// 3. Посчитайте **количество** пользователей с **каждым** именем в массиве
$count = array_count_values(array_column($json_arr_read, 'name'));
foreach ($count as $key => $value) {
    echo 'Количество имен "'. $key . '" = ' . $value . '<br>';
}
    
// 4. Посчитайте **средний** возраст пользователей
$average_age = array_average(array_column($json_arr_read, 'age'));
echo 'Средний возраст = '. $average_age . '<br>';






?>