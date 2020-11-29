<link rel="stylesheet" type="text/css" href="style/errors.css">
<script src="scripts/errors.js"></script>

<?php
        if (isset ($_POST['reg_user']) || isset($_POST['login_user'])){
        if (count ($errors) > 0) {
            echo "<div class='statusMessages'>";
            foreach ($errors as $e) {
                echo "<p class='error'>{$e}</p>";
            }
        } else {
            if (isset ($_POST['reg_user'])) {
                echo "<div class='statusMessages'><p class='success'>User registered.</p></div>";
            }

            if (isset ($_POST['login_user'])) {
                echo "<div class='statusMessages'><p class='success'>Login successful.</p></div>";
            }
        }
        echo "</div>";
    }
?>