
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="tablGL">
<div class="tabl2">
<h1 style="margin-top: 0px;">Авторизация:</h1>
<form method="POST"  action="action_log.php">
    <input  class="input" type="text" name="login" placeholder="Введите логин" ><br>
    <input  class="input" type="password" name="pass" placeholder="Введите пароль"><br>
   <input type="submit" value="Авторизоваться" name="input_button">
   </form>

   <?php
   if (isset($_SESSION['error_message'])) {
    echo $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
   ?>
    <br><a href="../index.php">Вернуться</a>
</div></div>
</body>
</html>