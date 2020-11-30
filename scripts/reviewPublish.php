<?php
    // REFACTOR TO USE CURRENT USERID
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['book_name'])) {
            $sqlQuery = "INSERT INTO `reviews` (`userid`, `name`, `author`, `review`, `score`)
                             VALUES (
                                 '{$_SESSION['userid']}',
                                 '{$_POST["book_name"]}',
                                 '{$_POST['book_author']}',
                                 '{$_POST['book_review']}',
                                 '{$_POST['book_score']}'
                             )";

            $result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));
        }
    }
?>