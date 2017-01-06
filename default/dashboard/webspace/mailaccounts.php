<div class="jumbotron" style="padding: 0; margin-bottom: 12px;">
    <div class="row">
        <div class="col-md-12" style="line-height: 34px; padding-left: 40px;">
            Webspace <label>#web<?=$data['webspaceid']?></label><div class="pull-right"><a class="btn btn-primary btn-small" href="../<?=$data['webspaceid']?>"><i class="fa fa-arrow-circle-left"></i> Back</a></div>
        </div>
    </div>
</div>
<?php
//echo "<pre>"; print_r($data['mailAccounts']); echo "</pre>";
if(count($data['mailAccounts']) > 0) {
    foreach ($data['mailAccounts'] as $mail) {
        ?>
        <div class="jumbotron" style="padding: 0; margin-bottom: 12px;">
            <div class="row">
                <div class="col-md-3" style="line-height: 34px; padding-left: 40px;">
                    <?= $mail->mail_account . "@" . $mail->mail_domain ?>
                </div>
                <div class="col-md-3" style="line-height: 34px; padding-left: 40px;">
                    <?php
                    $pwhelper = new \Helpers\Password();
                    echo $pwhelper->decryptPassword($mail->mail_password);
                    ?>
                </div>
                <div class="col-md-offset-3 col-md-3">
                    <form action="../deleteMail" method="post">
                        <input type="hidden" name="webspaceid" value="<?= $data['webspaceid'] ?>">
                        <input type="hidden" name="maildomain" value="<?= $mail->mail_domain ?>">
                        <input type="hidden" name="mailaccount" value="<?= $mail->mail_account ?>">
                        <input type="hidden" name="mailid" value="<?= $mail->id ?>">
                        <button class="btn btn-danger btn-fullwidth"><i class="fa fa-trash-o"></i> Delete E-Mail Adress
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    ?>
    <div class="jumbotron" style="padding: 0; margin-bottom: 12px;">
        <div class="row">
            <div class="col-md-12" style="line-height: 34px; padding-left: 40px;">
                No E-Mail Accounts!
            </div>
        </div>
    </div>
    <?php
}
?>
<div class="row">
    <div class="col-md-3 col-md-offset-6 webicon" style="padding: 0 15px;">
        <a href="<?=$data['webmail']?>" class="btn btn-info btn-fullwidth"><i class="fa fa-envelope-o"></i><br>Webmail Login</a><br><br>
    </div>
    <div class="col-md-3 webicon" style="padding: 0 15px;">
        <a data-toggle="modal" data-target="#Modal2" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a E-Mail address</a><br><br>
    </div>
</div>
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add a E-Mail account</h4>
            </div>
            <form action="../addMail" method="post">
                <div class="modal-body">
                    <label for="subdomain">E-Mail</label><br>
                    <div class="row">
                        <input type="hidden" name="webspaceid" value="<?=$data['webspaceid']?>">
                        <div class="col-md-5">
                            <input class="form-control" name="accountname" placeholder="mymail">
                        </div>
                        <div class="col-md-1" style="line-height: 34px;">
                            <center>@</center>
                        </div>
                        <div class="col-md-6">
                            <select name="domain" class="form-control">
                                <?php
                                foreach($data["domains"] as $domain) {
                                    $dotcnt = explode(".", $domain->domain);
                                    $dotcnt = count($dotcnt);
                                    if($dotcnt == 2) {
                                        ?>
                                        <option>
                                            <?= $domain->domain ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="password">Password</label>
                            <input name="password" class="form-control" type="password">
                            <label for="repeat_password">Repeat Password</label>
                            <input name="repeat_password" class="form-control" type="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add this E-Mail account</button>
                </div>
            </form>
        </div>
    </div>
</div>
