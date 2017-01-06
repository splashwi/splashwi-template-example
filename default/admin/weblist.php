<?php $passwordhelper = new \Helpers\Password(); ?>
<table class="table" id="paginate">
    <thead>
        <tr class="blue">
            <td>
                ID
            </td>
            <td>
                Owner
            </td>
            <td>
                Username
            </td>
            <td>
                Password
            </td>
            <td>
                Package
            </td>
            <td>
                Master
            </td>
            <td>
                Action
            </td>
        </tr>
    </thead>
    <tbody>
<?php
foreach($data["list"] as $webspace) {
    ?>
        <tr>
            <td>
                w<?=$webspace->id?>
            </td>
            <td>
                <?=$webspace->owner?>
            </td>
            <td>
                <?=$webspace->username?>
            </td>
            <td>
                <?=$passwordhelper->decryptPassword($webspace->password);?>
            </td>
            <td>
                <?=$webspace->package?>
            </td>
            <td>
                m_w<?=$webspace->master_id?>
            </td>
            <td>
                <a class="btn btn-danger btn-fullwidth" href="web/delete/<?=$webspace->id?>"><i class="fa fa-trash-o"></i> Delete</a>
            </td>
        </tr>
    <?php
}
?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-3 col-md-offset-9 webicon" style="line-height: 34px; padding-left: 40px;">
        <a data-toggle="modal" data-target="#Modal2" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Webspace</a><br><br>
    </div>
</div>
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add a Webspace</h4>
            </div>
            <form action="web/add" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="username">Owner</label>
                            <select class="form-control" name="owner">
                                <?php
                                foreach($data["users"] as $user) {
                                    echo "<option value='".$user->username."'>".$user->username."</option>";
                                }
                                ?>
                            </select>
                            <label for="username">Username</label>
                            <input class="form-control" name="username" value="w<?=$data["webmodel"]->getNextID()?>" readonly>
                            <label for="password">Password</label>
                            <input class="form-control" name="password" type="password">
                            <label for="email">E-Mail</label>
                            <input class="form-control" name="email">
                            <label for="username">Master</label>
                            <select class="form-control" name="master">
                                <?php
                                foreach($data["masters"] as $master) {
                                    echo "<option value='".$master->id."'>w_m".$master->id." (".$master->vst_hostname.")</option>";
                                }
                                ?>
                            </select>
                            <label for="package">Package</label>
                            <select class="form-control" name="package" <?php if(empty($data["packages"])) { ?>readonly<?php } ?>>
                                <?php
                                if(!empty($data["packages"])) {
                                    foreach($data["packages"] as $package) {
                                        echo "<option value='".$package->name."'>package".$package->id." (".$package->name.")</option>";
                                    }
                                } else {
                                    echo "<option>No packages available!</option>";
                                }
                                ?>
                            </select>
                            <label for="productid">Product</label>
                            <select class="form-control" name="productid">
                                <?php
                                $mm = new \Models\Payment_model();
                                $products = $mm->getProducts("webspace");
                                foreach ($products as $product) {
                                    echo '<option value="'.$product->id.'">'.$product->name.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-fullwidth" <?php if(empty($data["packages"])) { ?>disabled<?php } ?>><i class="fa fa-plus-circle"></i><br>Add this Webspace</button>
                </div>
            </form>
        </div>
    </div>
</div>
