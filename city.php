<?php
    require_once("dbconnect.php");

    if (isset($_GET["city"])) {
        $city_name = $_GET["city"];

        $sql = "SELECT * FROM city WHERE id = '$city_name'";
        $result = $dbcon->query($sql);

        if ($result->num_rows > 0) {
            $city_data = $result->fetch_assoc();

            echo "<div class='city-info-container'>";
            echo "<h1>" . $city_data['name'] . "</h1>";
            echo "<p>" . $city_data['description'] . "</p>";
            echo "<img src='./img/" . $city_data['logo'] . "' alt='Логотип города'>";
            echo "</div>";
        } else {
            echo "<div class='error-message'>Город не найден.</div>";
        }
    } else {
        echo "<div class='error-message'>Город не выбран.</div>";
    }
?>
