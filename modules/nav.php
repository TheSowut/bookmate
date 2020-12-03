<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
<link rel=”stylesheet” href=”https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style/nav.css">
<script src="scripts/showNav.js"></script>
<!-- Nav style & showNav overloading, so they can work in and beyond index. -->
<link rel="stylesheet" type="text/css" href="../style/nav.css">
<script src="../scripts/showNav.js"></script>


<?php
    //  The first part of the php script will determine,
    //  the current url of the user and will set the
    //  img src accordingly to his current location.

    //  Obtain the current URL.
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    //  Obtain the URL endpoint.
    $endpoint = array_slice(explode('/', $url), -1)[0];

    //  The default src which will be active on the index page.
    $src_en = 'images/flag_en.png';
    $src_bg = 'images/flag_bg.png';

    //  If the user isn't on the index page, the src is modified
    //  and the location of the changeLanguage & logout scripts are set accordingly.
    if ($endpoint != '') {
        include '../scripts/changeLanguage.php';
        include '../scripts/logout.php';
        $src_en = "../{$src_en}";
        $src_bg = "../{$src_bg}";
    } else {
        include 'scripts/changeLanguage.php';
        include 'scripts/logout.php';
    }

echo "<nav>";
    // If the user is logged in, render a logout button.
    if (isset ($_SESSION['userid'])) {
        echo "<form method='POST'>
                  <button type='submit' name='logout' id='logout'><i class='fas fa-sign-out-alt'></i></button>
              </form>";
    }
    // Render a menu with the options to visit the home page and change the language.
    echo "<a id='home' href='/ssp/Курсов Проект/bookmate/'><i class='fas fa-home'></i></a>
            <form name='changeLanguage' method='POST'>
                <button class='langButton' name='lang_en' type='submit'><img id='lang_en' src='{$src_en}' alt='switch to english'></button>
                <button class='langButton' name='lang_bg' type='submit'><img id='lang_bg' src='{$src_bg}' alt='switch to bulgarian'></button>
            </form>
        </nav>";
?>