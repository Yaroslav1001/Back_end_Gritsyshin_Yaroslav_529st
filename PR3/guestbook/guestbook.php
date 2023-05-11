<?php
// TODO 1: PREPARING ENVIRONMENT: 1) session 2) functions
session_start();

// TODO 2: ROUTING

// TODO 3: CODE by REQUEST METHODS (ACTIONS) GET, POST, etc. (handle data from request): 1) validate 2) working with data source 3) transforming data

// проверка наличия данных в $_POST
if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['text'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $text = $_POST['text'];

    // Валидация данных

    $data = array(
        'email' => $email,
        'name' => $name,
        'text' => $text
    );

    $jsonString = json_encode($data);

    $file = fopen('comments.csv', 'a');
    fwrite($file, $jsonString . "\n");
    fclose($file);
}

// TODO 4: RENDER: 1) view (html) 2) data (from php)

?>

<!DOCTYPE html>
<html>

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
                        <div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input class="form-control" type="text" id="name" name="name" required>
                        <div>
                        <div class="form-group">
                            <label for="text">Text:</label>
                            <textarea class="form-control" id="text" name="text" required></textarea>
                        <div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>


                </div>
            </div>

        </div>
    </div>

    <br>

    <div class="card card-primary">
        <div class="card-header bg-body-secondary text-dark">
            Сomments
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <!-- TODO: render guestBook comments   -->
                    <?php
                    if (file_exists('comments.csv')) {
                        $file = fopen('comments.csv', 'r');
                        $jsonStrings = file('comments.csv');

                        foreach ($jsonStrings as $jsonString) {
                            $comment = json_decode($jsonString, true);

                            echo '<div class="comment">';
                            echo '<p>' . $comment['text'] . '</p>';
                            echo '<p>By ' . $comment['name'] . ' (' . $comment['email'] . ')</p>';
                            echo '</div>';
                        }

                        fclose($file);
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>
