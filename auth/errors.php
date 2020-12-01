<link rel="stylesheet" type="text/css" href="style/errors.css">
<script src="scripts/errors.js"></script>

<?php
//      Check whether the user has sent a register or login request.
        if (isset ($_POST['reg_user']) || isset($_POST['login_user'])){

//      If there are any errors, each of them is displayed.
        if (count ($errors) > 0) {
            echo "<div class='statusMessages'>";
            foreach ($errors as $e) {
                echo "<p class='error'>{$e}</p>";
            }
        } else {
//          If there aren't errors, a success message is displayed, based on the user's requst.
//          Success message for registration.
            if (isset ($_POST['reg_user'])) {
                echo "<div class='statusMessages'><p class='success'>User registered.</p></div>";
            }

//          Success message for login.
            if (isset ($_POST['login_user'])) {
                echo "<div class='statusMessages'><p class='success'>Login successful.</p></div>";
            }
        }
        echo "</div>";
    }
?>