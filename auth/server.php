<!-- Acknowledgement to https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database
 for the detailed login & registration examples. -->

<?php
// Initializing variables which will store the user info.
$username = $email = "";
$errors = array();

//  Registering the user
if (isset ($_POST['reg_user'])) {
    // Receive all the input values from the form
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $pwd = mysqli_real_escape_string($link, $_POST['password']);
    $confPwd = mysqli_real_escape_string($link, $_POST['passwordConfirm']);

    // Form validation: ensuring that the input fields are correctly filled
    // each error is added to the array of errors.
    if ($pwd != $confPwd) {
        array_push($errors, "Passwords do not match.");
    }

    // Query to check whether the username or email is already used.
    $sqlQueryIsAvailable = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
    $result = mysqli_query($link, $sqlQueryIsAvailable);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // If a record of the username is found in the db, an error is returned.
        if ($user['username'] === $username) {
            array_push($errors, "Username already taken.");
        }

        // If a record of the email is found, an error is returned as well.
        if ($user['email'] === $email) {
            array_push($errors, "Email already taken.");
        }
    }

    if (count($errors) == 0) {
        //  Encrypt the password using bcrypt.
        $hashedPassword = password_hash($pwd, PASSWORD_BCRYPT);

        //   Query to insert the new user data into the db.
        $query = "INSERT INTO `users` (`username`, `email`, `password`) VALUES('$username', '$email', '$hashedPassword')";

        //   Executing the query.
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
    }
}

//  Logging the user in
if (isset ($_POST['login_user'])) {
    // Save the result from input fields in vars.
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    // Check whether the user has a registration.
    $sqlQueryUserRegistered = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($link, $sqlQueryUserRegistered);

    if (mysqli_num_rows($result) == 0) {
        array_push($errors, 'User doesn\'t exist.');
    } else {
        // Obtain the password of the registered user.
        $sqlQueryCheckPassword = "SELECT password FROM users WHERE username = '$username'";
        $result = mysqli_query($link, $sqlQueryCheckPassword);

        // Save the password of the registered user in a var.
        $obtainedPassword = "";

        while ($r = mysqli_fetch_array($result)) {
            $obtainedPassword = $r['password'];
        }

        // Compare the received password to the user's hashed password.
        if (password_verify($password, $obtainedPassword)) {
            $sqlObtainId = "SELECT id FROM users WHERE username = '$username'";
            $result = mysqli_query($link, $sqlObtainId);

            $userid = "";
            while ($r = mysqli_fetch_array($result)) {
                $userid = $r['id'];
            }

            //   Save the user's id as a session variable, which will be later used for
            //  creating reviews & previewing.
            $_SESSION['userid'] = $userid;
        } else {
            array_push($errors, 'Invalid credentials.');
        }
    }
}
?>