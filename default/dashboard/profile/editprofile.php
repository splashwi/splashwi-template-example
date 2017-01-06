<?php
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
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Edit Profile</a></li>
                <li role="presentation"><a href="#password" aria-controls="password" role="tab" data-toggle="tab">Change Password</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="profile">
                    <br><?php
                    if(isset($_GET["updated"]) && !empty($_GET["updated"])) {
                        if($_GET["updated"] == "true") {
                            ?>
                            <div class="alert alert-success"><i class="fa fa-info-circle"></i> Your profile has been updated!</div>
                            <?php
                        } else {
                            ?>
                            <div class="alert alert-danger"><i class="fa fa-info-circle"></i> Could not update your profile!</div>
                            <?php
                        }
                    }
                    if(isset($_GET["updatedpw"]) && !empty($_GET["updatedpw"])) {
                        if($_GET["updatedpw"] == "true") {
                            ?>
                            <div class="alert alert-success"><i class="fa fa-info-circle"></i> Your password has been changed!</div>
                            <?php
                        } else {
                            ?>
                            <div class="alert alert-danger"><i class="fa fa-info-circle"></i> Your password could not be changed!</div>
                            <?php
                        }
                    }
                    ?>
                    <h2><label>Username:</label> <?=$user->username?></h2>
                    <form action="update" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Firstname:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    <input class="form-control" name="firstname" value="<?=$user->firstname?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Lastname:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    <input class="form-control" name="lastname" value="<?=$user->lastname?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Firm:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-building"></i></span>
                                    <input class="form-control" name="firm" value="<?=$user->firm?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>E-Mail:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                    <input class="form-control" name="email" value="<?=$user->email?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Street:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-road"></i></span>
                                    <input class="form-control" name="street" value="<?=$user->street?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Housenumber:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-home"></i></span>
                                    <input class="form-control" name="housenumber" value="<?=$user->housenumber?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Additional Adress Info:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-plus"></i></span>
                                    <input class="form-control" name="adressadding" value="<?=$user->adressadding?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Postalcode:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
                                    <input class="form-control" name="postalcode" value="<?=$user->postalcode?>">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label>City:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map"></i></span>
                                    <input class="form-control" name="city" value="<?=$user->city?>">
                                </div>
                            </div>
                        </div>
                        <div class="row spaced">
                            <div class="col-md-6">
                                <label>State:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-o"></i></span>
                                    <input class="form-control" name="state" value="<?=$user->state?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Country:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-globe"></i></span>
                                    <input class="form-control" name="country" value="<?=$user->country?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Submit changes</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="password">
                    <br><h2><label>Username:</label> <?=$user->username?></h2>
                    <form action="updatepassword" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Old Password:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i></span>
                                    <input type="password" class="form-control" name="password_old" placeholder="Old Password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>New Password:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="New Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Repeat new Password:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock"></i></span>
                                    <input type="password" class="form-control" name="password_repeat" placeholder="Repeat new Password">
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>


