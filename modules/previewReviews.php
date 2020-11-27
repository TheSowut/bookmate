<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Book Mate - Preview</title>

    <link rel="stylesheet" type="text/css" href="../style/preview.css"/>
    <link rel="icon" href="../images/icon.ico"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php
    session_start();
    include '../db/db.php';
    include '../modules/nav.php';
    include '../scripts/defaultLocale.php';

    $lang = $_SESSION['lang'];
//    Ternary expression which determines the confirm dialog language.
    $msg = 'en' ? 'Delete selected review?' : 'Изрий ревю?';

//     If the user has created a new review, it will be inserted into the db.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['book_name'])) {
            $sqlQuery = "INSERT INTO `reviews` (`name`, `author`, `review`, `score`)
                         VALUES ('{$_POST["book_name"]}', '{$_POST['book_author']}',
                         '{$_POST['book_review']}', '{$_POST['book_score']}')";
            $result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));
        }
    }

    $sqlQuery = "SELECT * FROM `reviews`";
    $result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));

    if ($lang == 'bg') {
        $headers = array('name' => "Име",
            'author' => "Автор",
            'review' => "Ревю",
            'score' => "Оценка",
            'date' => "Дата на ревю");
    } else {
        $headers = array('name' => "Book",
            'author' => "Author",
            'review' => "Review",
            'score' => "Score",
            'date' => "Date reviewed");
    }

//     Determine whether the query has returned anything.
    if (mysqli_fetch_array($result)) {
        echo "<div id='result'><table>
            <tr>
                <th>{$headers['name']}</th>
                <th>{$headers['author']}</th>
                <th>{$headers['review']}</th>
                <th>{$headers['score']}</th>
                <th>{$headers['date']}</th>
            </tr>";

        while($review = mysqli_fetch_array($result)) {
            echo "<tr class='selectable'>
                    <td>{$review['name']}</td>
                    <td>{$review['author']}</td>
                    <td>{$review['review']}</td>
                    <td>{$review['score']}</td>
                    <td>{$review['date']}</td>
                </tr></div>";
        }
        echo "</table>";
    } else {
        echo "<div class='result'><h1>Няма намерени ревюта.</h1></div>";
    }

    include '../scripts/reviewRemoval.php';
?>

</body>
</html>