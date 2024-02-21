
<div class="content"> 
               <?php
         if(isset($_GET['content'])){
            $content= $_GET['content'];
            include "$content";
        } 
         else {
            if(isset($_GET['region'])){
                $selectedRegion = (int)$_GET['region'];
                $mysql = "SELECT city.*, region.name AS region_name
                          FROM city
                          JOIN region ON city.region = region.id
                          WHERE city.region = $selectedRegion";
                $result = $dbcon->query($mysql);
                $city_data = $result->fetch_all(MYSQLI_ASSOC);
                
                // Проверяем, есть ли данные в результирующем наборе
                if (!empty($city_data)) {
                    ?>
                    <!-- Вывод таблицы -->
                    <div class="tablGL">
                        <div class="tabl">
                            <table>
                                <?php
                                foreach ($city_data as $row) {
                                    $_SESSION["photo"] = $row['logo'];
                                    echo "<tr><th>Лого</th>
                                          <th><a class='link' href='?content=city.php&city=" . $row['id'] . "'>" . $row['name'] . "</a></th>
                                          <th>" . $row['region_name'] . "</th></tr>";
                                    echo "<td><img src='./img/" . $_SESSION['photo'] . "'></td>";
                                    echo "<td colspan='2'>" . $row['description'] . "</td>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <?php
                } else {
                    // Если данных нет, выводим сообщение
                    echo "Нет данных для отображения.";
                }
            } else {
                // Если параметр region не установлен
                $mysql = "SELECT city.*, region.name AS region_name
                          FROM city
                          JOIN region ON city.region = region.id
                          ORDER BY `id` DESC LIMIT 5";
                $result = $dbcon->query($mysql);
                $city_data = $result->fetch_all(MYSQLI_ASSOC);
                
                // Проверяем, есть ли данные в результирующем наборе
                if (!empty($city_data)) {
                    ?>
                    <!-- Вывод таблицы -->
                    <div class="tablGL">
                        <div class="tabl">
                            <table>
                                <?php
                                foreach ($city_data as $row) {
                                    $_SESSION["photo"] = $row['logo'];
                                    echo "<tr><th>Лого</th>
                                          <th><a class='link' href='?content=city.php&city=" . $row['id'] . "'>" . $row['name'] . "</a></th>
                                          <th>" . $row['region_name'] . "</th></tr>";
                                    echo "<td><img src='./img/" . $_SESSION['photo'] . "'></td>";
                                    echo "<td colspan='2'>" . $row['description'] . "</td>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <?php
                } else {
                    // Если данных нет, выводим сообщение
                    echo "Нет данных для отображения.";
                }
            }
        }
        
        
            ?> 
                
        </div>
