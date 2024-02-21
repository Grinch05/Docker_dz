<?php
$dbcon = new mysqli("db", "root", "root", "p_21");
if ($dbcon->connect_errno) {
    printf("Не удалось подключиться: %s\n", $dbcon->connect_error);
    exit();
}
?>
