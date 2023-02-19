<?php

if (isset($_GET['search'])) {
    $apiKey = 'AIzaSyAqdDIV9WhoM3cFLzyj2mIpQjE6ceFz2j8';
    $searchEngineId = 'a7e7c195f11724b84';
    $search = $_GET['search'];
    $url = 'https://www.googleapis.com/customsearch/v1?key=' . $apiKey . '&cx=' . $searchEngineId . '&q=' . urlencode($search);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($response, true);
    $items = $result['items'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <style>
        /* Задаем фоновый цвет */
        body {
            background-color: #F9F6F2;
        }

        /* Задаем стили для формы */
        #search-form {
            max-width: 500px;
            margin: 0 auto;
            text-align: center;
            margin-top: 50px;
        }

        /* Задаем стили для кнопки "Поиск" */
        #search-button {
            background-color: #FD6B6B;
            border-color: #FD6B6B;
            transition: all 0.3s ease;
        }

        /* Задаем стили для результата поиска */
        .search-result {
            margin-top: 50px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        /* Задаем стили для карточки результата поиска */
        .search-result-card {
            margin: 10px;
            width: 300px;
            border: 1px solid #E1E1E1;
            border-radius: 5px;
            box-shadow: 0px 3px 5px #D1D1D1;
            transition: all 0.3s ease;
        }

        /* Задаем стили для заголовка результата поиска */
        .search-result-card h3 {
            font-size: 24px;
            margin: 10px;
            color: #333333;
        }

        /* Задаем стили для ссылки результата поиска */
        .search-result-card a {
            display: block;
            font-size: 16px;
            color: #666666;
            text-decoration: none;
            margin: 10px;
            transition: all 0.3s ease;
        }

        /* Задаем анимацию для ссылки результата поиска */
        .search-result-card a:hover {
            color: #FD6B6B;
            transform: scale(1.1);
        }

        /* Задаем стили для описания результата поиска */
        .search-result-card p {
            font-size: 16px;
            color: #999999;
            margin: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
<h2>My Browser</h2>
        </div>
        <div class="col"></div>
    </div>

    <div class="row">
        <div class="col"></div>

    <form class="accordion-body" method="GET" action="index.php">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value=""><br><br>
    <input class="accordion-button" type="submit" value="Submit">
</form>


<?php
if (isset($items)) {
    foreach ($items as $item) {
        echo '<h3>' . $item['title'] . '</h3>';
        echo '<a href="' . $item['link'] . '">' . $item['link'] . '</a>';
        echo '<p>' . $item['snippet'] . '</p>';
    }
}
?>

</body>
</html>
