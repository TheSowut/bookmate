$(document).ready(function() {
    function hideStatusMessage() {
        $('.statusMessages').slideUp();
    }

    // Automatically hide the message after 3 seconds.
    setTimeout(hideMessage = () => {
        hideStatusMessage();
    }, 3000);

    // If the user chooses to to hide the message manually
    // he can click on it.
    $('.statusMessages').click(hideMessage = () => {
        hideStatusMessage();
    });
})