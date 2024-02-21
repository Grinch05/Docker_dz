<?php
session_start();
require_once("dbconnect.php");

if (isset($_POST['clear_button'])) {
    session_unset();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deshin</title>
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>
    <main>
        <?php include('header.php') ?>
        <div class="page">
        <?php include('content.php') ?>
        <?php include('sidebar.php') ?>
        </div>
        <?php include('footer.php') ?>
     
    </main>
</body>
</html>
