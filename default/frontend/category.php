<?php
$m = new \Models\Product_model();
$cats = $m->getProducts($data["id"]);
?>
<section class="categories">
    <h1 class="text-center">Products</h1>
    <div class="container">
        <?php
        $counter = 0;
        foreach ($cats as $cat) {
            $counter++;
            //if($counter == 0 || $counter == 4 || $counter % 3) { echo "<div class='row'>"; }
            echo
                '<div class="col-md-4">
                
                    <div class="well">';
            if($cat->type == "gameserver") {
                echo '<i class="fa fa-server cati"></i>';
            } elseif($cat->type == "voiceserver") {
                echo '<i class="fa fa-headphones cati"></i>';
            } elseif($cat->type == "webspace") {
                echo '<i class="fa fa-wordpress cati"></i>';
            }
            echo '
                        <h2>
                            '.$cat->name.'
                        </h2>
                        <p>
                            ('.ucfirst($cat->type).')
                        </p>
                        <p style="margin-top: 20px;">
                            '.$cat->description.'
                        </p>
                        <p style="margin-top: 20px;">
                            ';
                            if($cat->type == "webspace") {
                                $m2 = new \Models\Webspace_model();
                                $package = $m2->get_package($cat->webspace_package);
                                echo '<label>Package: </label>'.ucfirst($package[0]->name).'<br>';
                                echo '<label>Diskspace: </label>'.$package[0]->quota.'MB<br>';
                                echo '<label>Domains: </label>'.$package[0]->web_domains.'<br>';
                                echo '<label>Subdomains: </label>'.$package[0]->web_aliases.'<br>';
                                echo '<label>E-Mail Accounts: </label>'.$package[0]->mail_accounts.'<br>';
                                echo '<label>Databases: </label>'.$package[0]->dbases.'<br>';
                                echo '<label>Cronjobs: </label>'.$package[0]->cronjobs.'<br>';
                                echo '<label>Backups: </label>'.$package[0]->backups.'<br>';
                            } elseif($cat->type == "gameserver") {

                            } elseif($cat->type == "voiceserver") {

                            }
                            echo '
                        </p>
                        <h3 style="margin-top: 20px;">
                            $'.$cat->price.' EUR*
                            <span>*Price per month!</span>
                        </h3>
                        <a class="btn btn-default" href="../addcart/'.$cat->id.'"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                    </div>
            </div>';
            //if($counter == 0 || $counter == 4 || $counter % 3) { echo "</div>"; }
        }
        ?>
    </div>
</section>