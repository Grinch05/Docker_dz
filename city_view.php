<?php 
session_start();
require_once("dbconnect.php");
$name = $_GET['name'];

if (!isset($_GET["view_button"])){
    header("Location:index.php?content=admin.php");
}
if (isset($_GET["view_button"]) && empty($name)){
    $mysql = "select *
        from city";
        $result = $dbcon->query($mysql);
        $_SESSION['city_data'] = $result->fetch_all(MYSQLI_ASSOC);
        header("Location:index.php?content=admin.php");

}

if (isset($_GET["view_button"]) && !empty($name)){
        $mysql = "select *
        from city
        where name = '".$name."'";
        $result = $dbcon->query($mysql);
    $city_found = false;
    $_SESSION['city_data'] = $result->fetch_all(MYSQLI_ASSOC);
    header("Location: index.php?content=admin.php");

}
?>
<br><a href="index.php">Главная</a>
<!-- В коде проверки нажатия кнопки создать условие для пустого поля и поля с введенным 
городом. Для первого случая необходимо вывести весь список городов, находящихся в 
таблице city. Для второго же необходимо вывести информацию о введенном в поле 
городе;
 Осуществить вывод в виде таблицы
 Осуществить вывод результатов поиска на главной странице -->