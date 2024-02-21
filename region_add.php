<?php
session_start();
require_once("dbconnect.php");

$pole = $_POST['answer'];
$pole2 = $_POST['answer2'];

if (empty($pole)||empty($pole2)) {
    $_SESSION['error_message'] = 'Ошибка: Вы заполнили не все поля';
}
else{
    if(!is_numeric($pole2)){
       $_SESSION['error_message'] = "Ошибка: вы ввели символы вместо цифр "; 
    }
    else{
    $mysql = "INSERT INTO region(name,kod)
    VALUES('".$pole."','".$pole2."');";
    $result = $dbcon->query($mysql);
    $_SESSION['error_message'] = "Успешно: вы добавили область ";
}

}

header("Location: index.php?content=admin.php");
?>