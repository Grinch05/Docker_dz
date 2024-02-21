<?php
session_start();
require_once("dbconnect.php");

$pole = $_POST['answer'];
$pole2 = $_POST['answer2'];
$pole3 = $_POST['answer3'];
$pole4 = $_POST['answer4'];
$pole5 = $_POST['answer5'];

if (empty($pole) || empty($pole2) || empty($pole3) || empty($pole4) || empty($pole5)) {
    $_SESSION['error_message'] = 'Ошибка: Вы заполнили не все поля';
} else {
    if (!is_numeric($pole2) || !is_numeric($pole3) || !is_numeric($pole4)) {
        $_SESSION['error_message'] = "Ошибка: вы ввели символы вместо цифр ";
    } else {
        if (isset($_FILES["uploadfile"])) {
            $new_file = $_SESSION['name'] . $_FILES["uploadfile"]["name"];

            $errors = array();

            $file_name = $_FILES["uploadfile"]["name"];
            $file_tmp = $_FILES["uploadfile"]["tmp_name"];

            if (move_uploaded_file($file_tmp, "img/" . $new_file)) {
                $mysql = "INSERT INTO city(name, area, population, region, description, logo)
                          VALUES('" . $pole . "','" . $pole2 . "','" . $pole3 . "','" . $pole4 . "','" . $pole5 . "','" . $new_file . "')";
                $result = $dbcon->query($mysql);

                if (!$result) {
                    $_SESSION['error_message'] = "Ошибка выполнения запроса: " . $dbcon->error;
                } else {
                    $_SESSION['error_message'] = "Успешно: вы добавили город ";
                }
            } else {
                $_SESSION['error_message'] = "Ошибка: не удалось загрузить файл";
            }
        }
    }
}

header("Location: index.php?content=admin.php");
?>
