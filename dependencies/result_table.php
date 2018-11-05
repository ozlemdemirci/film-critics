<p class="goback verticalText">
    <a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; GO BACK</a>
</p>
<table class="critics">
    <?php
        include '../dependencies/search_result.php';

        foreach ($final_links as $key => $item){
            echo "<tr><th> $key </th></tr>";
            foreach ($item as $value) {
                echo "<tr><td> $value </td></tr>";
            }
        }
    ?>
</table>
