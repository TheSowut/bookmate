<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
//  scenario when a new review is publish
    if (isset($_POST['book_name'])) {
        echo "<p>set</p>";
    } else {
//  scenario when the reviews are previewed, without publishing
        echo "<p>notset</p>";
    }
?>
</body>
</html>