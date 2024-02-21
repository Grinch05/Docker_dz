<?php
session_start();
require_once("dbconnect.php");
$pole = $_POST['name'];
$pole2 = $_POST['login'];
$pole3 = $_POST['pass'];
$pole4 = $_POST['passPR'];
if(empty($pole)||empty($pole2)||empty($pole3)||empty($pole4)) {
    $_SESSION['error_message'] = 'Ошибка: Вы заполнили не все поля';
}
else{
    if(strlen($pole3) > 15){
        $_SESSION['error_message'] = "Ошибка: пароль слишком длинный ";
    }
    else{
            if ($pole3 != $pole4){
            $_SESSION['error_message'] = "Ошибка: пароли не совпадают ";
        }
        else {
            // Проверка наличия записи в таблице
            $proverka = "SELECT * FROM users WHERE login = '".$pole2."'";
            $proverka = $dbcon->query($proverka);
            
            if ($proverka->num_rows > 0) {
                $_SESSION['error_message'] = "Ошибка: запись уже существует";
            }
            else{
                $mysql = "INSERT INTO users(name,login,pass)
                VALUES('".$pole."','".$pole2."','".$pole3."');";
                $result = $dbcon->query($mysql);
                $_SESSION['error_message'] = "Поздравляю, вы успешно зарегестрировались!";
            }
        }
    }
    
}  
header("Location: index.php?content=registration.php");
?>