<?php
    if (!isset ($_SESSION['userid'])) {
        // change endpoint after deploying
        header("Location: /ssp/Курсов Проект/bookmate/");
    }
?>