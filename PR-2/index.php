<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Обработка GET запроса
    // Код здесь
}

// Инициализация cURL
$ch = curl_init();

// Установка URL-адреса и других параметров запроса
curl_setopt($ch, CURLOPT_URL, "https://www.example.com/search?q=query");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resultJson = curl_exec($ch); // выполнить запрос

// Закрытие сеанса cURL
curl_close($ch);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2>My Browser</h2>
<form method="GET" action="index.php">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value=""><br><br>
    <input type="submit" value="Submit">
</form>
<?php
// Определение данных
$data = array('title' => 'Заголовок', 'text' => 'Текст');

// Загрузка шаблона
$template = file_get_contents('index.php');

// Замена переменных в шаблоне на значения данных
$html = str_replace(array_keys($data), array_values($data), $template);

// Вывод HTML-кода
echo $html;
?>
</body>

<script async src="https://cse.google.com/cse.js?cx=a7e7c195f11724b84">
</script>
<div class="gcse-search"></div>

</html>

