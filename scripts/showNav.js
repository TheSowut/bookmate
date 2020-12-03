$(document).ready(function() {
    $('nav').toggle();
    setTimeout(showNav = () => {
        $('nav').css('opacity', 1);
        $('nav').fadeIn();
    }, 300)
})
