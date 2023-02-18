<?php

$ch = curl_init(); // открыть сеанс cURL
curl_setopt($ch, CURLOPT_URL, $url); // установить параметр $url
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // вернуть ответ в строку
$resultJson = curl_exec($ch); // выполнить запрос
curl_close($ch); // закрыть сеанс cURL