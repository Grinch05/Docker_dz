
<div class="content"> 
               <?php
         if(isset($_GET['content'])){
            $content= $_GET['content'];
            include "$content";
        } 
        else{
            if(isset($_GET['region'])){
                $selectedRegion = (int)$_GET['region'];
                $mysql = "SELECT city.*, region.name AS region_name
                FROM city
                JOIN region ON city.region = region.id
                WHERE city.region = $selectedRegion 
               ";
                $result = $dbcon->query($mysql);
                $city_data = $result->fetch_all(MYSQLI_ASSOC);
                    
                    $myrow = $result->fetch_assoc();
                        $_SESSION["photo"] = $myrow['logo'];
                          ?>
                    
                    <!-- // Вывод таблицы -->
                    <div class="tablGL">
                    <div class="tabl">
                    <?php
                    echo "<table >";
                   
                    
                    foreach ($result as $row) { 
                        $_SESSION["photo"] = $row['logo'];
                        echo "<tr><th >Лого</th>
                        <th > <a class='link' href='?content=city.php&city=" . $row['id'] . "'>" . $row['name'] . "</a></th>
                        <th >". $row['region_name'] ."</th></tr>";
                        echo "<td ><img src='./img/" . $_SESSION['photo'] . "'></td>";
                        echo "<td  colspan='2'>" . $row['description'] . "</td>";
                    }    
                    echo "</table>";   
                         
                    ?></div></div><?php    
            }
            else{
              $mysql = "SELECT city.*, region.name AS region_name
            FROM city
            JOIN region ON city.region = region.id
            ORDER BY `id` DESC LIMIT 5";
            $result = $dbcon->query($mysql);
            $city_data = $result->fetch_all(MYSQLI_ASSOC);
                
                $myrow = $result->fetch_assoc();
                    $_SESSION["photo"] = $myrow['logo'];
                      ?>
                
                <!-- // Вывод таблицы -->
                <div class="tablGL">
                <div class="tabl">
                <?php
                echo "<table >";
               
                
                foreach ($result as $row) { 
                    $_SESSION["photo"] = $row['logo'];
                    $_SESSION["city"] = $row['name'];
                    echo "<tr><th >Лого</th>
                
                    <th > <a class='link' href='?content=city.php&city=" . $row['id'] . "'>" . $row['name'] . "</a></th>
                    <th >". $row['region_name'] ."</th></tr>";
                    echo "<td ><img src='./img/" . $_SESSION['photo'] . "'></td>";
                    echo "<td  colspan='2'>" . $row['description'] . "</td>";
                   
                }    
                echo "</table>";   
                     
                ?></div></div><?php  
            }
              
            
            } 
        
            ?> 
                
        </div>