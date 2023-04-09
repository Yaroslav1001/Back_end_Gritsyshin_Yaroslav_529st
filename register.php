<?php
// TODO 1: PREPARING ENVIRONMENT: 1) session 2) functions
session_start();

$infoMessage = '';

//проврека наличия данных
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    //создание массива
    $aComment = array(
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'created_at' => date('Y-m-d H:i:s')
    );
    //соеденение с БД
    $aConfig = require_once 'config.php';
    $db = mysqli_connect(
        $aConfig['host'],
        $aConfig['user'],
        $aConfig['pass'],
        $aConfig['name']
    );
    // проверка наличия пользователя с таким email в БД
    $email = mysqli_real_escape_string($db, $aComment['email']);
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        $infoMessage = 'Пользователь с такой почтой уже существует';
    } else {
        //формирование запроса
        $query = "INSERT INTO users (email, password, created_at) VALUES (
        '" . $aComment['email'] . "',
        '" . $aComment['password'] . "',
        '" . $aComment['created_at'] . "'
)";
        //запрос на выполнение операции
        mysqli_query($db, $query);
        mysqli_close($db);

        // Перенаправление на страницу после успешной вставки данных
        header('Location: admin.php');
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="">

<?php require_once 'sectionHead.php' ?>

<body>

<div class="container">

    <?php require_once 'sectionNavbar.php' ?>

    <br>

    <div class="card card-primary">
        <div class="card-header bg-success text-light">
            Register form
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>
                        Email
                    <input class="form-control" type="email" name="email">
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        Password
                    <input class="form-control" type="password" name="password">
                    </label>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="formRegister">
                </div>
            </form>


            <?php
            //проверка на недопустимые значения
                if ($infoMessage) {
                    echo '<hr/>';
                    echo "<span style='color:red'>$infoMessage</span>";
                }
            ?>

        </div>

    </div>
</div>

</body>
</html>