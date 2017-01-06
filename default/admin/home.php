<?php
$modules = new \Models\Module_model();
?>
<div class="row" style="margin-bottom: 20px;">
    <?php if($modules->isLoaded("teamspeak")) { ?>
    <div class="col-md-3" style="padding: 0 !important;">
        <div class="col-md-4" style="padding-right: 0;">
            <div class="box2 info">
                <i class="fa fa-headphones"></i>
            </div>
        </div>
        <div class="col-md-8" style="padding-left: 0;">
            <div class="box2x info">
                <span><?=$data['teamspeak_count']?></span>
                <p>Teamspeak Servers</p>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if($modules->isLoaded("gameserver")) { ?>
    <div class="col-md-3" style="padding: 0 !important;">
        <div class="col-md-4" style="padding-right: 0;">
            <div class="box2 success">
                <i class="fa fa-server"></i>
            </div>
        </div>
        <div class="col-md-8" style="padding-left: 0;">
            <div class="box2x success">
                <span><?=$data['gameserver_count']?></span>
                <p>Gameservers</p>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if($modules->isLoaded("webspace")) { ?>
    <div class="col-md-3" style="padding: 0 !important;">
        <div class="col-md-4" style="padding-right: 0;">
            <div class="box2 warning">
                <i class="fa fa-globe"></i>
            </div>
        </div>
        <div class="col-md-8" style="padding-left: 0;">
            <div class="box2x warning">
                <span><?=$data['webspace_count']?></span>
                <p>Webspaces</p>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if($modules->isLoaded("vps") || $modules->isLoaded("dedicated")) { ?>
    <div class="col-md-3" style="padding: 0 !important;">
        <div class="col-md-4" style="padding-right: 0;">
            <div class="box2 danger">
                <i class="fa fa-server"></i>
            </div>
        </div>
        <div class="col-md-8" style="padding-left: 0;">
            <div class="box2x danger">
                <span><?=$data['root_active_count'] + $data['virtual_count']?> <span>(<?=$data['root_count'] + $data['virtual_count']?>)</span></span>
                <p>V-/Rootserver</p>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Welcome to Splash-Wi!
            </div>
            <div class="panel-body">
                Welcome to the Splash-Wi administration area! In this backend you can administrate your
                clients and products, answer open tickets aka. questions that your clients ask, watch your
                business growing and do a lot of other stuff that might be important for you in order to run
                a business! Take a look around and if you have any questions feel free to contact the Splash-Wi
                staff at any time.
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Turnover
            </div>
            <div class="panel-body">
                <span style="font-size: 24px;">Last Month: <span class="success"><?=$data["turnover"]["30days"]?>€</span></span><br>
                <span style="font-size: 20px;">Last Quarter: <span><?=$data["turnover"]["90days"]?>€</span></span><br>
                <span style="font-size: 16px;">Last Half-Year: <span><?=$data["turnover"]["180days"]?>€</span></span><br>
                <span style="font-size: 12px;">Last Year: <span><?=$data["turnover"]["360days"]?>€</span></span><br>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Failed Login Attempts
            </div>
            <div class="panel-body">
                <table class="table" id="paginate">
                    <thead>
                    <tr class="blue">
                        <td style="width: 10%;">
                            Username
                        </td>
                        <td style="width: 20%;">
                            Status
                        </td>
                        <td style="width: 20%;">
                            IP
                        </td>
                        <td style="width: 10%;">
                            Time
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $datax = array_reverse($data["logins"]);
                    foreach($datax as $login) {
                        if($login->status == 0) {
                            $ps = '<span class="danger">Failed</span>';
                        } elseif($login->status == 1) {
                            $ps = '<span class="success">Succeeded</span>';
                        }
                        ?>
                        <tr>
                            <td style="width: 10%;">
                                <?=$login->username?>
                            </td>
                            <td style="width: 20%;">
                                <?=$ps?>
                            </td>
                            <td style="width: 20%;">
                                <?=$login->ip?>
                            </td>
                            <td style="width: 10%;">
                                <?=$login->time?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Updatecheck
            </div>
            <div class="panel-body" style="padding: 0 !important;">
                <?php
                /**
                 * Sample layout.
                 */
                if($data["update"] == "true") {
                    ?>
                    <div class="alert alert-danger" role="alert" style="margin-bottom: 0;">
                        <i class="fa fa-exclamation-circle" style="display: block; font-size: 38px;"></i>
                        <h3 style="margin-top: 10px;">ATTENTION!</h3>
                        A new update is available! We advise to update as fast as possible, to ensure
                        that your installation remains secure and contsists of the newest features, which are available with Splash-Wi!
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-success" role="alert" style="margin-bottom: 0;">
                        <i class="fa fa-exclamation-circle" style="display: block; font-size: 38px;"></i>
                        <h3 style="margin-top: 10px;">Congratulations!</h3>
                        Your software is on the newest version available! You do not need to update your software at this time.
                        However, you might want to check back at a later point to see if any updates are available!
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php if($modules->isLoaded("livechat")) { ?>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Live Support
            </div>
            <div class="panel-body">
                <a href="<?=\Helpers\Url::getUri("admin/livechat")?>" class="btn btn-success">Live Support Area (Livechat)</a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>