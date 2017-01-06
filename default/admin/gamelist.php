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
                Game
            </td>
            <td>
                Master
            </td>
            <td>
                Actions
            </td>
            <td>

            </td>
            <td>

            </td>
            <td>

            </td>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($data["list"] as $gameserver) {
        ?>
        <tr>
            <td>
                g<?=$gameserver->id?>
            </td>
            <td>
                <?=$gameserver->owner?>
            </td>
            <td>
                <?=$gameserver->game?>
            </td>
            <td>
                m_w<?=$gameserver->master_id?>
            </td>
            <td>
                <a class="btn btn-success btn-fullwidth" href="start/<?=$gameserver->id?>"><i class="fa fa-play"></i> Start</a>
            </td>
            <td>
                <a class="btn btn-danger btn-fullwidth" href="stop/<?=$gameserver->id?>"><i class="fa fa-stop"></i> Stop</a>
            </td>
            <td>
                <a class="btn btn-warning btn-fullwidth" href="restart/<?=$gameserver->id?>"><i class="fa fa-circle"></i> Restart</a>
            </td>
            <td>
                <a class="btn btn-danger btn-fullwidth" href="delete/<?=$gameserver->id?>"><i class="fa fa-trash-o"></i> Delete</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-3 col-md-offset-9 webicon" style="line-height: 34px; padding-left: 40px;">
        <a data-toggle="modal" data-target="#Modal2" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Gameserver</a><br><br>
    </div>
</div>
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add a Gameserver</h4>
            </div>
            <form action="add" method="post">
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
                            <label for="username">Master</label>
                            <select class="form-control" name="master">
                                <?php
                                foreach($data["masters"] as $master) {
                                    echo "<option value='".$master->id."'>g_m".$master->id." (".$master->ip.")</option>";
                                }
                                ?>
                            </select>
                            <label for="port">Server Port</label>
                            <input name="port" type="number" min="10000" max="99999" class="form-control" placeholder="25565">
                            <label for="game">Game</label>
                            <select class="form-control" name="game">
                                <option value="mc_vanilla">Minecraft: Vanilla</option>
                                <option value="mc_bukkit">Minecraft: Bukkit</option>
                                <option value="mc_spigot">Minecraft: Spigot</option>
                            </select>
                            <label for="slots">Slots</label>
                            <input name="slots" type="number" min="1" class="form-control" placeholder="20">
                            <label for="ram">Ram (in MegaByte)</label>
                            <input name="ram" type="number" min="128" class="form-control" placeholder="128">
                            <label for="productid">Product</label>
                            <select class="form-control" name="productid">
                                <?php
                                $mm = new \Models\Payment_model();
                                $products = $mm->getProducts("gameserver");
                                foreach ($products as $product) {
                                    echo '<option value="'.$product->id.'">'.$product->name.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add this Gameserver</button>
                </div>
            </form>
        </div>
    </div>
</div>
