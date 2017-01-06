<?php
/**
 * Created by PhpStorm.
 * User: Marcel Menk
 * Date: 01.04.2016
 * Time: 13:00
 */
?>
<div class="jumbotron" style="padding: 0; margin-bottom: 12px;">
    <div class="row">
        <div class="col-md-12" style="line-height: 34px; padding-left: 40px;">
            Webspace <label>#web<?=$data['webspaceid']?></label><div class="pull-right"><a class="btn btn-primary btn-small" href="../<?=$data['webspaceid']?>"><i class="fa fa-arrow-circle-left"></i> Back</a></div>
        </div>
    </div>
</div>
<?php
//echo "<pre>"; print_r($data['mailAccounts']); echo "</pre>";
if(count($data['sqlDatabases']) > 0) {
    foreach($data['sqlDatabases'] as $database) {
    ?>
    <div class="jumbotron" style="padding: 0; margin-bottom: 12px;">
        <div class="row">
            <div class="col-md-3" style="line-height: 34px; padding-left: 40px;">
                <label>SQL-HOST:</label> <?= $data["masterip"]; ?><br>
                <label>SQL-USER:</label> <?=$database->username."_".$database->db_user?><br>
                <label>SQL-PASSWORD:</label> <?php $pwhelper = new \Helpers\Password(); echo $pwhelper->decryptPassword($database->db_pass); ?><br>
                <label>SQL-DB:</label> <?=$database->username."_".$database->db_name?><br>
            </div>
            <div class="col-md-offset-6 col-md-3">
                <form action="../deleteDatabase" method="post">
                    <input type="hidden" name="webspaceid" value="<?= $data['webspaceid'] ?>">
                    <input type="hidden" name="databaseid" value="<?=$database->id?>">
                    <button class="btn btn-danger btn-fullwidth"><i class="fa fa-trash-o"></i> Delete Database</button>
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
                No Databases!
            </div>
        </div>
    </div>
    <?php
}
?>
<div class="row">
    <div class="col-md-3 col-md-offset-6 webicon" style="padding: 0 15px;">
        <a href="http://<?= $data["masterip"]; ?>/phpmyadmin" class="btn btn-info btn-fullwidth"><i class="fa fa-database"></i><br>PHPMyAdmin</a><br><br>
    </div>
    <div class="col-md-3 webicon" style="padding: 0 15px;">
        <a data-toggle="modal" data-target="#Modal2" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Database</a><br><br>
    </div>
</div>
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add a SQL Database</h4>
            </div>
            <form action="../addDatabase" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="webspaceid" value="<?=$data['webspaceid']?>">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="username">Database Username</label>
                            <input name="username" class="form-control" type="text">
                            <label for="password">Database Password</label>
                            <input name="password" class="form-control" type="password">
                            <label for="repeat_password">Repeat Database Password</label>
                            <input name="repeat_password" class="form-control" type="password">
                            <label for="name">Database Name</label>
                            <input name="name" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add this SQL database</button>
                </div>
            </form>
        </div>
    </div>
</div>