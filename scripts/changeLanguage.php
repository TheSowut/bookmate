<?php
    // Check whether the user has chosen to change the language.
    // Change the language to english.
    if (isset ($_POST['lang_en'])) {
        $_SESSION['lang'] = 'en';
    }

    // Change the language to bulgarian.
    if (isset ($_POST['lang_bg'])) {
        $_SESSION['lang'] = 'bg';
    }