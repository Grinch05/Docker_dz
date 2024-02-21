<?php
session_start();
session_destroy();
$_SESSION['dustup']==false;
header("location:index.php");
?>