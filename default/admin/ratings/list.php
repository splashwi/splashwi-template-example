<div>
    <table class="table" id="paginate">
        <thead>
            <tr class="blue">
                <td>ID</td>
                <td>Username</td>
                <td>Score</td>
                <td>Comment</td>
                <td>Status</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
        <?php
        if(count($data["ratings"]) > 0) {
            foreach($data["ratings"] as $rating) {
                ?>
                <tr>
                    <td>RATING#<?= $rating->id ?></td>
                    <td><?=$rating->username?></td>
                    <td>
                        Overall Score: <?=$rating->score?><br><br>
                        Quality Score: <?=$rating->score_quality?> / 5<br>
                        Usability Score: <?=$rating->score_usability?> / 5<br>
                        Performance Score: <?=$rating->score_performance?> / 5<br>
                        Implementation Score: <?=$rating->score_implementation?> / 5<br>
                        Support Score: <?=$rating->score_support?> / 5
                    </td>
                    <td><?=$rating->user_comment?></td>
                    <td>
                    <?php if($rating->approved == 0) {
                        echo "<label class='text-danger text-uppercase'>Not Approved</label>";
                    } elseif($rating->approved == 1) {
                        echo "<label class='text-success text-uppercase'>Approved</label>";
                    }  ?>
                    </td>
                    <td>
                    <?php if($rating->approved == 0) {
                        echo "<a class='btn btn-success' href='ratings/approve/".$rating->id."'>Approve</a>";
                    } elseif($rating->approved == 1) {
                        echo "<a class='btn btn-danger' href='ratings/disapprove/".$rating->id."'>Disapprove</a>";
                    }  ?>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr><td>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="jumbotron">
                                No ratings!
                            </div>
                        </div>
                    </div>
                </td></tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-12">
            <div class="pagination-nav">
                <div class="simple-pagination-first"></div>
                <div class="simple-pagination-previous"></div>
                <div class="simple-pagination-page-numbers"></div>
                <div class="simple-pagination-next"></div>
                <div class="simple-pagination-last"></div>
            </div>
        </div>
    </div>
</div>
