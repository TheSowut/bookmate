$(document).ready(function() {
    $('#login').click(handleLogin = () => {
        $('main').load('auth/login.php');
    })

    $('#register').click(handleLogout = () => {
        $('main').load('auth/register.php');
    })
})