<?php
mb_internal_encoding('utf-8');

//task1
//Функция для создания массива  из 50 пользователей
// 1. Программно создайте **массив** из **50** пользователей, у каждого пользователя есть поля `id`, `name` и `age`:
// - `id` - уникальный идентификатор, равен номеру эл-та в массиве
// - `name` - случайное имя из **5-ти** возможных (сами придумайте каких)
// - `age` - случайное число от **18 до 45**

function str_shuffle_unicode($str) {
    $tmp = preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    shuffle($tmp);
    return join("", $tmp);
}

function create50users() {    
    for ($i = 1; $i <= 50; $i++) {
        $array_variable[$i]=["id" => $i, "name"=>str_shuffle_unicode("абвгд"), "age"=>rand(18,45)]; 
    }
    return $array_variable;
} 

//task2

//task3
function array_average($array) {
    $result=null;
if(count($array)) {
    $result = array_sum($array) / count($array);    
}
    return $result;
}

//Создаем Массив из 50ти пользователей
function task1() {

$users = create50users();


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

}

?>