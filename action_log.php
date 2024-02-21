<?php
session_start();
require_once("dbconnect.php");
$dustup = false;
$pole2 = $_POST['login'];
$pole3 = $_POST['pass'];
if(empty($pole2)||empty($pole3)) {
    $_SESSION['error_message'] = 'Ошибка: Вы заполнили не все поля'; 
}
else{
    if(strlen($pole3) > 15){
        $_SESSION['error_message'] = "Ошибка: пароль слишком длинный ";     
    }
    else{
            // Проверка наличия записи в таблице
            $proverka = "SELECT *
             FROM users
              WHERE login = '".$pole2."' and pass ='".$pole3."'" ;
            $proverka = $dbcon->query($proverka);
           
            if ($proverka->num_rows > 0) {
                $row = $proverka->fetch_assoc();
                $_SESSION['login'] = $pole2; 
                $_SESSION['dustup']=$dustup = true;
                $_SESSION['name'] = $row['name'];
                $_SESSION['photo'] = $row['avatar'];
                header("Location: index.php");
                exit();
            }
            else{
                $_SESSION['error_message'] = "Неверный логин или пароль";
                $_SESSION['dustup']=$dustup = false;
               
            }   
    }
    
}
 header("Location:index.php?content=login.php");
?>