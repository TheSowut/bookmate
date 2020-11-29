<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
<link rel=”stylesheet” href=”https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style/nav.css">
<!-- Nav style overloading, so it can work in and out of index. -->
<link rel="stylesheet" type="text/css" href="../style/nav.css">

<?php
//   The first part of the php script will determine,
//   the current url of the user and will set the
//   img src accordingly to his current location.

    //  Obtain the current URL.
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    //  Obtain the URL endpoint.
    $endpoint = array_slice(explode('/', $url), -1)[0];

    //  The default src which will be active on the index page.
    $src_en = 'images/flag_en.png';
    $src_bg = 'images/flag_bg.png';

//    If the user isn't on the index page, the src is modified.
    if ($endpoint != '') {
        $src_en = "../{$src_en}";
        $src_bg = "../{$src_bg}";
    }

//    change home href after deploy
echo "<nav>
            <a id='home' href='/ssp/Курсов Проект/bookmate/'><i class='fas fa-home'></i></a>
            <img id='lang_en' src='{$src_en}' alt='switch to english'>
            <img id='lang_bg' src='{$src_bg}' alt='switch to bulgarian'>
        </nav>";
    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#lang_en').click(function() {
            // php script to change session var lang to en
            // location.reload();
        })

        $('#lang_bg').click(function() {
           // php script to change session var lang to bg
           // location.reload();
        })
    })
</script>