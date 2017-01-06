<?php
$modules = new \Models\Module_model();
$user = $data["user"];
foreach($user as $user) {
    //echo "<pre>"; print_r($user); echo "</pre>";
    $admin = new \Models\User_model();

    $avatar = $admin->get_avatar($user->email, 128);
    ?>
    <div class="row profile">
        <div class="col-md-3">
            <center><img src="<?=$avatar?>" alt="" class="img-circle"></center>
        </div>
        <div class="col-md-9">
            <?php
            if(!empty($_GET["twofactor"]) && isset($_GET["twofactor"])) {
                if($_GET["twofactor"] == "removed") {
                    echo '<div class="alert alert-danger"><i class="fa fa-info-circle"></i> Two-Factor-Authentication removed! Your account has become more unsecure.</div>';
                } elseif($_GET["twofactor"] == "success") {
                    echo '<div class="alert alert-success"><i class="fa fa-info-circle"></i> We added twofactor support to your accout! Your account just got even more secure!</div>';
                } elseif($_GET["twofactor"] == "fail") {
                    echo '<div class="alert alert-danger"><i class="fa fa-info-circle"></i> We failed to add twofactor support to your accout!</div>';
                }
            }
            ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Your Account <a href="profile/edit"><i class="fa fa-edit"></i><span>Edit Profile / Change Password</span></a>
                    </div>
                    <div class="panel-body">
                        <?php if(empty($user->firm)) { ?>
                            <h3 style="margin:0;padding:0;"><?=$user->firstname?> <?=$user->lastname?></h3>
                        <?php } else { ?>
                            <h3 style="margin:0;padding:0;"><?=$user->firm?> (<?=$user->firstname?> <?=$user->lastname?>)</h3>
                        <?php } ?>
                        <h2 style="font-size: 15px;"><label>Username:</label> <?=$user->username?> (Client No.: <?=$admin->getClNo($user->id)?>)</h2>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        2-Factor Authentication
                    </div>
                    <div class="panel-body">
                        <?php
                        $a = new \Models\GoogleAuth_model();
                        if(!$a->isAuthenticatorLocked(\Helpers\Session::get("username"))) {
                            if($a->usesAuthenticator(\Helpers\Session::get("username"))) {
                                echo '<a class="btn btn-success" href="'.\Helpers\Url::getUri("dashboard/twofactor").'">Finish Two-Factor Setup</a>';
                            } else {
                                echo '<a class="btn btn-success" href="'.\Helpers\Url::getUri("dashboard/addtwofactor").'">Add Two-Factor Authentication</a>';
                            }
                        } else {
                            ?>
                            <form action="removetwofactor" method="post">
                                <input name="code" class="form-control" placeholder="Authenticator Code" required><br>
                                <button class="btn btn-danger" type="submit">Remove Two-Factor Authentication</button>
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form action="usediscount" method="post">
                            <div class="panel panel-default" style="margin:0;padding:0;">
                                <div class="panel-heading">
                                    Use a discount code...
                                </div>
                                <div class="panel-body">
                                    <input type="text" class="form-control" name="coupon" placeholder="Your Coupon Code"><br>
                                    <button type="submit" class="btn btn-success">Use this coupon...</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default" style="margin:0;padding:0;">
                            <div class="panel-heading">
                                Your Balance
                            </div>
                            <div class="panel-body">
                                <?=$user->currency?> <?=$user->balance?>€
                            </div>
                        </div>
                    </div>
                </div><br>
                <?php if($modules->isLoaded("payment")) { ?>
                <form action="usediscount" method="post">
                    <div class="panel panel-default">
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
                <?php } ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Your Address
                    </div>
                    <div class="panel-body">
                        <?php
                        if(!empty($user->street) && !empty($user->housenumber) && !empty($user->postalcode) && !empty($user->city) && !empty($user->state) && !empty($user->country)) {
                            ?>
                            <label>Address:</label><br>
                            <?=$user->street?> <?=$user->housenumber?> <?=$user->adressadding?><br>
                            <?=$user->postalcode?> <?=$user->city?><br>
                            <?=$user->state?>, <?=$user->country?>
                            <?php
                        } else {
                            ?>
                            No address defined!
                            <?php
                        }
                        ?>
                    </div>
                </div>

            <label>Your referral link:</label>
            <input class="form-control" value="<?="http://" . $_SERVER['SERVER_NAME'] . DIR . 'ref/' . $user->id?>" readonly>
        </div>
    </div>
    <?php
}
?>


