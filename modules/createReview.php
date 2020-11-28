<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Mate - Create</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../style/create.css?v=1">
    <link rel=”stylesheet” href=”https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../images/icon.ico">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../scripts/goBackOnEsc.js"></script>

</head>
<body>
<?php
    session_start();
    include '../db/db.php';
    include '../modules/nav.php';
    include '../scripts/defaultLocale.php';
?>

<div class="container">
<form action="../modules/previewReviews.php" method="POST">
    <?php
        if ($lang == 'bg') {
            $fields = array('name' => "Заглавие:",
                'author' => "Автор:",
                'review' => "Рецензия:",
                'score' => "Оценка:",
                'button' => 'Запиши ревюто',
                'return' => 'или натисни esc за връщане');
            $scores = array(1 => "Безинтересна",
                2 => "Нищо особено",
                3 => "Има своите плюсове",
                4 => "Впечатляваща",
                5 => "Неповторимо четиво");
            $placeholders = array('author' => 'Джордж Оруел',
                'review' => 'Примерна резензия');
        } else {
            $fields = array('name' => "Book:",
                'author' => "Author:",
                'review' => "Review:",
                'score' => "Score:",
                'button' => 'Save review',
                'return' => 'or press esc to go back');
            $scores = array(1 => "Uninteresting",
                2 => "Nothing special",
                3 => "Has its moments",
                4 => "Incredible",
                5 => "Remarkable Read");
            $placeholders = array('author' => 'George Orwell',
                'review' => 'Example review');
        }

        echo "<div class='fieldInput'><label>{$fields['name']} <input name='book_name'' placeholder='1984' required></label></div>
            <div class='fieldInput'><label>{$fields['author']} <input name='book_author' placeholder='{$placeholders["author"]}' required></label></div>
            <div class='fieldInput'><label>{$fields['review']} <textarea name='book_review' placeholder='{$placeholders["review"]}' required></textarea></label></div>
            <div class='fieldInput'><label>{$fields['score']} <select name='book_score' required>";

        foreach($scores as $s => $s_info) {
            echo "<option value='{$s}' selected>{$s} - {$s_info}</option>";
        }

        echo "</select></label></div>";
        echo "<button type='submit'>{$fields['button']}</button>";
        echo "<p id='goback'>{$fields['return']}</p>";
    ?>
</form>
</div>

</body>
</html>