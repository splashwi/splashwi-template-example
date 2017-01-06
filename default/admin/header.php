<?php
/**
 * Sample layout.
 */
use Helpers\Assets;
use Helpers\Hooks;
use Helpers\Url;
use Helpers\Session;
use Core\View;

$modules = new \Models\Module_model();
$counter = new \Models\Count_model();
$toactivate = $counter->count_root_admin() - $counter->count_root_active_admin();
if($toactivate > 0) {
    $badge1 = "<span class='label label-danger'>$toactivate</span>";
} else {
    $badge1 = "<span class='label label-success'>$toactivate</span>";
}
$all = $counter->count_voice_admin() + $counter->count_web_admin() + $counter->count_game_admin() + $counter->count_root_active_admin();
$mvc = $counter->count_voice_admin();
$mwc = $counter->count_web_admin();
$mgc = $counter->count_game_admin();
$vgc = $counter->count_virtual_admin();
$mdc = $counter->count_root_active_admin();
$tc = $counter->count_open_tickets_admin();
//initialise hooks
$hooks = Hooks::get();
?>
<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
    <head>

        <!-- Site meta -->
        <meta charset="utf-8">
        <?php
        //hook for plugging in meta tags
        $hooks->run('meta');
        ?>
        <title><?=$data['title'].' - '.SITETITLE;?></title>

        <!-- CSS -->
        <?php
        Assets::css([
            Url::templatePath().'css/bootstrap.min.css',
            Url::templatePath().'css/font-awesome.min.css',
            Url::templatePath().'css/theme.css',
            Url::templatePath().'css/bootstrap-wysihtml5.css',
            Url::templatePath().'css/wysiwyg-color.css',
            Url::templatePath().'css/datatables.css',
        ]);

        //hook for plugging in css
        $hooks->run('css');

        Assets::js([
            Url::templatePath().'js/jquery.js',
            Url::templatePath().'js/wysihtml5-0.3.0.js',
            Url::templatePath().'js/bootstrap-wysihtml5.js',
            Url::templatePath().'js/datatables.js',
        ]);

        //hook for plugging in javascript
        $hooks->run('js');
        ?>
        <script>
            $(document).ready( function () {
                $('#paginate').DataTable();
            } );
        </script>
    </head>
    <body>
    <?php
    //hook for running code after body tag
    $hooks->run('afterBody');
    ?>
    <section class="lchats">
        <div class="lchatsbox">
            <?php
            View::renderTemplate("admin/livechat/notification");
            ?>
        </div>
    </section>
    <header>
        <section class="links">
            <li class="dropdown">
                <a id="dLabel" data-target="#" href="http://example.com" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-flag"></i> <?=$data['lang_lang']?>
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" aria-labelledby="dLabel">
                    <li><a href="classes/page/set_language.class.php?lang=US"><img src="<?=Url::templatePath()?>images/lang/US.png" alt="US" width="20px"> English</a></li>
                    <li><a href="classes/page/set_language.class.php?lang=DE"><img src="<?=Url::templatePath()?>images/lang/DE.png" alt="DE" width="20px"> German</a></li>
                    <li><a href="classes/page/set_language.class.php?lang=RU"><img src="<?=Url::templatePath()?>images/lang/RU.png" alt="RU" width="20px"> Russian</a></li>
                </ul>
            </li>
            <?php
            /*
            if(!isset($_SESSION["username"]) or empty($_SESSION["username"]) or !isset($_SESSION["role"]) or empty($_SESSION["role"])) {
                ?>
                <a href="page.php?page=login"><i class="fa fa-sign-in"></i> <?=LOGIN?></a>

                <?php
            } elseif(isset($_SESSION["username"]) && !empty($_SESSION["username"]) && isset($_SESSION["role"]) && !empty($_SESSION["role"])) {
                ?>
                <a href="page.php?page=index"><i class="fa fa-user"></i> <?=MYINTERFACE?></a>
                <?php
            }
            ?>
            <?php

            if(!isset($_SESSION["username"]) or empty($_SESSION["username"]) or !isset($_SESSION["role"]) or empty($_SESSION["role"])) {
                ?>
                <a href="page.php?page=register"><i class="fa fa-key"></i> <?=REGISTER?></a>
                <?php
            } elseif(isset($_SESSION["username"]) && !empty($_SESSION["username"]) && isset($_SESSION["role"]) && !empty($_SESSION["role"])) {
                ?>
                <a href="classes/session/logout.class.php"><i class="fa fa-sign-out"></i> <?=LOGOUT?></a>
                <?php
            }
            */
            ?>
            <a href="<?= Url::getUri("cart"); ?>"><i class="fa fa-shopping-cart"></i> <?=$data['lang_shoppingcart']?> <span class="cartitems"><?=count(json_decode(Session::get('cart')));?></span></a>
        </section>
        <section class="head">
            <div class="row">
                <div class="col-md-3">
                    <img height="50px" class="logo" src="<?=Url::templatePath()?>images/logo.png" alt="logo">
                </div>
            </div>
        </section>
        <section class="navigation">
            <nav class="navbar navbar-custom">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="<?= Url::getUri("home"); ?>"><i class="fa fa-home"></i> <?=$data['lang_home']?></a></li>
                            <li><a href="<?= Url::getUri("categories"); ?>"><i class="fa fa-list"></i> <?=$data['lang_categories']?></a></li>
                            <?php if($modules->isLoaded("faq")) { ?>
                            <li><a href="<?= Url::getUri("faq"); ?>"><i class="fa fa-question-circle"></i> <?=$data['lang_faq']?></a></li>
                            <?php } ?>
                            <?php if($modules->isLoaded("news")) { ?>
                            <li><a href="<?= Url::getUri("news"); ?>"><i class="fa fa-newspaper-o"></i> <?=$data['lang_news']?></a></li>
                            <?php } ?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php
                            if(Session::get('loggin') == true) {
                                ?>
                                <li><a href="<?= Url::getUri("dashboard/home"); ?>"><i class="fa fa-dashboard"></i> <?=$data['lang_clientarea']?></a></li>
                                <li><a href="<?= Url::getUri("logout"); ?>"><i class="fa fa-sign-out"></i> <?=$data['lang_logout']?></a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="<?= Url::getUri("login"); ?>"><i class="fa fa-sign-in"></i> <?=$data['lang_login']?></a></li>
                                <li><a href="<?= Url::getUri("register"); ?>"><i class="fa fa-lock"></i> <?=$data['lang_register']?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>
        </section>
        <section>
            <div class="container">
                <nav class="navbar navbar-default nomargin" style="border-radius: 0px !important; border-top: none !important;">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="navbar2" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?= Url::getUri("admin/home"); ?>"><i class="fa fa-home"></i> Home</a></li>
                                    <li class="dropdown">
                                        <a id="dLabel" role="button" data-toggle="dropdown" class="" data-target="#" href="/page.html">
                                            <i class="fa fa-server"></i> Servers <span class="label label-success"><?=$all?></span><span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                            <?php if($modules->isLoaded("teamspeak")) { ?>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="#"><span class="label label-success"><?=$mvc?></span> Teamspeak Servers</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?= Url::getUri("admin/teamspeak/servers"); ?>"><span class="label label-success"><?=$mvc?></span> Teamspeak Servers</a></li>
                                                    <li><a href="<?= Url::getUri("admin/teamspeak/masters"); ?>">Teamspeak Masters</a></li>
                                                </ul>
                                            </li>
                                            <?php } ?>
                                            <?php if($modules->isLoaded("gameserver")) { ?>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="#"><span class="label label-success"><?=$mgc?></span> Gameservers</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?= Url::getUri("admin/gameserver/servers"); ?>"><span class="label label-success"><?=$mgc?></span> Gameservers</a></li>
                                                    <li><a href="<?= Url::getUri("admin/gameserver/masters"); ?>">Gameserver Masters</a></li>
                                                </ul>
                                            </li>
                                            <?php } ?>
                                            <?php if($modules->isLoaded("webspace")) { ?>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="#"><span class="label label-success"><?=$mwc?></span> Webspaces</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?= Url::getUri("admin/webspaces/list"); ?>"><span class="label label-success"><?=$mwc?></span> Webspaces</a></li>
                                                    <li><a href="<?= Url::getUri("admin/webspaces/masters"); ?>">Webspace Masters</a></li>
                                                </ul>
                                            </li>
                                            <?php } ?>
                                            <?php if($modules->isLoaded("vps")) { ?>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="#"><span class="label label-success"><?=$vgc?></span> Virtual Servers</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?= Url::getUri("admin/vps/list"); ?>"><span class="label label-success"><?=$vgc?></span> Virtual Servers</a></li>
                                                    <li><a href="<?= Url::getUri("admin/vps/master"); ?>">VPS Masters</a></li>
                                                </ul>
                                            </li>
                                            <?php } ?>
                                            <?php if($modules->isLoaded("dedicated")) { ?>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="#"><span class="label label-success"><?=$mdc?></span> Dedicated Servers</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?= Url::getUri("admin/dedicated/list"); ?>"><span class="label label-success"><?=$mdc?></span> Dedicated Servers</a></li>
                                                    <li><a href="<?= Url::getUri("admin/dedicated/activation"); ?>"><?=$badge1?> Dedicated Servers (Awaiting Confirmation)</a></li>
                                                </ul>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a id="dLabel" role="button" data-toggle="dropdown" class="" data-target="#" href="/page.html">
                                            <i class="fa fa-tasks"></i> Products & Services<span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                            <li><a href="<?= Url::getUri("admin/products"); ?>"><i class="fa fa-tasks"></i> Configure Products & Services</a></li>
                                            <?php if($modules->isLoaded("dedicated")) { ?>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="#"><i class="fa fa-server"></i> Configure Dedicated Servers</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?= Url::getUri("admin/dedicated/hosts"); ?>"><i class="fa fa-wrench"></i> Available Server Configurations</a></li>
                                                    <li><a href="<?= Url::getUri("admin/dedicated/hdds"); ?>"><i class="fa fa-hdd-o"></i> Available Harddisk Types</a></li>
                                                    <li><a href="<?= Url::getUri("admin/dedicated/addons"); ?>"><i class="fa fa-plus-circle"></i> Available Server Addons</a></li>
                                                    <li><a href="<?= Url::getUri("admin/dedicated/dcs"); ?>"><i class="fa fa-globe"></i> Available DC Locations</a></li>
                                                </ul>
                                            </li>
                                            <?php } ?>
                                            <?php if($modules->isLoaded("payment")) { ?>
                                            <li><a href="<?= Url::getUri("admin/discounts"); ?>"><i class="fa fa-ticket"></i> Coupon Codes</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <?php if($modules->isLoaded("tickets")) { ?>
                                    <li class="dropdown">
                                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-pencil"></i> Tickets  <span class="label label-info"><?=$tc?></span> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?= Url::getUri("admin/tickets"); ?>"><span class="label label-info"><?=$tc?></span> Tickets</a></li>
                                            <li><a href="<?= Url::getUri("admin/ticket/new"); ?>">New Ticket</a></li>
                                        </ul>
                                    </li>
                                    <?php } ?>
                                    <li class="dropdown">
                                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> Panel Settings <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?= Url::getUri("admin/settings"); ?>"><i class="fa fa-cog"></i> General Settings</a></li>
                                            <li><a href="<?= Url::getUri("admin/modules"); ?>"><i class="fa fa-cogs"></i> Modules</a></li>
                                            <li><a href="<?= Url::getUri("admin/mailer"); ?>"><i class="fa fa-envelope"></i> E-Mail Settings</a></li>
                                            <?php if($modules->isLoaded("payment")) { ?>
                                            <li><a href="<?= Url::getUri("admin/paymentmethods"); ?>"><i class="fa fa-dollar"></i> Payment Methods</a></li>
                                            <?php } ?>
                                            <?php if($modules->isLoaded("legaldisclosure") || $modules->isLoaded("policies")) { ?>
                                            <li><a href="<?= Url::getUri("admin/legalsettings"); ?>"><i class="fa fa-legal"></i> Legal Disclosure / Terms of use</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wechat"></i> B2C Communication <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <?php if($modules->isLoaded("ratings")) { ?>
                                            <li><a href="<?= Url::getUri("admin/ratings"); ?>"><i class="fa fa-exclamation-circle"></i> Company Ratings</a></li>
                                            <?php } ?>
                                            <?php if($modules->isLoaded("faq")) { ?>
                                            <li><a href="<?= Url::getUri("admin/faq"); ?>"><i class="fa fa-question-circle"></i> FaQ</a></li>
                                            <?php } ?>
                                            <?php if($modules->isLoaded("news")) { ?>
                                            <li><a href="<?= Url::getUri("admin/news"); ?>"><i class="fa fa-newspaper-o"></i> News</a></li>
                                            <?php } ?>
                                            <li><a href="<?= Url::getUri("admin/mailtemplates"); ?>"><i class="fa fa-envelope-o"></i> E-Mail Templates</a></li>
                                            <?php if($modules->isLoaded("livechat")) { ?>
                                            <li><a href="<?= Url::getUri("admin/livechat"); ?>"><i class="fa fa-comment-o"></i> Livechat</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?= Url::getUri("admin/clients"); ?>"><i class="fa fa-users"></i> Clients</a></li>
                                </ul>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="glyphicon glyphicon-menu-down"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= Url::getUri("dashboard/home"); ?>"><i class="fa fa-dashboard"></i> My Client Dashboard</a></li>
                                        <li><a href="<?= Url::getUri("dashboard/profile"); ?>"><i class="fa fa-user"></i> My Profile</a></li>
                                        <li><a href="<?= Url::getUri("logout"); ?>"><i class="fa fa-lock"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                </nav>
            </div>
        </section>
    </header>
    <div class="container"><br>
