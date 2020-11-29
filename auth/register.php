<link rel="stylesheet" type="text/css" href="style/auth.css">
<style>
    .error {
        width: 92%;
        margin: 0px auto;
        padding: 10px;
        border: 1px solid #a94442;
        color: #a94442;
        background: #f2dede;
        border-radius: 5px;
        text-align: left;
    }

    .success {
        color: #3c763d;
        background: #dff0d8;
        border: 1px solid #3c763d;
        margin-bottom: 20px;
    }
</style>
<script src="scripts/reloadOnEsc.js"></script>

<?php
    session_start();
    include 'server.php';
    include '../scripts/defaultLocale.php';

    $text = array('bulgarian' =>
        array ('username' => 'Потребител',
            'email' => 'Имейл',
            'password' => 'Парола',
            'confirmPassword' => 'Парола потв.',
            'register' => 'Регистрация',
            'return' => 'или натисни esc за връщане'
    ),
        'english' => array ('username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Password',
            'register' => 'Register',
            'return' => 'or press esc to go back'
        )
    );

    if ($lang == 'bg') {
        $user = $text['bulgarian']['username'];
        $email = $text['bulgarian']['email'];
        $password = $text['bulgarian']['password'];
        $confPwd = $text['bulgarian']['confirmPassword'];
        $register = $text['bulgarian']['register'];
        $return = $text['bulgarian']['return'];
    } else {
        $user = $text['english']['username'];
        $email = $text['english']['email'];
        $password = $text['english']['password'];
        $confPwd = $text['english']['confirmPassword'];
        $register = $text['english']['register'];
        $return = $text['english']['return'];
    }

    echo "<div class='registerContainer'>
            <form id='registrationForm' method='POST'>
                <div class='inputField'>
                    <label>{$user}
                        <input name='username' type='text' placeholder='thesowut' required></label>
                </div>
                
                <div class='inputField'>
                    <label>{$email}
                        <input name='email' type='email' placeholder='email@gmail.com' required></label>
                </div>
                
                <div class='inputField'>
                    <label>{$password}
                        <input name='password' type='password'placeholder='************************' minlength='8' required></label>
                    </div>
                    
                <div class='inputField'>
                    <label>{$confPwd}
                        <input name='passwordConfirm' type='password' placeholder='************************' minlength='8' required></label>
                </div>
                
                <button id='submitBtn' name='reg_user'>{$register}</button>
                <p id='goback'>{$return}</p>
            </form>
    </di</div>";
?>