<!-- Acknowledgement to https://www.javatpoint.com/php-pagination for the pagination example. -->
<link rel="stylesheet" type="text/css" href="../style/pagination.css">

<?php
    // Obtain the total number of pages
    $query = "SELECT * FROM reviews";
    $result = mysqli_query($link, $query);
    $number_of_result = mysqli_num_rows($result);

    // Limit the results displayed per page
    $results_per_page = 5;

    // Determine total number of pages available
    $number_of_page = ceil ($number_of_result / $results_per_page);

    // Determine the page the user currently is on
    if (!isset ($_GET['page']) ) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    // Determine SQL LIMIT starting number for the results on the displaying page
    $page_first_result = ($page-1) * $results_per_page;

    // Obtain all the reviews and the user who wrote them.
    $query = "SELECT `username`, `name`, `author`, `review`, `score`, `date`
                 FROM `users`
                 INNER JOIN `reviews`
                 ON `users`.`id` = `reviews`.`userid` LIMIT " . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($link, $query);

    if ($result){
        echo "<div id='result'><table>
                <tr id='headers'>
                    <th>{$headers['username']}</th>
                    <th>{$headers['name']}</th>
                    <th>{$headers['author']}</th>
                    <th>{$headers['review']}</th>
                    <th>{$headers['score']}</th>
                    <th>{$headers['date']}</th>
                </tr>";

        while ($review = mysqli_fetch_array($result)) {
            echo "<tr>
                    <td>{$review['username']}</td>
                    <td>{$review['name']}</td>
                    <td>{$review['author']}</td>
                    <td>{$review['review']}</td>
                    <td>{$review['score']}</td>
                    <td>{$review['date']}</td>
                </tr>";
        }

        echo "</table><div class='pagination'>";

        $count_query = "SELECT COUNT(*) FROM reviews";
        $rs_result = mysqli_query($link, $count_query);
        $row = mysqli_fetch_row($rs_result);
        $total_records = $row[0];

        $total_pages = ceil($total_records / $results_per_page);
        $pagLink = "";

        // Display a Prev button, if the user is on page 2 or more
        if($page >= 2){
            echo "<a href='previewReviews.php?page=".($page - 1)."'>Prev</a>";
        }

        // Display the pagination only if the page count is more than 1
        if ($total_pages > 1) {
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $pagLink .= "<a id='active' href='previewReviews.php?page={$i}'>{$i}</a>";
                }
                else  {
                    $pagLink .= "<a href='previewReviews.php?page={$i}'>{$i}</a>";
                }
            }
        }

        // Display the pagination
        echo $pagLink;

        // Display Next if there are more pages available
        if($page < $total_pages){
            echo "<a href='previewReviews.php?page=". ($page + 1) . "'>Next</a></div>";
        }

    }
?>