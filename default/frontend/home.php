<?php
use Helpers\Url;
?>
</div>
<section class="carousel-cont">
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
                <div class="active item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <h2>Webspaces</h2>
                                <div class="bulletpoint animated flipInY" id="bulletpoint">
                                    <i class="fa fa-check"></i> Unlimited Diskspace
                                </div>
                                <div class="bulletpoint animated flipInY" id="bulletpoint2">
                                    <i class="fa fa-check"></i> Unlimited Traffic
                                </div>
                                <div class="bulletpoint animated flipInY" id="bulletpoint3">
                                    <i class="fa fa-check"></i> Easy OneClick-Installer
                                </div>
                                <div class="bulletpoint animated flipInY" id="bulletpoint4">
                                    <i class="fa fa-check"></i> Starting at $0.00/mo.
                                </div>
                            </div>
                            <div class="col-md-6 col-md-offset-2">
                                <img class="animated bounceIn" src="<?=Url::templatePath()?>images/server1.png" alt="server" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <h2>Teamspeak3</h2>
                                <div class="bulletpoint animated flipInY" id="bulletpoint">
                                    <i class="fa fa-check"></i> Up to 500 slots
                                </div>
                                <div class="bulletpoint animated flipInY" id="bulletpoint2">
                                    <i class="fa fa-check"></i> No Ads required
                                </div>
                                <div class="bulletpoint animated flipInY" id="bulletpoint3">
                                    <i class="fa fa-check"></i> Preconfigured Item Packs
                                </div>
                                <div class="bulletpoint animated flipInY" id="bulletpoint4">
                                    <i class="fa fa-check"></i> Starting at $0.00/mo.
                                </div>
                            </div>
                            <div class="col-md-6 col-md-offset-2">
                                <img class="animated bounceIn" src="<?=Url::templatePath()?>images/teamspeak_slide.png" alt="server" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <h2>Gameserver</h2>
                                <div class="bulletpoint animated flipInY" id="bulletpoint">
                                    <i class="fa fa-check"></i> Minecraft, CS:GO and more...
                                </div>
                                <div class="bulletpoint animated flipInY" id="bulletpoint2">
                                    <i class="fa fa-check"></i> Fast-Download and SQL inclusive
                                </div>
                                <div class="bulletpoint animated flipInY" id="bulletpoint3">
                                    <i class="fa fa-check"></i> Easy Mod-Installer
                                </div>
                                <div class="bulletpoint animated flipInY" id="bulletpoint4">
                                    <i class="fa fa-check"></i> Starting at $0.00/mo.
                                </div>
                            </div>
                            <div class="col-md-6 col-md-offset-2">
                                <img class="animated bounceIn" src="<?=Url::templatePath()?>images/gameserver.png" alt="server" />
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<section class="domainchooser">
    <div class="container">
        <div class="domainchooser">
            <form action="#" method="post">
                <div class="col-md-7">
                    <input class="form-control" name="domain">
                </div>
                <div class="col-md-3">
                    <select class="form-control" name="ending">
                        <option>.com</option>
                        <option>.net</option>
                        <option>.org</option>
                        <option>.de</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <a href="index.php?page=webspaces" class="btn btn-primary">Check availability</a>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="home-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Welcome to Splash-WI</h2>
                <p>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet,
                </p>
            </div>
            <div class="col-md-4 offset-top">
                <div class="panel panel-custom">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-server"></i> Host Informations</h3>
                    </div>
                    <div class="panel-body">
                        150 Servers<br>
                        20 Masterservers<br>
                        600 CPU Cores<br>
                        1,5TB Ram
                    </div>
                </div>
                <div class="panel panel-custom">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-heart"></i> Client Informations</h3>
                    </div>
                    <div class="panel-body">
                        <?= $usersactive; ?> Clients<br>
                        <?= $productsactive; ?> Products<br>
                        <?= $ticketsactive; ?> Tickets opened<br>
                        <?= $downloadsactive; ?> Downloads
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="meanings">
    <div class="container">
        <div class="row">
            <?php
            $rm = new \Models\Rating_model();
            $ratings = $rm->getRatingsFE(4);
            foreach($ratings as $rating) {
            ?>
                <div class="col-md-3">
                    <center><img src="<?=Url::templatePath()?>images/placeholder.png" alt="user" class="avatar"></center>
                    <span><?=$rating->username?></span>
                    <rating class="rating"><?php
                    for ($i = 0; $i < round($rating->score, 0); $i++) {
                        echo '<i class="fa fa-star"></i>';
                    }
                    for ($i = 0; $i < (5-round($rating->score, 0)); $i++) {
                        echo '<i class="fa fa-star-o"></i>';
                    }
                    ?></rating><br>
                    <?=$rating->user_comment?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<section class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div id="product" class="product panel panel-custom animated zoomIn">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-heart"></i> Free Product</h3>
                    </div>
                    <div class="panel-body">
                        <p class="price">$<?php echo $product["price"]; ?> / p.m.</p>
                        <p>Up to 12 Slots</p>
                        <p>A lot of fun</p>
                        <p>Free subdomain</p>
                        <p>Included Sitebuilder</p>
                        <p>FTP Access</p>
                        <p>SSH Access</p>
                        <center><a class="btn btn-primary btn-order" href="index.php?page=<?php echo $redirect; ?>"><i class="fa fa-info-circle"></i> View more</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div id="product" class="product panel panel-custom animated zoomIn">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-heart"></i> Free Product</h3>
                    </div>
                    <div class="panel-body">
                        <p class="price">$<?php echo $product["price"]; ?> / p.m.</p>
                        <p>Up to 12 Slots</p>
                        <p>A lot of fun</p>
                        <p>Free subdomain</p>
                        <p>Included Sitebuilder</p>
                        <p>FTP Access</p>
                        <p>SSH Access</p>
                        <center><a class="btn btn-primary btn-order" href="index.php?page=<?php echo $redirect; ?>"><i class="fa fa-info-circle"></i> View more</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div id="product" class="product panel panel-custom animated zoomIn">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-heart"></i> Free Product</h3>
                    </div>
                    <div class="panel-body">
                        <p class="price">$<?php echo $product["price"]; ?> / p.m.</p>
                        <p>Up to 12 Slots</p>
                        <p>A lot of fun</p>
                        <p>Free subdomain</p>
                        <p>Included Sitebuilder</p>
                        <p>FTP Access</p>
                        <p>SSH Access</p>
                        <center><a class="btn btn-primary btn-order" href="index.php?page=<?php echo $redirect; ?>"><i class="fa fa-info-circle"></i> View more</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home-offset">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img class="hoverfeature" src="<?=Url::templatePath()?>images/SplashWI.png" alt="Splash-WI">
            </div>
            <div class="col-md-3">
                <img class="hoverfeature" src="<?=Url::templatePath()?>images/VestaCP.png" alt="VestaCP">
            </div>
            <div class="col-md-3">
                <img class="hoverfeature" src="<?=Url::templatePath()?>images/proxmox.png" alt="Proxmox">
            </div>
            <div class="col-md-3">
                <img class="hoverfeature" src="<?=Url::templatePath()?>images/teamspeak.png" alt="Teamspeak">
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
</section>
<!--<div class="col-md-4 col-md-offset-4">
    <a href="categories" class="btn btn-success"><i class="fa fa-arrow-circle-right"></i> Browse categories</a><br><br>
</div>-->