<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Book Mate - Preview</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../style/preview.css">
    <link rel="icon" href="../images/icon.ico">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<?php
    session_start();
    include '../db/db.php';
    include '../modules/nav.php';
    include '../scripts/defaultLocale.php';
    include '../scripts/isUserLogged.php';


    // Ternary expression which determines the confirm dialog language.
    $msg = 'en' ? 'Delete selected review?' : 'Изрий ревю?';

    // If the user has created a new review, it will be inserted into the db.
    include '../scripts/reviewPublish.php';

    if ($lang == 'bg') {
        $headers = array('allreviews' => 'Всички ревюта',
            'myreviews' => 'Мои ревюта',
            'username' => 'Потребител',
            'name' => "Име",
            'author' => "Автор",
            'review' => "Ревю",
            'score' => "Оценка",
            'date' => "Дата на ревю",
            'error' => "Няма намерени записи");
    } else {
        $headers = array('allreviews' => 'All reviews',
            'myreviews' => 'My reviews',
            'username' => 'User',
            'name' => "Book",
            'author' => "Author",
            'review' => "Review",
            'score' => "Score",
            'date' => "Date reviewed",
            'error' => "No reviews found.");
    }

    // Script which loads the reviews and applies pagination
    include '../modules/reviewPagination.php';
?>

</body>
</html>