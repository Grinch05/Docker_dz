<?php
$mysql25 = "SELECT avatar FROM users WHERE (login = '" . $_SESSION['login'] . "');";
$result25 = $dbcon->query($mysql25);

if ($myrow25 = $result25->fetch_assoc()) {
    $_SESSION["photo"] = $myrow25['avatar'];
}


?>
<?php 
                        require_once("dbconnect.php");

                        if (isset($_FILES["uploadfile"])) {
                            $new_file = $_SESSION['login'] . $_FILES["uploadfile"]["name"];

                            $errors = array();
                            
                            $file_name = $_FILES["uploadfile"]["name"];
                            $file_size = $_FILES["uploadfile"]["size"];
                            $file_tmp = $_FILES["uploadfile"]["tmp_name"];
                            $file_type = $_FILES["uploadfile"]["type"];
                            
                            if(!move_uploaded_file($file_tmp, "img/" .$_FILES['uploadfile'] ['name'])){
                                header("Location: lk.php");
                            }
                            
                            rename("img/" . $file_name, "img/" . $new_file);

                            
                            $mysql = "UPDATE users 
                            SET avatar = '" . $_SESSION['login'] . $file_name . "' 
                            WHERE login = '" . $_SESSION['login'] . "'";

                            $result = $dbcon->query($mysql);
                            
                            $mysql25 = "SELECT avatar
                             FROM users 
                             WHERE (login = '" . $_SESSION['login'] . "');";
                            $result25 = $dbcon->query($mysql25);
                            
                            if ($myrow25 = $result25->fetch_assoc()) {
                                $_SESSION["photo"] = $myrow25['avatar'];
                                }                  
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
       
       
            <div class="panel">
             <a href="?content=admin.php" >панель управления => </a> <br>   
           
      
            <?php echo "<p class='login_name'>Ваш логин: ". $_SESSION['login']; 
                  echo "<br><p class='login_name'>Ваше имя: ". $_SESSION['name'];?>
                  <br><img src="./img/<?php echo $_SESSION['photo']; ?>">
                   <form method="POST"  enctype="multipart/form-data">                 
                    <input  class="input" type="file" name="uploadfile" value="Обзор"><br>
                    <input  class="input" type="submit" name="dowland" value="Загрузить" ><br>
                    </form>
                  <div class="smena">
                    <form method="POST"  action="action_lk.php">                 
                    <input  class="input" type="password" name="pass" placeholder="Введите старый пароль">
                    <p><input  class="input" type="text" name="Npass" placeholder="Введите новый пароль"></p>
                   <input  class="input" type="text" name="passPR" placeholder="Подтвердите новый пароль">
                    <p><input type="submit" value="Сменить пароль" name="izmena">
                    </form>
                    <?php if (isset($_SESSION['error_message'])) {
                    echo $_SESSION['error_message'];
                    unset($_SESSION['error_message']);
                } ?>
                </div>
                  

                        </div>
            
    </main>
</body>
</html>