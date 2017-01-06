<?php
foreach($data["tickets"]["ticket"] as $oneticket) {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-2">
                        <?=$oneticket->username?>
                    </div>
                        <div class="col-md-10">
                        <?=$oneticket->question?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php if($oneticket->status !== "closed") { ?>
                <a href="answer/<?=$oneticket->id?>" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Answer Ticket</a>
            <?php } ?>
        </div>
        <div class="col-md-6">
            <?php if($oneticket->status !== "closed") { ?>
                <a href="close/<?=$oneticket->id?>" class="btn btn-danger"><i class="fa fa-close"></i> Close Ticket</a>
            <?php } ?>
        </div>
    </div>
    <?php
}
if(count($data["tickets"]["answers"]) > 0) {
    foreach($data["tickets"]["answers"] as $oneticket) {
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-2">
                            <?=$oneticket->username?>
                        </div>
                        <div class="col-md-10">
                            <?=$oneticket->answer?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                Not answered yet!
            </div>
        </div>
    </div>
    <?php
}
?>
