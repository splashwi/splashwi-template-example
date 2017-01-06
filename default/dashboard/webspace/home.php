<?php
if(count($data["webspace"]) > 0) {
    ?>
    <div class="row">
        <div class="col-md-12">
            <?php
            foreach($data["webspace"] as $webspace) {
                $webdata = $data['model']->getData($webspace->id);
                foreach($webdata as $webdata) {
                    foreach($webdata as $webdata) {
                        //echo "<pre>";
                        //print_r($webdata);
                        //echo "</pre>";
                        ?>
                        <div class="jumbotron">
                            Webspace <label>#web<?=$webspace->id?></label> (Master: <label><?=$webspace->master_id?></label>)
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Domains -->
                                    <?php
                                    $percent = $webdata["U_WEB_DOMAINS"] / $webdata["WEB_DOMAINS"] * 100;
                                    if($percent < 41) {
                                        $color = "progress-bar-success";
                                    } elseif($percent > 40 && $percent < 81) {
                                        $color = "progress-bar-warning";
                                    } elseif($percent > 80 && $percent < 101) {
                                        $color = "progress-bar-danger";
                                    }
                                    ?>
                                    <label>Domains (<?=$percent?>%)</label>
                                    <div class="progress">
                                        <div class="progress-bar <?=$color?> progress-bar-striped" role="progressbar" aria-valuenow="<?=$percent?>"
                                             aria-valuemin="0" aria-valuemax="100" style="width:<?=$percent?>%">
                                        </div>
                                    </div>
                                    <!-- Databases -->
                                    <?php
                                    $percent = $webdata["U_DATABASES"] / $webdata["DATABASES"] * 100;
                                    if($percent < 41) {
                                        $color = "progress-bar-success";
                                    } elseif($percent > 40 && $percent < 81) {
                                        $color = "progress-bar-warning";
                                    } elseif($percent > 80 && $percent < 101) {
                                        $color = "progress-bar-danger";
                                    }
                                    ?>
                                    <label>Databases (<?=$percent?>%)</label>
                                    <div class="progress">
                                        <div class="progress-bar <?=$color?> progress-bar-striped" role="progressbar" aria-valuenow="<?=$percent?>"
                                             aria-valuemin="0" aria-valuemax="100" style="width:<?=$percent?>%">
                                        </div>
                                    </div>
                                    <!-- Mail Accounts -->
                                    <?php
                                    $percent = $webdata["U_MAIL_ACCOUNTS"] / $webdata["MAIL_ACCOUNTS"] * 100;
                                    if($percent < 41) {
                                        $color = "progress-bar-success";
                                    } elseif($percent > 40 && $percent < 81) {
                                        $color = "progress-bar-warning";
                                    } elseif($percent > 80 && $percent < 101) {
                                        $color = "progress-bar-danger";
                                    }
                                    ?>
                                    <label>E-Mail Accounts (<?=$percent?>%)</label>
                                    <div class="progress">
                                        <div class="progress-bar <?=$color?> progress-bar-striped" role="progressbar" aria-valuenow="<?=$percent?>"
                                             aria-valuemin="0" aria-valuemax="100" style="width:<?=$percent?>%">
                                        </div>
                                    </div>
                                    <!-- Bandwidth -->
                                    <?php
                                    $percent = $webdata["U_BANDWIDTH"] / $webdata["BANDWIDTH"] * 100;
                                    if($percent < 41) {
                                        $color = "progress-bar-success";
                                    } elseif($percent > 40 && $percent < 81) {
                                        $color = "progress-bar-warning";
                                    } elseif($percent > 80 && $percent < 101) {
                                        $color = "progress-bar-danger";
                                    }
                                    ?>
                                    <label>Bandwidth (<?=$percent?>%)</label>
                                    <div class="progress">
                                        <div class="progress-bar <?=$color?> progress-bar-striped" role="progressbar" aria-valuenow="<?=$percent?>"
                                             aria-valuemin="0" aria-valuemax="100" style="width:<?=$percent?>%">
                                        </div>
                                    </div>
                                    <!-- Disk Usage -->
                                    <?php
                                    $percent = $webdata["U_DISK"] / $webdata["DISK_QUOTA"] * 100;
                                    if($percent < 41) {
                                        $color = "progress-bar-success";
                                    } elseif($percent > 40 && $percent < 81) {
                                        $color = "progress-bar-warning";
                                    } elseif($percent > 80 && $percent < 101) {
                                        $color = "progress-bar-danger";
                                    }
                                    ?>
                                    <label>Disk usage (<?=$percent?>%)</label>
                                    <div class="progress">
                                        <div class="progress-bar <?=$color?> progress-bar-striped" role="progressbar" aria-valuenow="<?=$percent?>"
                                             aria-valuemin="0" aria-valuemax="100" style="width:<?=$percent?>%">
                                        </div>
                                    </div>
                                    <!-- CronJobs -->
                                    <?php
                                    $percent = $webdata["U_CRON_JOBS"] / $webdata["CRON_JOBS"] * 100;
                                    if($percent < 41) {
                                        $color = "progress-bar-success";
                                    } elseif($percent > 40 && $percent < 81) {
                                        $color = "progress-bar-warning";
                                    } elseif($percent > 80 && $percent < 101) {
                                        $color = "progress-bar-danger";
                                    }
                                    ?>
                                    <label>CronJobs (<?=$percent?>%)</label>
                                    <div class="progress">
                                        <div class="progress-bar <?=$color?>" role="progressbar" aria-valuenow="<?=$percent?>"
                                             aria-valuemin="0" aria-valuemax="100" style="width:<?=$percent?>%">
                                        </div>
                                    </div>
                                    <!-- Backups -->
                                    <label>Backups</label>
                                    <?php
                                    $percent = $webdata["BACKUPS"];
                                    ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="100"
                                             aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                            <?=$percent?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="col-md-12">
                                        <div class="col-md-2 webicon">
                                            <a href="domains/<?=$webspace->id?>" class="btn btn-success btn-fullwidth"><i class="fa fa-globe"></i><br>Domains</a>
                                        </div>
                                        <div class="col-md-2 webicon">
                                            <a href="ftp/<?=$webspace->id?>" class="btn btn-success btn-fullwidth"><i class="fa fa-files-o"></i><br>Files</a>
                                        </div>
                                        <div class="col-md-2 webicon">
                                            <a href="crons/<?=$webspace->id?>" class="btn btn-success btn-fullwidth"><i class="fa fa-repeat"></i><br>CronJobs</a>
                                        </div>
                                        <div class="col-md-2 webicon">
                                            <a href="mail/<?=$webspace->id?>" class="btn btn-success btn-fullwidth"><i class="fa fa-envelope-o"></i><br>E-Mail</a>
                                        </div>
                                        <div class="col-md-2 webicon">
                                            <a href="databases/<?=$webspace->id?>" class="btn btn-success btn-fullwidth"><i class="fa fa-database"></i><br>SQL</a>
                                        </div>
                                        <div class="col-md-2 webicon">
                                            <a href="autoinstaller/<?=$webspace->id?>" class="btn btn-success btn-fullwidth"><i class="fa fa-magic"></i><br>Autoinstaller</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 5px">
                                        <div class="col-md-6 webicon">
                                            <a href="disable/<?=$webspace->id?>" class="btn btn-warning btn-fullwidth"><i class="fa fa-lock"></i><br>Disable</a>
                                        </div>
                                        <div class="col-md-6 webicon">
                                            <a href="cancel/<?=$webspace->id?>" class="btn btn-danger btn-fullwidth"><i class="fa fa-times"></i><br>Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                No webspaces!
            </div>
        </div>
    </div>
    <?php
}
