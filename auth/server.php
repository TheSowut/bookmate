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

            $sqlQueryCheckUsername = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
            $result = mysqli_query($link, $sqlQueryCheckUsername);
            $user = mysqli_fetch_assoc($result);

            if ($user) {
                if ($user['username'] === $username) {
                    array_push($errors, "Username already taken.");
                }

                if ($user['email'] === $email) {
                    array_push($errors, "Email already taken.");
                }
            }

            if (count ($errors) == 0) {
                // Encrypt the password using bcrypt.
                $hashedPassword = crypt($pwd, '');
                // Query to insert the new user data into the db.
                $query = "INSERT INTO `users` (`username`, `email`, `password`) VALUES('$username', '$email', '$$hashedPassword')";
                // Executing the query.
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
            }
        }

//  Logging the user in
?>