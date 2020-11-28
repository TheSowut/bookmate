<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Mate</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/index.css">
    <link rel="icon" href="images/icon.ico"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#login').click(handleLogin = () => {
                $('main').load('auth/login.php');
            })

            $('#register').click(handleLogout = () => {
                $('main').load('auth/register.php');
            })
        })
    </script>

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
        $text = array(
            'logged' => array(
                'bulgarian' => array(
                     'create' => 'създай',
                     'browse' => 'прегледай'
                ),
                'english' => array(
                    'create' => 'create',
                    'browse' => 'browse'
                )
            ),
            'notlogged' => array(
                'bulgarian' => array(
                    'login' => 'логин',
                    'register' => 'регистрация'
                ),
                'english' => array(
                    'login' => 'login',
                    'register' => 'register'
                ),
            )
        );

        if ($lang == 'bg') {
            $create = $text['logged']['bulgarian']['create'];
            $browse = $text['logged']['bulgarian']['browse'];
            $login = $text['notlogged']['bulgarian']['login'];
            $logout = $text['notlogged']['bulgarian']['register'];
        } else {
            $create = $text['logged']['english']['create'];
            $browse = $text['logged']['english']['browse'];
            $login = $text['notlogged']['english']['login'];
            $logout = $text['notlogged']['english']['register'];
        }

        if (isset ($_SESSION['userid'])) {
            echo "<a id='create' href='modules/createReview.php'>{$create}</a>
            <a href='modules/previewReviews.php'>{$browse}</a>";
        } else {
            echo "<a id='login'>{$login}</a>
            <a id='register'>{$logout}</a>";
        }
    ?>
</main>
</body>
</html>