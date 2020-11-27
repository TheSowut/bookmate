<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Mate</title>

    <link rel="stylesheet" type="text/css" href="style/index.css" />
    <link rel="icon" href="images/icon.ico"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/formSubmit.js"></script>

</head>
<body>
<?php
    session_start();
    include 'db/db.php';
    include 'modules/nav.php';
    include 'scripts/defaultLocale.php';
?>

<main>
    <?php
//    Obtain the session variable for language and keep it in a var named $lang.
        $lang = $_SESSION['lang'];

        if ($lang == 'bg') {
            echo "<a id='test' href='modules/createReview.php'>създай</a>
            <a href='modules/previewReviews.php'>прегледай</a>";
        } else {
            echo "<a href='modules/createReview.php'>create</a>
            <a href='modules/previewReviews.php'>browse</a>";
        }
    ?>
</main>
</body>
</html>