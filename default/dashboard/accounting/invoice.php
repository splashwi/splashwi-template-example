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

$user = $data["user"];
foreach($user as $user) {
    //echo "<pre>"; print_r($user); echo "</pre>";
    $admin = new \Models\User_model();

    $avatar = $admin->get_avatar($user->email, 20);
}
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
        Url::templatePath().'css/wysiwyg-color.css'
    ]);

    //hook for plugging in css
    $hooks->run('css');

    Assets::js([
        Url::templatePath().'js/jquery.js',
        Url::templatePath().'js/wysihtml5-0.3.0.js',
        Url::templatePath().'js/bootstrap-wysihtml5.js',
        Url::templatePath().'js/jquery-simple-pagination-plugin.js',
    ]);

    //hook for plugging in javascript
    $hooks->run('js');
    ?>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-title">
                    <h2>Invoice</h2><h3 class="pull-right">Order # <?=$data["invoice"]->id?></h3>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Billed To:</strong><br>
                            <?=$data["user"][0]->firstname?> <?=$data["user"][0]->lastname?><br>
                            <?=$data["user"][0]->street?> <?=$data["user"][0]->housenumber?><br>
                            <?=$data["user"][0]->postalcode?> <?=$data["user"][0]->city?><br>
                            <?=$data["user"][0]->state?>, <?=$data["user"][0]->country?>
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Shipped To:</strong><br>
                            <?=$data["user"][0]->firstname?> <?=$data["user"][0]->lastname?><br>
                            <?=$data["user"][0]->street?> <?=$data["user"][0]->housenumber?><br>
                            <?=$data["user"][0]->postalcode?> <?=$data["user"][0]->city?><br>
                            <?=$data["user"][0]->state?>, <?=$data["user"][0]->country?>
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Payment Method:</strong><br>
                            <?=$data["invoice"]->paymentmethod?><br>
                            <br>
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Order Date:</strong><br>
                            <?=$data["invoice"]->date?><br><br>
                        </address>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <tr>
                                    <td>Funds [<?=$data["invoice"]->amount?>€] (Transaction ID: <?=$data["invoice"]->transactionid?>)</td>
                                    <td class="text-center"><?=$data["invoice"]->amount?>€</td>
                                    <td class="text-center">1</td>
                                    <td class="text-right"><?=$data["invoice"]->amount?>€</td>
                                </tr>
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right"><?=$data["invoice"]->amount?>€</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Taxes</strong></td>
                                    <td class="no-line text-right">0%</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right"><?=$data["invoice"]->amount?>€</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 col-md-offset-6">
                <a href="<?=Url::getUri("dashboard/transactions")?>" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back to Clientarea</a>
            </div>
            <div class="col-md-2">
                <input type="button" class="btn btn-success" value="Print Invoice" onClick="javascript:window.print()">
            </div>
            <div class="col-md-2">
                <a href="<?=Url::getUri("dashboard/downloadinvoice/".$data["invoice"]->id)?>" class="btn btn-warning" download><i class="fa fa-download"></i> Download Invoice</a>
            </div>
        </div>
    </div>
</body>
</html>