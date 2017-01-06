<?php
/**
 * Sample layout.
 */
use Helpers\Assets;
use Helpers\Hooks;
use Helpers\Url;
use Helpers\Session;

//initialise hooks
$hooks = Hooks::get();

$modules = new \Models\Module_model();
$admin = new \Models\User_model();
$user = $data["user"];

if(empty($user[0]->firstname) || empty($user[0]->lastname)) {
    $uname = \Helpers\Session::get("username");
} else {
    $uname = $user[0]->firstname.' '.$user[0]->lastname;
}

$avatar = $admin->get_avatar($user[0]->email, 20);
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
		<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/Core/Config.php ?></title>

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
            Url::templatePath().'js/discount.js',
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
    if(Session::get('role') == "admin") {
        echo '
        <div class="box admininfo">
            You are logged in as an administrator!<br><a href="'.Url::getUri("admin/home").'">Back to administration backend!</a>
        </div>
        ';
    }
    ?>
	<?php
	//hook for running code after body tag
	$hooks->run('afterBody');

	$countmodel = new \Models\Count_model();
	$tsc = $countmodel->count_voice(Session::get("username"));
	$gsc = $countmodel->count_game(Session::get("username"));
	$wsc = $countmodel->count_web(Session::get("username"));
    $rc = $countmodel->count_root(Session::get("username"));
	?>
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
								<li><a href="<?= Url::getUri("dashboard/home"); ?>"><i class="fa fa-home"></i> <?=$data['lang_home']?></a></li>
                                <?php if($tsc > 0 && $modules->isLoaded("teamspeak")) { ?>
								<li><a href="<?= Url::getUri("dashboard/teamspeak"); ?>"><i class="fa fa-headphones"></i> <?=$data['lang_teamspeaks']?></a></li>
								<?php } if($gsc > 0 && $modules->isLoaded("gameserver")) { ?>
								<li><a href="<?= Url::getUri("dashboard/gameservers"); ?>"><i class="fa fa-server"></i> <?=$data['lang_gameservers']?></a></li>
								<?php } if($wsc > 0 && $modules->isLoaded("webspace")) { ?>
								<li><a href="<?= Url::getUri("dashboard/webspaces"); ?>"><i class="fa fa-globe"></i> <?=$data['lang_webspaces']?></a></li>
								<?php } if($rc > 0 && $modules->isLoaded("vps")) { ?>
                                    <li><a href="<?= Url::getUri("dashboard/vps"); ?>"><i class="fa fa-server"></i> <?=$data['lang_vps']?></a></li>
                                <?php } if($rc > 0 && $modules->isLoaded("dedicated")) { ?>
                                    <li><a href="<?= Url::getUri("dashboard/dedicated"); ?>"><i class="fa fa-server"></i> <?=$data['lang_dedicated']?></a></li>
                                <?php } ?>
                                <?php if($modules->isLoaded("tickets")) { ?>
								<li><a href="<?= Url::getUri("dashboard/tickets"); ?>"><i class="fa fa-pencil"></i> <?=$data['lang_tickets']?></a></li>
								<?php } ?>
                                <li><a href="<?= Url::getUri("logout"); ?>"><i class="fa fa-lock"></i> <?=$data['lang_logout']?></a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?=$avatar?>" alt="" class="img-circle"> <span style="margin: 0 10px 0 5px;"><?=$uname?></span> <span class="glyphicon glyphicon-menu-down"></span></a>
									<ul class="dropdown-menu">
										<li>
                                            <a href="<?= Url::getUri("dashboard/profile"); ?>">
                                                Client No.: <?=$admin->getClNo($user[0]->id)?><br><br>
                                                <i class="fa fa-user"></i> <?=$data['lang_myprofile']?>
                                            </a>
                                        </li>
                                        <?php if($modules->isLoaded("payment")) { ?>
                                        <li><a href="<?= Url::getUri("dashboard/transactions"); ?>"><i class="fa fa-credit-card"></i> <?=$data['lang_recenttransactions']?></a></li>
                                        <?php } ?>
                                        <li><a href="<?= Url::getUri("dashboard/logins"); ?>"><i class="fa fa-keyboard-o"></i> <?=$data['lang_recentlogins']?></a></li>
                                        <li><a href="<?= Url::getUri("logout"); ?>"><i class="fa fa-key"></i> <?=$data['lang_logout']?></a></li>
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
