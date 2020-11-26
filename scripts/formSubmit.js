$(document).ready(function() {
    // arrow function which prevents the submission of the form
    $("form").submit(preventSubmit = (e) => {
        // e.preventDefault(e);
        alert('Book succesfully added!')
    })
})

