<?php
$news = $data["news"];
?>
    <h3 class="text-center">News</h3>
<?php
if(count($news) > 0) {
    foreach ($news as $news) {
        echo '
        <div class="box news">
            <h3 style="margin-top: 5px;">' . $news->headline . '</h3>
            ' . $news->content . '<br>
            <span><label>Date of publication:</label> ' . $news->date . '</span>
        </div>
        ';
    }
}
?>