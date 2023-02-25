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
</head>
<body>
<style>
    /* установка шрифта */
    body {
        font-family: Arial, sans-serif;
    }

    /* добавление отступов для элементов формы */
    form {
        margin: 20px;
    }

    label {
        margin-right: 10px;
    }

    input[type="text"] {
        margin-right: 10px;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid gray;
    }

    input[type="submit"] {
        background-color: lightblue;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }
</style>
<h2>My Browser</h2>
<form method="GET" action="index.php">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value=""><br><br>
    <input type="submit" value="Submit">
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