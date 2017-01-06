<?php
$passwordhelper = new \Helpers\Password();
$vmodel = new \Models\Virtual_model();
?>
<table class="table" id="paginate">
    <thead>
        <tr class="blue">
            <td style="width: 5%;">
                ID
            </td>
            <td style="width: 25%;">
                Hostname
            </td>
            <td style="width: 25%;">
                API Key
            </td>
            <td style="width: 25%;">
                Password
            </td>
            <td style="width: 20%;">
                Delete
            </td>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($data["masters"] as $master) {
        ?>
        <tr>
            <td style="width: 5%;">
                m_v<?=$master->id?>
            </td>
            <td style="width: 25%;">
                <?=$master->ip?>
            </td>
            <td style="width: 25%;">
                <?=$passwordhelper->decryptPassword($master->apikey);?>
            </td>
            <td style="width: 25%;">
                <?=$passwordhelper->decryptPassword($master->password);?>
            </td>
            <td style="width: 20%;">
                <a class="btn btn-danger btn-fullwidth" href="master/delete/<?=$master->id?>"><i class="fa fa-trash-o"></i> Delete</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-3 col-md-offset-9 webicon" style="line-height: 34px; padding-left: 40px;">
        <a data-toggle="modal" data-target="#Modal2" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Virtualserver master</a><br><br>
    </div>
</div>
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add a Virtualserver master</h4>
            </div>
            <form action="master/add" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="ip">IP</label>
                            <input class="form-control" name="ip">
                            <label for="username">API Key</label>
                            <input class="form-control" name="apikey">
                            <label for="password">Password</label>
                            <input class="form-control" name="password" type="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add this Virtualserver master</button>
                </div>
            </form>
        </div>
    </div>
</div>