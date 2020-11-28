$(document).ready(function () {
    window.addEventListener("keyup", goBack = (e) => {
        if(e.keyCode == 27) {
            history.back();
        }
    }, false);

    $('#goback').click(goBack = () => {
        history.back();
    })
});