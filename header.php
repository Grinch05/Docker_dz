<header>
    
            <div class="logo">
            <a href="index.php"><img src=" ../img/logo.png" href="../lab14.2/index.php"></a>
            </div>
           
            <?php 
            if ($_SESSION['dustup'] == false) { ?>
                <h2><a href="?content=registration.php" class="link_header">Регистрация</a></h2>
                <h2><a href="?content=login.php" class="link_header">Авторизация</a></h2>
            <?php } else {
                
                echo "<h3 >Добро пожаловать, <a href=?content=lk.php>" . $_SESSION['login']."</a></h3>";
                
  
                ?>
                <form method="POST" action="exit.php">
                    <input type="submit" value="exit" name="exit">
                </form>
            <?php } ?>
        </header>