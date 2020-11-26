<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Book Mate - Preview Reviews</title>

    <link rel="stylesheet" type="text/css" href="../style/preview.css" />
    <link rel="icon" href="../images/icon.ico"/>
</head>
<body>
<?php
include '../db/db.php';
// If the used has created a new review, it will be inserted into the db
    if (isset($_POST['book_name'])) {
        $sqlQuery = "INSERT INTO `reviews` (`name`, `author`, `review`, `score`)
                     VALUES ('{$_POST["book_name"]}', '{$_POST['book_author']}',
                     '{$_POST['book_review']}', '{$_POST['book_score']}')";
        $result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));
    }
?>
</body>
</html>