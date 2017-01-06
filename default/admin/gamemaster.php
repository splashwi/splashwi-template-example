<?php $passwordhelper = new \Helpers\Password(); ?>
<table class="table" id="paginate">
    <thead>
    <tr class="blue">
        <td>
            ID
        </td>
        <td>
            Hostname
        </td>
        <td>
            Username
        </td>
        <td>
            Password
        </td>
        <td>
            Action
        </td>
    </tr>
    </thead>
    <tbody>
<?php
foreach($data["masters"] as $master) {
    ?>
        <tr>
            <td>
                m_w<?=$master->id?>
            </td>
            <td>
                <?=$master->ip?>:<?=$master->port?>
            </td>
            <td>
                <?=$master->ssh_username?>
            </td>
            <td>
                <?=$passwordhelper->decryptPassword($master->ssh_password);?>
            </td>
            <td>
                <a class="btn btn-danger btn-fullwidth" href="masters/delete/<?=$master->id?>"><i class="fa fa-trash-o"></i> Delete</a>
            </td>
        </tr>
    <?php
}
?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-3 col-md-offset-9 webicon" style="line-height: 34px; padding-left: 40px;">
        <a data-toggle="modal" data-target="#Modal2" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Gameserver master</a><br><br>
    </div>
</div>
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add a Gameserver master</h4>
            </div>
            <form action="masters/add" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="ip">SSH IP</label>
                            <input class="form-control" name="ip">
                            <label for="port">SSH Port</label>
                            <input class="form-control" name="port">
                            <label for="username">SSH Username</label>
                            <input class="form-control" name="username">
                            <label for="password">SSH Password</label>
                            <input class="form-control" name="password" type="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add this Gameserver master</button>
                </div>
            </form>
        </div>
    </div>
</div>
