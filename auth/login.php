<?php
    include '../scripts/defaultLocale.php';

    $text = array('bulgarian' =>
        array ('username' => 'Потребител',
            'email' => 'Имейл',
            'password' => 'Парола',
            'confirmPassword' => 'Парола потв.',
            'register' => 'Регистрация',
    ),
        'english' => array ('username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Password',
            'register' => 'Register'
        )
    );

    if ($lang == 'bg') {
        $user = $text['bulgarian']['username'];
        $email = $text['bulgarian']['email'];
        $password = $text['bulgarian']['password'];
        $confPwd = $text['bulgarian']['confirmPassword'];
        $register = $text['bulgarian']['register'];
    } else {
        $user = $text['english']['username'];
        $email = $text['english']['email'];
        $password = $text['english']['password'];
        $confPwd = $text['english']['confirmPassword'];
        $register = $text['english']['register'];
    }

    echo "<div class='registerContainer'>
            <form id='registrationForm' method='POST'>
            <div class='inputField'><label>{$user}</label><input name='username' type='text' placeholder='thesowut' required></div>
            <div class='inputField'><label>{$email}</label><input name='email' type='email' placeholder='email@gmail.com' required></div>
            <div class='inputField'><label>{$password}</label><input name='password' type='password' placeholder='************************'required></div>
            <div class='inputField'><label>{$confPwd}</label><input name='passwordConfirm' type='password' placeholder='************************' required></div>
            <button id='submitBtn'>{$register}</button>
        </form>
    </div>";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#submitBtn').click(submitForm = () => {
            $('#registrationForm').submit();
        })
    })
</script>

<link rel="stylesheet" type="text/css" href="style/login.css">
