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

function task1() {    
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

?>