<?php
/**
 * Sample layout.
 */
?>
<div class="row">
    <div class="col-md-3 col-md-offset-9 webicon" style="padding: 0 15px;">
        <a data-toggle="modal" data-target="#Modal2" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Teamspeak</a><br><br>
    </div>
</div>
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add a Teamspeak server</h4>
            </div>
            <form action="add" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="masterid">Master</label>
                            <select class="form-control" name="masterid">
                                <?php
                                foreach($data["masters"] as $master) {
                                    echo "<option value='".$master->id."'>Master #".$master->id." (".$master->ip.")</option>";
                                }
                                ?>
                            </select>
                            <label for="owner">Client</label>
                            <select class="form-control" name="owner">
                                <?php
                                foreach($data["users"] as $user) {
                                    echo "<option value='".$user->username."'>".$user->username."</option>";
                                }
                                ?>
                            </select>
                            <label for="maxclients">Maximum Clients</label>
                            <input class="form-control" type="number" name="maxclients">
                            <label for="productid">Product</label>
                            <select class="form-control" name="productid">
                                <?php
                                $mm = new \Models\Payment_model();
                                $products = $mm->getProducts("voiceserver");
                                foreach ($products as $product) {
                                    echo '<option value="'.$product->id.'">'.$product->name.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add this Teamspeak server</button>
                </div>
            </form>
        </div>
    </div>
</div>