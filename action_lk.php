<?php
session_start();
require_once("dbconnect.php");
$pole1 = $_POST['pass'];
$pole2 = $_POST['Npass'];
$pole3 = $_POST['passPR'];
if (isset($_POST['izmena'])) {
  
    if(empty($pole1)||empty($pole2)||empty($pole3)) {
        $_SESSION['error_message'] = 'Ошибка: Вы заполнили не все поля';
    }
    else{
            if ($pole2 != $pole3){
            $_SESSION['error_message'] = "Ошибка: пароли не совпадают ";
        }
        else {
            // Проверка наличия записи в таблице
            $proverka = "SELECT *
             FROM users
              WHERE login = '".$_SESSION['login']."' and pass ='".$pole2."'" ;
            $proverka = $dbcon->query($proverka);
            
            if ($proverka->num_rows > 0) {
                $_SESSION['error_message'] = "Ошибка: Новый пароль дожен отичаться от старого";
            }


            else{
                $zamena = "UPDATE users
                SET pass = '$pole2'
                 WHERE login = '".$_SESSION['login']."' " ;
                 $zamena = $dbcon->query($zamena);
                $_SESSION['error_message'] = "Поздравляю, вы успешно сменили пароль!";
            }
        }
    }
    header("Location: index.php?content=lk.php");
}
   
?>