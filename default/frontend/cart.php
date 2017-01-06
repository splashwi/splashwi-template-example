<div class="col-md-9 font">
<?php
$cart = $data["cart"];
$total = 0.00;
if(!empty($cart) && isset($cart)) {
    $cnt = 0;
    foreach ($cart as $cart) {
        if($cart->productid > 0) {
            $m2 = new \Models\Product_model();
            $product = $m2->getProduct($cart->productid);
            $total = $total + $product[0]->price;
            ?>
            <br>
            <div class="col-md-12">
                <div class="well cart-item
                <?php
                if ($cnt % 2 == 0) {
                    echo "cart-even";
                } else {
                    echo "cart-odd";
                }
                ?>
                ">
                    <div class="row">
                        <div class="col-md-1 cartico">
                            <?php if($product[0]->type == "gameserver") { ?>
                                <i class="fa fa-server"></i>
                            <?php } if($product[0]->type == "teamspeak") { ?>
                                <i class="fa fa-headphones"></i>
                            <?php } if($product[0]->type == "webspace") { ?>
                                <i class="fa fa-wordpress"></i>
                            <?php } ?>
                        </div>
                        <div class="col-md-7">
                            <?php echo $product[0]->name ?><br><br>
                            <?php if($product[0]->type == "gameserver") { ?>
                                Slots: <?php echo $product[0]->gameserver_slots; ?><br>
                                RAM: <?php echo $product[0]->gameserver_ram; ?>
                                <?php if($product[0]->gameserver_game == "mc_vanilla") { ?>
                                    Game: Minecraft (Vanilla)
                                <?php } elseif($product[0]->gameserver_game == "mc_bukkit") { ?>
                                    Game: Minecraft (Bukkit)
                                <?php } elseif($product[0]->gameserver_game == "mc_spigot") { ?>
                                    Game: Minecraft (Spigot)
                                <?php } ?><br>
                            <?php } elseif($product[0]->type == "teamspeak") { ?>
                                Slots: <?php echo $product[0]->voiceserver_slots; ?>
                            <?php } elseif($product[0]->type == "webspace") { ?>

                            <?php } ?>
                        </div>
                        <div class="col-md-2">
                            €<?php echo $product[0]->price ?> EUR
                        </div>
                        <div class="col-md-2">
                            <a href="removecart/<?php echo $cnt ?>" class="btn btn-fullwidth btn-danger"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else {
            ?>
            <br>
            <div class="col-md-12">
                <div class="well cart-item
                <?php
                if ($cnt % 2 == 0) {
                    echo "cart-even";
                } else {
                    echo "cart-odd";
                }
                ?>
                ">
                    <div class="row">
                        <div class="col-md-1 cartico">
                            <i class="fa fa-server"></i>
                        </div>
                        <div class="col-md-7">
                            Custom Dedicated Server<br>
                            <?php
                            $ded = new \Models\Dedicated_model();
                            $total = $total + $ded->calculate($cart->dedidata);
                            ?><br>
                            Plattform: <?php echo $ded->getPlattformName($cart->dedidata->data->plattform); ?><br>
                            RAM: <?php echo $cart->dedidata->data->ram; ?>MB<br>
                            <br>HDDs:<br>
                            <div class="row">
                                <?php
                                $chd = 0;
                                foreach($cart->dedidata->data->hdds as $hdd) {
                                    $chd = $chd + 1;
                                    $hddname = $ded->getHDDName($hdd);
                                    echo "<div class='col-md-6'><div class='hddbox'><label>(Slot $chd)</label> $hddname</div></div>";
                                }
                                ?>
                            </div>
                            <br>
                            Raid Controller:
                            <?php
                            if($cart->dedidata->data->raid_c == "1") {
                                echo "Hardware Raid Controller";
                            } else {
                                echo "Software Raid Controller";
                            }
                            ?>
                            <br>
                            Location:
                            <?php
                            echo $ded->getLocationName($cart->dedidata->data->location);
                            ?>
                            <br>
                            Uplink:
                            <?php
                            echo $ded->getUplink($cart->dedidata->data->uplink);
                            ?>
                            <br><br>
                            <label>Addons</label>
                            <?php
                            foreach($cart->dedidata->data->addons as $addon) {
                                $name = $ded->getAddonName($addon);
                                echo '<br>'.$name;
                            }
                            ?>
                            <br>
                        </div>
                        <div class="col-md-2">
                            €<?php echo $ded->calculate($cart->dedidata); ?> EUR
                        </div>
                        <div class="col-md-2">
                            <a href="removecart/<?php echo $cnt ?>" class="btn btn-fullwidth btn-danger"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        $cnt++;
    }
} else {
    ?>
    <div class="col-md-12">
        <br><div class="alert alert-danger text-center"><i class="fa fa-shopping-cart"></i> Your cart is empty!</div><br>
    </div>
    <?php
}
?>
    <div class="col-md-12">
        <div class="well cart-total">
            <div class="row">
                <div class="col-md-8">
                    €<?php echo $total ?> EUR (Euro) *<br>
                    <span style="font-size: 8px">*Including VAT.</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3 font">
    <div class="bluebox">
        <?php if(!empty($cart) && isset($cart)) { ?>
            <a href="order/1" class="btn btn-success btn-fullwidth"><i class="fa fa-shopping-cart"></i> Order now</a>
        <?php } else { ?>
            <a href="categories" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i> Go Shopping</a>
        <?php } ?>
    </div>
    <?php if(!empty($cart) && isset($cart)) { ?>
        <div class="blackbox">
            <a href="categories" class="btn btn-success"><i class="fa fa-arrow-circle-right"></i> Continue Shopping</a>
        </div>
    <?php } else { ?>
        <div class="blackbox">
            <p class="text-center" style="color: #fff; margin: 0; padding: 0;">
                In order to complete the checkout process, you will have to add some products to your shopping cart first!
            </p>
        </div><br>
    <?php } ?>
</div>
