<?php
//    If the user has selected a locale, it will be applied
//    else the default locale is set to english.
    if (!isset($_SESSION['lang'])){
        $_SESSION['lang'] = 'en';
    }
?>