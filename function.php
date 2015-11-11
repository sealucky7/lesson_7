<?php

//функция сохранения всего массива объявления 
function save_all($ads_db){
    $ads_db = serialize($ads_db);
    setcookie('ads_db', $ads_db, time()+3600*24*7);
}


// Функция удаления объявления
function delete_item($get_value, $ads_db) {
	unset($ads_db['db'][$get_value]);
        save_all($ads_db);
    
}

// Функция записи нового объявления в файл
function addContents ($id, $date, $filename) {				
				$ini_string = "[" . $id . "] \r\n".
					  "date = " . $date . ";\r\n"; 
				foreach ($_POST as $key => $value) {
					if ($key=='main_form_submit'){
						continue;
					}
						$ini_string .= $key . " = '" . trim(htmlspecialchars($value)) . "';\r\n";
				}
				if(!file_put_contents($filename, $ini_string, FILE_APPEND)) exit('Ошибка записи файла');			
}

// Функция преобразования массива в файл
function convert_array_to_file ($array, $filename) {				
				$handle = fopen($filename, "w");
				if(!is_resource($handle)){ exit('Ошибка открытия файла');}
	
				foreach ( $array as $id => $item) {
					$ini_string = "[" . $id . "] \r\n";
						foreach ($item as $key => $value) {
							$ini_string .= $key . " = '" . $value . "';\r\n";
						}
				if(!fwrite($handle, $ini_string)) { exit('Ошибка записи файла');}
				}
				fclose($handle);
}

