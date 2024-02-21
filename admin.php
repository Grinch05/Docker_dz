<?php 
                    //     $_SESSION['name'] = $_POST['answer'];
                    //     require_once("dbconnect.php");

                    //     if (isset($_FILES["uploadfile"])) {
                    //         $new_file = $_SESSION['name'] . $_FILES["uploadfile"]["name"];

                    //         $errors = array();
                            
                    //         $file_name = $_FILES["uploadfile"]["name"];
                    //         $file_size = $_FILES["uploadfile"]["size"];
                    //         $file_tmp = $_FILES["uploadfile"]["tmp_name"];
                    //         $file_type = $_FILES["uploadfile"]["type"];
                            
                    //         if(!move_uploaded_file($file_tmp, "img/" .$_FILES['uploadfile'] ['name'])){
                    //             header("Location: lk.php");
                    //         }
                            
                    //         rename("img/" . $file_name, "img/" . $new_file);

                            
                    //         $mysql = "UPDATE city
                    //         SET logo = '" . $_SESSION['name'] . $file_name . "' 
                    //         WHERE name = '" . $_SESSION['name'] . "'";

                    //         $result = $dbcon->query($mysql);
                            
                    //         $mysql25 = "SELECT logo
                    //          FROM city 
                    //          WHERE (name = '" . $_SESSION['name'] . "');";
                    //         $result25 = $dbcon->query($mysql25);
                            
                    //         if ($myrow25 = $result25->fetch_assoc()) {
                    //             $_SESSION["photo"] = $myrow25['logo'];
                    //             }                  
                    // }
                   

                  ?>



<div class="table-container">
    <div class="table3">
        <!-- добавление города -->
        <h2>Добавление города</h2>
        <?php
        echo '<form method="POST" action="city_add.php"  enctype="multipart/form-data">';
        echo '<input class="input" type="text" name="answer" placeholder="Введите город"><br><br>';
        echo '<input class="input" type="text" name="answer2" placeholder="Введите площадь"><br><br>';
        echo '<input class="input" type="text" name="answer3" placeholder="Введите население"><br><br>';
        // echo '<input class="input" type="text" name="answer4" placeholder="Введите код региона"><br>';
        $sql = "SELECT * FROM region";
        $result = $dbcon->query($sql);
    ?>
    
    <select name="answer4">
        <option value="">Выберите регион</option>
        <?php
            // Проверка наличия данных в результате запроса
            if ($result->num_rows > 0) {
                // Вывод каждого региона в виде опции выпадающего списка
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
            } else {
                echo "<option value=''>Регионы не найдены</option>";
            }
        ?>
        
    </select><?php
        echo '<br><textarea name="answer5" placeholder="Введите описание города"></textarea><br>';
        echo '<input  class="input" type="file" name="uploadfile" value="Обзор"><br>';
        echo '<input type="submit" value="Добавить" name="input_button">';
        echo '</form>';


        echo '<br><form action="city_view.php" method="GET">';
        echo '<input type="text" name="name" placeholder="Просмотр города"><br>';
        echo '<input type="submit" value="Просмотреть" name="view_button">';
        echo '</form>';
     
        echo '<br><form method="POST" action="city_delete.php" >';
        echo '<input class="input" type="text" name="delete" placeholder="Удаление города"><br>';
        echo '<input type="submit" value="Удалить" name="input_button">';
        echo '</form><br>';
        if (isset($_SESSION['city_data'])) {
            $city_data = $_SESSION['city_data'];
            if (!empty($city_data)) {
                echo "<table style='border: 1px solid grey;'>";
                echo "<tr><th style='border: 1px solid grey;'>Название</th><th style='border: 1px solid grey;'>Площадь</th><th style='border: 1px solid grey;'>Население</th></tr>";
                foreach ($city_data as $row) {
                    echo "<tr style='border: 1px solid grey;'>";
                    echo "<td style='border: 1px solid grey;'>" . $row['name'] . "</td>";
                    echo "<td style='border: 1px solid grey;'>" . $row['area'] . "</td>";
                    echo "<td style='border: 1px solid grey;'>" . $row['population'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo 'Город не найден';
            }
        }
        ?>
    </div>
    <div class="error">
        <?php
        if (isset($_SESSION['error_message'])) {
            echo $_SESSION['error_message'];
            unset($_SESSION['error_message']);
        }
        ?>
    </div>
    <!-- добавление региона -->
    <div class="table2">
        <h2>Добавление области</h2>
        <?php
        echo '<form method="POST" action="region_add.php">';
        echo '<input class="input" type="text" name="answer" placeholder="Введите Область"><br><br>';
        echo '<input class="input" type="text" name="answer2" placeholder="Введите код"><br>';
        echo '<input type="submit" value="Добавить" name="input_button">';
        echo '</form>';

        echo '<br><form action="region_view.php" method="GET">';
        echo '<input type="text" name="name" placeholder="Просмотр Области"><br>';
        echo '<input type="submit" value="Просмотреть" name="view_button">';
        echo '</form>';

        echo '<br><form method="POST" action="region_delete.php">';
        echo '<input class="input" type="text" name="delete" placeholder="Удаление Области"><br>';
        echo '<input type="submit" value="Удалить" name="input_button">';
        echo '</form><br>';
        if (isset($_SESSION['region_data'])) {
            $region_data = $_SESSION['region_data'];
            if (!empty($region_data)) {
                echo "<table style='border: 1px solid grey;'>";
                echo "<tr><th style='border: 1px solid grey;'>Название</th><th style='border: 1px solid grey;'>код</th></tr>";
                foreach ($region_data as $row) {
                    echo "<tr style='border: 1px solid grey;'>";
                    echo "<td style='border: 1px solid grey;'>" . $row['name'] . "</td>";
                    echo "<td style='border: 1px solid grey;'>" . $row['kod'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo 'Регион не найден';
            }
        }
        ?>
    </div>
</div>
