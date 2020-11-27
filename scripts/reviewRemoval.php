<script type="text/javascript">
    $(document).ready(function() {
        $('.selectable').click(removeReview = () => {
            let msg = "<?php echo $msg ?>";
            if (confirm(msg)){
                <?php
                // REFACTOR TO USE SELECTED ROW ID
                $sqlQuery = 'DELETE FROM `reviews` WHERE `id` = 11';
                $execQuery = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));
                ?>
                // Refresh the table using AJAX.
                // REFACTOR TO AVOID CLICK INEFFICIENCY AFTER QUERY.
                $('table').load('previewReviews.php table');
            }
        })
    })
</script>