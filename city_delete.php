<?php
session_start();


$city = $_POST['delete'];
require_once("dbconnect.php");

if (empty($city)) {
    $_SESSION['error_message'] = 'Ошибка: Вы заполнили не все поля';
}
else{
    $_SESSION['error_message'] = "Ошибка: вы ввели цифры вместо символов ";

if(!is_numeric($city)){
        // Проверка наличия города в базе данных
        $check_query = "SELECT name FROM city WHERE name = '$city'";
        $check_result = $dbcon->query($check_query);
    if($check_result->num_rows > 0){
         // Удаление города из таблицы
    $mysql_delete = "DELETE FROM city 
    WHERE name = '$city'";
    $result_delete = $dbcon->query($mysql_delete);
   $_SESSION['error_message'] = "Успешно: вы удалили город "; 
    }
    else {
        // Произошла ошибка 
        $_SESSION['error_message'] = "Ошибка: такого города нет ";
    }
}
}
header("Location: index.php?content=admin.php");  

   

?>