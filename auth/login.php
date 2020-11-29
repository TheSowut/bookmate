<link rel="stylesheet" type="text/css" href="style/auth.css">
<script src="scripts/reloadOnEsc.js"></script>

<?php
    session_start();
    include '../scripts/defaultLocale.php';

    $text = array('bulgarian' =>
        array ('username' => 'Потребител',
            'password' => 'Парола',
            'login' => 'Вход',
            'return' => 'или натисни esc за връщане'
        ),
        'english' => array ('username' => 'Username',
            'password' => 'Password',
            'login' => 'Login',
            'return' => 'or press esc to go back'
        )
    );

    if ($lang == 'bg') {
        $user = $text['bulgarian']['username'];
        $password = $text['bulgarian']['password'];
        $login = $text['bulgarian']['login'];
        $return = $text['bulgarian']['return'];
    } else {
        $user = $text['english']['username'];
        $password = $text['english']['password'];
        $login = $text['english']['login'];
        $return = $text['english']['return'];
    }

    echo "<div class='loginContainer'>
                <form id='loginForm' method='POST'>
                    <div class='inputField'>
                        <label>{$user}<input name='username' type='text' placeholder='thesowut' required></label>
                    </div>
                    
                    <div class='inputField'>
                        <label>{$password}<input name='password' type='password' placeholder='************************' required></label>
                    </div>
                    
                    <button id='submitBtn' name='login_user'>{$login}</button>
                    <p id='goback'>{$return}</p>
                </form>
        </div>";
?>