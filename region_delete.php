<?php
session_start();


$region = $_POST['delete'];
require_once("dbconnect.php");

if (empty($region)) {
    $_SESSION['error_message'] = 'Ошибка: Вы заполнили не все поля';
}
else{
    $_SESSION['error_message'] = "Ошибка: вы ввели цифры вместо символов ";

if(!is_numeric($region)){
        // Проверка наличия города в базе данных
        $check_query = "SELECT name FROM region WHERE name = '$region'";
        $check_result = $dbcon->query($check_query);
    if($check_result->num_rows > 0){
         // Удаление города из таблицы
    $mysql_delete = "DELETE FROM region 
    WHERE name = '$region'";
    $result_delete = $dbcon->query($mysql_delete);
   
    if ($result_delete) {
        // Успешно удалено
        $_SESSION['error_message'] = "Успешно: вы удалили город ";  
    } 
    }
    else {
        // Произошла ошибка 
        $_SESSION['error_message'] = "Ошибка: такого города нет ";
    }
}
}
header("Location: index.php?content=admin.php");  

   

?>