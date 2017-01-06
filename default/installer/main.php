<?php
/**
 * Sample layout.
 */
use Helpers\Url;
use Helpers\Assets;
use Helpers\Hooks;

//initialise hooks
$hooks = Hooks::get();

$installer = new \Controllers\Installer();
$key = $installer->randomPassword(16);
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
    <title><?php echo "Splash-Wi - Installer"; //SITETITLE defined in app/Core/Config.php ?></title>

    <!-- CSS -->
    <?php
    Assets::css([
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
        Url::templatePath().'css/theme.css',
        Url::templatePath().'css/login.css'
    ]);

    //hook for plugging in css
    $hooks->run('css');

    Assets::js([
        Url::templatePath().'js/jquery.js',
    ]);

    //hook for plugging in javascript
    $hooks->run('js');
    ?>

</head>
<body>
<?php
//hook for running code after body tag
$hooks->run('afterBody');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="logomodal">
                <img class="logo" src="<?=Url::templatePath()?>images/logo.png" alt="Logo">
            </div>
            <div class="loginmodal-container">
                <h1>Installer</h1>
                <p style="width: 90%;" class="text-justify">
                    Welcome to the Splash-Wi installer! In order to provide a fully working installation,
                    you have to provide us with some data, so we can install the panel and check if you are
                    allowed to run this software!
                </p>
                <p style="width: 90%;" class="text-justify">
                    <label style="padding: 0; margin: 0;">Please note!</label> By installing this software, you agree to our terms of use
                    and the EULA!
                </p>
                <?php $errors = $installer->check(); ?>
                <form action="installer" method="post">
                    <h1>Database</h1><br>
                    <p><input class="form-control" type='text' name='db_host' placeholder="Database Hostname (127.0.0.1)"></p>
                    <p><input class="form-control" type='text' name='db_user' placeholder="Database Username"></p>
                    <p><input class="form-control" type='password' name='db_pass' placeholder="Database Password"></p>
                    <p><input class="form-control" type='text' name='db_name' placeholder="Database Name"></p>
                    <h1>License</h1><br>
                    <p><input class="form-control" type='text' name='license_key' placeholder="License Key"></p>
                    <p><input class="form-control" type='text' name='license_username' placeholder="License Username"></p>
                    <h1>Page Data</h1><br>
                    <p><input class="form-control" type='text' name='sitetitle' placeholder="Site Title"></p>
                    <p>
                        <select name="frontend" class="form-control">
                            <option value="false">Enable frontend?</option>
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                    </p>
                    <h1>Admin Credentials</h1><br>
                    <p><input class="form-control" type='text' name='admin_email' placeholder="Admin E-Mail (admin@myfirm.com)"></p>
                    <p><input class="form-control" type='text' name='admin_username' placeholder="Admin Username"></p>
                    <p><input class="form-control" type='password' name='admin_password' placeholder="Password"></p>
                    <h1>SMTP / Mail</h1>
                    <p><input class="form-control" type='text' name='smtp_server' placeholder="SMTP Hostname (127.0.0.1)"></p>
                    <p><input class="form-control" type='text' name='smtp_username' placeholder="SMTP Username"></p>
                    <p><input class="form-control" type='password' name='smtp_password' placeholder="SMTP Password"></p>
                    <p>
                        <select name="smtp_type" class="form-control">
                            <option value="tls">SMTP Type? (tls)</option>
                            <option value="tls">TLS</option>
                            <option value="ssl">SSL</option>
                        </select>
                    </p>
                    <p><input class="form-control" type='text' name='smtp_port' placeholder="SMTP Port"></p>
                    <br>
                    <p><input class="form-control" type='text' name='smtp_from' placeholder="From? (noreply@myfirm.com)"></p>
                    <p><input class="form-control" type='text' name='smtp_to' placeholder="Reply to? (support@myfirm.com)"></p>
                    <p><input class="form-control" type='text' name='smtp_to_name' placeholder="Name of the reciver of answers? (MyFirm)"></p>
                    <h1>AES Key</h1>
                    <p><input class="form-control" type='text' name='aes_key' placeholder="Fd7gPlu4yjm4r5fg" value="<?=$key?>" readonly></p>
                    <p style="width: 90%;" class="text-justify">
                        Please note this key down. You will need this in order to decrypt your database!
                    </p>
                    <h1>API Configuration</h1>
                    <p><input class="form-control" type='text' name='api_key' placeholder="API Key"></p>
                    <p><input class="form-control" type='text' name='api_username' placeholder="API Username"></p>
                    <p><input class="form-control" type='text' name='api_password' placeholder="API Password"></p>
                    <?php if(empty($errors)) { ?>
                    <p><button class="login loginmodal-submit" type='submit' name='submit'>Install Splash-Wi!</button></p>
                    <?php } else { ?>
                    <p><button class="login loginmodal-submit danger" type='submit' disabled>Install Splash-Wi!</button></p>
                    <?php } ?>
                </form>
            </div>
            <!--
				<div class="loginmodal-container">
					<center><a class="login loginmodal-submit" style="width: 100%;" href="index.php?page=index"><?=BACKTOHP?></a></center>
				</div>
				-->
        </div>
    </div>
</div><br>
<?php

//hook for plugging in code into the footer
$hooks->run('footer');
?>

</body>
</html>
