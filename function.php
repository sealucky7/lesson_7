<?php

//функция сохранения всего массива объявления 
function save_all($ads_db){
    $ads_db = serialize($ads_db);
    setcookie('ads_db', $ads_db, time()+3600*24*7);
}

// Функция удаления объявления
//function delete_item($get_value, $ads_db) {
//	unset($ads_db['db'][$get_value]);
//        save_all($ads_db);
    
//}


// Функция извлечения сериализованных данных из файла в массив.
// Возвращает массив данных.

function file_get_serialize_contents ($filename) {
    if (file_exists($filename)){
	$ini_string = file_get_contents($filename);
		if (!$ini_string) { exit('Ошибка чтения файла'); }
    $array = unserialize($ini_string);
    if (!$array) { exit('Неверный формат файла'); }
        return $array;
    }
}

// Функция удаления объявления
// Удаляет запись из рабочего массива и переписывает файл
function delete_item($ad_id, $ads_db, $filename) {
	unset($ads_db['db'][$ad_id]);
    file_put_serialize_contents($filename, $ads_db);
}

// Функция записи содержимого массива в файл
// Сериализирует содержимое массива и записывает в файл
function file_put_serialize_contents($filename, $array) {
    if(!file_put_contents($filename, serialize($array))) { exit('Ошибка записи файла'); }
}
