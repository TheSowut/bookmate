<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Mate - Create Review</title>

    <link rel="stylesheet" type="text/css" href="../style/create.css" />
    <link rel=”stylesheet” href=”https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/icon.ico"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/formSubmit.js"></script>

</head>
<body>
<?php
    include '../db/db.php';
?>
<form action="../modules/previewReviews.php" method="POST">
    <label>Име на книга: <input name="book_name" placeholder="1984" required></label>
    <label>Автор на книга: <input name="book_author" placeholder="Джордж Оруел" required></label>
    <label>Рецензия на книга: <input name="book_review" placeholder="Примерна резензия"required></label>
    <label>Оценка на книга: <select name="book_score" required>
            <?php
                $scores = array(1 => "Безинтересна",
                    2 => "Нищо особено",
                    3 => "Има своите плюсове",
                    4 => "Впечатляваща",
                    5 => "Неповторимо четиво");
            foreach($scores as $s => $s_info) {
                echo "<option value='{$s}' selected>{$s} - {$s_info}</option>";
            }
            ?>
        </select></label>
    <button type="submit">Запиши</button>
</form>

</body>
</html>