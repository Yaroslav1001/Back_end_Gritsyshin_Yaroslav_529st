<?php

session_start();

// проверка наличия данных в $_POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aComment = array(
        'email' => $_POST['email'],
        'name' => $_POST['name'],
        'text' => $_POST['text'],
        'date' => date('Y-m-d H:i:s')
    );

    // Вставка данных в базу данных
    // TODO in PHP part
    $aConfig = require_once 'config.php';
    $db = mysqli_connect(
        $aConfig['host'],
        $aConfig['user'],
        $aConfig['pass'],
        $aConfig['name']
    );

    $query = "INSERT INTO comments (email, name, text, date) VALUES (
        '". $aComment['email']."',
        '". $aComment['name']."',
        '". $aComment['text']."',
        '". $aComment['date']."'
)";
    mysqli_query($db, $query);
    mysqli_close($db);

    // Перенаправление на страницу после успешной вставки данных
    header('Location: guestbook.php');
    exit();
}

// TODO 4: RENDER: 1) view (html) 2) data (from php)

?>

<!DOCTYPE html>
<html lang="">

<?php require_once 'sectionHead.php' ?>

<body>

<div class="container">

    <!-- navbar menu -->
    <?php require_once 'sectionNavbar.php' ?>
    <br>

    <!-- guestbook section -->
    <div class="card card-primary">
        <div class="card-header bg-primary text-light">
            GuestBook form
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-6">

                 <!-- TODO: create guestBook html form   -->
                    <form method="post">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="form-control" type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input class="form-control" type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Text:</label>
                            <textarea class="form-control" id="text" name="text" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>


                </div>
            </div>

        </div>
    </div>

    <br>

    <div class="card card-primary">
        <div class="card-header bg-body-secondary text-dark">
            <p>Сomments</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <!-- TODO: render guestBook comments   -->
                    <?php
                    // TODO in HTML part
                    // Получение всех комментарий из базы данных
                    $aConfig = require_once 'config.php';
                    $db = mysqli_connect(
                        $aConfig['host'],
                        $aConfig['user'],
                        $aConfig['pass'],
                        $aConfig['name']
                    );
                    $query = 'SELECT * FROM comments';
                    $dbResponse = mysqli_query($db, $query);
                    $aComments = mysqli_fetch_all($dbResponse, MYSQLI_ASSOC);
                    mysqli_close($db);
                    foreach($aComments as $comment) {
                        echo $comment['name'] . '<br>';
                        echo $comment['email'] . '<br>';
                        echo $comment['text'] . '<br>';
                        echo $comment['date'] . '<br>';
                        echo '<hr>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
