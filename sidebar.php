<div class="sidebar"><?php
$mysql = "SELECT id,name 
            FROM region";
            $result = $dbcon->query($mysql);
            $city_data = $result->fetch_all(MYSQLI_ASSOC);?>
                
                <!-- // Вывод таблицы -->
                <div class="tablGL">
                <div class="tabl">
                <?php
                echo "<table >";
                echo "<tr><th >Название области</th></tr>";
                foreach ($result as $row) {
                    echo "<tr> <td ><p><a class='link_sidebar' href='?region=" . $row['id'] . "'>" . $row['name'] . "</a></p></td> </tr>";
                }      
                echo "</table>";   
                     
                ?></div></div>
            </div> 