<?php
    // Logout the user
    if (isset ($_POST['logout'])) {
        if (isset ($_SESSION['userid'])) {
            unset ($_SESSION['userid']);
            header("Location: /ssp/Курсов Проект/bookmate/");
        }
    }
