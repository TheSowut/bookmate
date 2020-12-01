<?php
    // REFACTOR TO USE CURRENT USERID
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['book_name'])) {
            $userid = $_SESSION['userid'];
            $bookName = preg_replace('/[^\p{L}\p{N}\s]/u', '', $_POST['book_name']);
            $bookAuthor = $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $_POST['book_author']);
            $bookReview = $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $_POST['book_review']);
            $bookScore = $_POST['book_score'];

            $sqlQuery = "INSERT INTO `reviews` (`userid`, `name`, `author`, `review`, `score`)
                             VALUES (
                                 '$userid',
                                 '$bookName',
                                 '$bookAuthor',
                                 '$bookReview',
                                 '$bookScore'
                             )";

            $result = mysqli_query($link, $sqlQuery) or die("DB Insertion error, please try again!");
        }
    }
?>