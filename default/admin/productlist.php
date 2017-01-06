<?php
$res = $data["productorder"];
?>
<div class="row">
    <div class="col-md-12">
            <?php
            foreach($res as $res) {
                ?>
                <table class="table">
                <?php
                /*
                echo "<pre>";
                print_r($res);
                echo "</pre>";
                */
                echo "<tr class='blue'><td>".$res["category"]."</td><td></td><td></td><td><a href='deletecategory/".$res["id"]."' class='btn btn-danger'><i class='fa fa-trash'></i> Delete</a></td></tr>";
                foreach($res["products"] as $product) {
                    /*echo "<pre>";
                    print_r($product);
                    echo "</pre>";*/
                    echo "<tr><td>".$product->name."</td><td>$".$product->price."USD / p.m.</td><td><button class='btn btn-default'><i class='fa fa-pencil'></i> Edit Product</button></td><td><a href='deleteproduct/".$product->id."' class='btn btn-danger'><i class='fa fa-trash'></i> Delete</a></td></tr>";
                }
                if(count($res["products"]) == 0) {
                    echo "<tr class='red'><td>No items in this category!</td><td></td><td></td><td></td></tr>";
                }
                ?>
                </table>
                <?php
            }
            ?>
        <div class="row">
            <div class="col-md-3 col-md-offset-6 webicon" style="line-height: 34px; padding-left: 40px;">
                <a data-toggle="modal" data-target="#Modal2" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Category</a><br><br>
            </div>
            <div class="col-md-3 webicon" style="line-height: 34px; padding-left: 40px;">
                <a data-toggle="modal" data-target="#Modal1" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Product</a><br><br>
            </div>
        </div>
        <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add a Category</h4>
                    </div>
                    <form action="category/add" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Name</label>
                                    <input type="text" placeholder="Category Name" name="category" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add this Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add a Product</h4>
                    </div>
                    <form action="product/add" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Name</label>
                                    <input type="text" placeholder="Product Name" name="name" class="form-control">
                                    <label>Description</label>
                                    <textarea placeholder="Description" name="description" class="form-control"></textarea>
                                    <label>Category</label>
                                    <select name="category" class="form-control">
                                        <?php
                                        $m = new \Models\Product_model();
                                        $c = $m->getCategories();
                                        foreach($c as $c) {
                                        echo '<option value="'.$c->id.'">'.$c->name.'</option>';
                                        } ?>
                                    </select>
                                    <label>Type</label>
                                    <select name="type" class="form-control">
                                        <option value="teamspeak">Teamspeak 3</option>
                                        <option value="gameserver">Gameserver</option>
                                        <option value="webspace">Webspace</option>
                                    </select>
                                    <br><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Teamspeak
                                    </button><br><br>
                                    <div class="collapse" id="collapseExample">
                                        <div class="">
                                            <label>Master</label>
                                            <select class="form-control" name="voicemaster">
                                                <?php
                                                $m = new \Models\Teamspeak_model();
                                                $ma = $m->get_mservers();
                                                foreach ($ma as $ma) {
                                                    echo '<option value="'.$ma->id.'">'.$ma->ip.' (ID: '.$ma->id.')</option>';
                                                }
                                                if(count($ma) == 0) {
                                                    echo '<option>No Masters!</option>';
                                                }
                                                ?>
                                            </select>
                                            <label>Slots</label>
                                            <input class="form-control" value="12" type="number" name="voiceslots">
                                        </div><br><br>
                                    </div>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                                        Gameserver
                                    </button><br><br>
                                    <div class="collapse" id="collapseExample2">
                                        <div class="">
                                            <label>Master</label>
                                            <select class="form-control" name="gamemaster">
                                                <?php
                                                $m = new \Models\Gameserver_model();
                                                $ma = $m->get_mservers();
                                                foreach ($ma as $ma) {
                                                    echo '<option value="'.$ma->id.'">'.$ma->ip.' (ID: '.$ma->id.')</option>';
                                                }
                                                if(count($ma) == 0) {
                                                    echo '<option>No Masters!</option>';
                                                }
                                                ?>
                                            </select>
                                            <label>Game</label>
                                            <select class="form-control" name="game">
                                                <option value="mc_vanilla">Minecraft Vanilla</option>
                                                <option value="mc_bukkit">Minecraft Bukkit</option>
                                                <option value="mc_spigot">Minecraft Spigot</option>
                                            </select>
                                            <label>Slots</label>
                                            <input class="form-control" value="20" type="number" name="gameslots">
                                            <label>Ram (in MB)</label>
                                            <input class="form-control" value="1024" type="number" name="gameram">
                                        </div><br><br>
                                    </div>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                                        Webspace
                                    </button><br><br>
                                    <div class="collapse" id="collapseExample3">
                                        <div class="">
                                            <label>Master</label>
                                            <select class="form-control" name="webmaster">
                                                <?php
                                                $m = new \Models\Webspace_model();
                                                $ma = $m->get_mservers();
                                                foreach ($ma as $ma) {
                                                    echo '<option value="'.$ma->id.'">'.$ma->vst_hostname.' (ID: '.$ma->id.')</option>';
                                                }
                                                if(count($ma) == 0) {
                                                    echo '<option>No Masters!</option>';
                                                }
                                                ?>
                                            </select>
                                            <label>Package</label>
                                            <select class="form-control" name="webpackage">
                                                <?php
                                                $m = new \Models\Webspace_model();
                                                $ma = $m->get_packages();
                                                foreach ($ma as $ma) {
                                                    echo '<option value="'.$ma->id.'">'.$ma->name.' (ID: '.$ma->id.')</option>';
                                                }
                                                if(count($ma) == 0) {
                                                    echo '<option>No Packages!</option>';
                                                }
                                                ?>
                                            </select>
                                        </div><br><br>
                                    </div>
                                    <label>Price (in USD)</label>
                                    <input type="text" placeholder="0.00" name="price" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add this Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
