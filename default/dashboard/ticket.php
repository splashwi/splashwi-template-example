<?php
$user = new \Models\User_model();
$user = $user->get_profile(\Helpers\Session::get("username"))[0];

if(empty($user->firstname) || empty($user->lastname)) {
    $username = \Helpers\Session::get("username");
} else {
    $username = $user->firstname.' '.$user->lastname;
}

foreach($data["tickets"]["ticket"] as $oneticket) {
    if($oneticket->priority == 1) {
        $priority = "Low";
    } elseif($oneticket->priority == 2) {
        $priority = "Medium";
    } elseif($oneticket->priority == 3) {
        $priority = "High";
    } elseif($oneticket->priority == 4) {
        $priority = "Emergency";
    } else {
        $priority = "Not Defined";
    }

    if($oneticket->status == "closed") {
        $sta = "Closed";
    } elseif($oneticket->status == "open") {
        $sta = "Open";
    }
    $d = explode(" ", $oneticket->datetime);
    $d = explode("-", $d[0]);
    $d = $d[1].'.'.$d[2].'.'.$d[0];
    ?>
    <div class="row">
        <div class="col-md-3">
            <label>Date</label>
            <input class="form-control" value="<?=$d?>" disabled readonly>
        </div>
        <div class="col-md-3">
            <label for="category">Category</label>
            <input class="form-control" value="<?=$oneticket->cat?>" disabled readonly>
        </div>
        <div class="col-md-3">
            <label for="status">Status</label>
            <input class="form-control" value="<?=$sta?>" disabled readonly>
        </div>
        <div class="col-md-3">
            <label for="priority">Priority</label>
            <input class="form-control" value="<?=$priority?>" disabled readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="status">Name:</label>
            <input class="form-control" value="<?=$username?>" disabled readonly>
        </div>
        <div class="col-md-6">
            <label for="status">E-Mail</label>
            <input class="form-control" value="<?=$user->email?>" disabled readonly>
        </div>
    </div>
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
