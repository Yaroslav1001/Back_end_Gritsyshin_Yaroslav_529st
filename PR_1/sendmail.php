<?php
$subject = 'Test mail';

echo '======' . "\n";
echo $subject . "\n";
echo '======' . "\n";

$firstname = "Yaroslav";
$text1 = "firstname: {$firstname}" . "\n";
$text2 = "This is a test email message.";

$to = "leyary87@gmail.com";
$headers = "From: y.b.grytsishyn@student.khai.edu" . "\r\n" .
    "CC: y.b.grytsishyn@student.khai.edu";
$message = $text1 . $text2;

echo $message;


if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Email sending failed.";
}

echo ini_get("smtp_port"); // получить переменную конфигурации
ini_set("smtp_port","587"); // задать переменную конфигурации

phpinfo();
die;

?>
