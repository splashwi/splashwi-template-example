<?php
/**
 * Sample layout.
 */
use Helpers\Url;

$modules = new \Models\Module_model();
?>
<div class="row" style="margin-bottom: 20px;">
    <?php if($modules->isLoaded("teamspeak") || $modules->isLoaded("webspace") || $modules->isLoaded("gameserver") || $modules->isLoaded("vps") || $modules->isLoaded("dedicated")) { ?>
    <div class="col-md-3" style="padding: 0 !important;">
        <div class="col-md-4" style="padding-right: 0;">
            <div class="box2 info">
                <i class="fa fa-server"></i>
            </div>
        </div>
        <div class="col-md-8" style="padding-left: 0;">
            <div class="box2x info">
                <span><?=$data['teamspeak_count'] + $data['gameserver_count'] + $data['webspace_count'] + $data['root_active_count'] + $data['virtual_count']?></span>
                <p>Servers</p>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if($modules->isLoaded("domains")) { ?>
    <div class="col-md-3" style="padding: 0 !important;">
        <div class="col-md-4" style="padding-right: 0;">
            <div class="box2 success">
                <i class="fa fa-globe"></i>
            </div>
        </div>
        <div class="col-md-8" style="padding-left: 0;">
            <div class="box2x success">
                <span>0</span></span>
                <p>Domains</p>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if($modules->isLoaded("tickets")) { ?>
    <div class="col-md-3" style="padding: 0 !important;">
        <div class="col-md-4" style="padding-right: 0;">
            <div class="box2 warning">
                <i class="fa fa-ticket"></i>
            </div>
        </div>
        <div class="col-md-8" style="padding-left: 0;">
            <div class="box2x warning">
                <span><?=$data['tickets']?></span></span>
                <p>Open Tickets</p>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if($modules->isLoaded("ref")) { ?>
    <div class="col-md-3" style="padding: 0 !important;">
        <div class="col-md-4" style="padding-right: 0;">
            <div class="box2 danger">
                <i class="fa fa-users"></i>
            </div>
        </div>
        <div class="col-md-8" style="padding-left: 0;">
            <div class="box2x danger">
                <span><?=$data['ref']?></span></span>
                <p>Referred Users</p>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<div class="row">
    <div class="col-md-9">
        <?php
        $a = new \Models\GoogleAuth_model();
        if(!$a->isAuthenticatorLocked(\Helpers\Session::get("username"))) {
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Two-Factor Authentication
                    </div>
                    <div class="panel-body">
                        <?php
                            echo "<div class='text-center' style='margin-bottom: 6px;'>Protect your account now!</div>";
                            if($a->usesAuthenticator(\Helpers\Session::get("username"))) {
                                echo '<a class="btn btn-success" href="'.\Helpers\Url::getUri("dashboard/twofactor").'">Finish Two-Factor Setup</a>';
                            } else {
                                echo '<a class="btn btn-success" href="'.\Helpers\Url::getUri("dashboard/addtwofactor").'">Add Two-Factor Authentication</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Why Two-Factor Authentication?
                    </div>
                    <div class="panel-body">
                        Two-Factor-Authentication adds an extra layer of security to your account by
                        requireing a one-time password every time you log in to your account! We
                        strongly advise using it!
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        if(isset($_GET["funds"]) && !empty($_GET["funds"])) {
            if($_GET["funds"] == "true") {
                ?>
                <div class="alert alert-success">
                    Your payment was processed successfully and the funds
                    have been added to your account!
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-danger">
                    Your payment could not be processed. Please try again
                    later!
                </div>
                <?php
            }
        }
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Welcome to Splash-Wi!</h3>
            </div>
            <div class="panel-body">
                Welcome to the Splash-Wi clientarea. From here you can administrate all of your servers and services.
                If you just registered, we advise to add some funds to your account, so we can activate your products!
                We wish you a lot of success and luck for all of your upcoming projects and we are happy that you decided
                to sign up with <?=SITETITLE?> (A business powered by Splash-Wi)!
            </div>
        </div>
        <?php if($modules->isLoaded("news")) { ?>
        <?php
        $nm = new \Models\News_model();
        $news = $nm->getAllNews();
        if(count($news) > 0) {
            foreach($news as $article) {
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?=$article->headline?></h3>
                </div>
                <div class="panel-body">
                    <?=$article->content?>
                </div>
            </div>
            <?php
            }
        } else {
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">No News available!</h3>
                </div>
                <div class="panel-body">
                    As soon as the first article is published, you will find it right here!
                </div>
            </div>
            <?php
        }
        ?>
        <?php } ?>
    </div>
    <div class="col-md-3">
        <?php if($modules->isLoaded("payment")) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Balance: <?php $data["user"][0]->currency ?> <?=$data["user"][0]->balance?>€
            </div>
        </div>
        <?php } ?>
        <?php if($modules->isLoaded("payment")) { ?>
        <form action="usediscount" method="post">
            <div class="panel panel-default" style="margin:0;padding:0;">
                <div class="panel-heading">
                    Use a discount code...
                </div>
                <div class="panel-body">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-ticket"></i></span>
                        <input type="text" class="form-control" name="coupon" placeholder="Your Coupon Code" required>
                    </div><br>
                    <button type="submit" class="btn btn-success">Use this coupon...</button>
                </div>
            </div>
        </form>
        <?php } ?><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                Quick Actions:
            </div>
            <div class="panel-body">
                <?php if($modules->isLoaded("tickets")) { ?>
                <a href="<?= Url::getUri("dashboard/ticket/open"); ?>" class="btn btn-primary spaced"><i class="fa fa-edit"></i> Open Ticket</a>
                <?php } ?>
                <a href="<?= Url::getUri("dashboard/profile"); ?>" class="btn btn-primary spaced"><i class="fa fa-user"></i> My Profile</a>
                <?php if($modules->isLoaded("payment")) { ?>
                <a href="<?= Url::getUri("dashboard/funds/add"); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add Funds</a>
                <?php } ?>
            </div>
        </div>
        <?php if($modules->isLoaded("ref")) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Referral Program
            </div>
            <div class="panel-body">
                <a href="<?= Url::getUri("dashboard/referral"); ?>" class="btn btn-success"><i class="fa fa-users"></i> Referral Dashboard</a>
            </div>
        </div>
        <?php } ?>
        <?php if($modules->isLoaded("ratings")) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">My Rating</h3>
            </div>
            <div class="panel-body">
                <?php
                $rm = new \Models\Rating_model();
                if($rm->canRate(Helpers\Session::get("username"))) {
                    if(!$rm->hasRated(Helpers\Session::get("username"))) {
                        ?>
                        <div class="alert alert-success"><i class="fa fa-info-circle"></i> You have not rated us yet! You may want to consider doing so...</div>
                        <a href="addrating" class="btn btn-success"><i class="fa fa-plus-circle"></i> Rate us now!</a>
                        <?php
                    } else {
                        $rating = $rm->getRating(Helpers\Session::get("username"));
                        ?>
                        <div class="alert alert-success"><i class="fa fa-info-circle"></i> Thanks for your rating!</div>
                        <p class="text-center rating">
                            <?php
                            for ($i = 0; $i < round($rating->score, 0); $i++) {
                                echo '<i class="fa fa-star"></i>';
                            }
                            for ($i = 0; $i < (5-round($rating->score, 0)); $i++) {
                                echo '<i class="fa fa-star-o"></i>';
                            }
                            ?><br>
                            Overall Score: <?=$rating->score?> / 5
                        </p>
                        <p class="text-center">
                            Quality Score: <?=$rating->score_quality?> / 5<br>
                            Usability Score: <?=$rating->score_usability?> / 5<br>
                            Performance Score: <?=$rating->score_performance?> / 5<br>
                            Implementation Score: <?=$rating->score_implementation?> / 5<br>
                            Support Score: <?=$rating->score_support?> / 5
                        </p>
                        <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-danger"><i class="fa fa-info-circle"></i> You are not eligable to write a rating! You need to be with us for at
                        least 31 days in order to review our products!</div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>