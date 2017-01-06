<?php
use Helpers\Url;
use Models\Payment_model;

$pm = new Payment_model();
$data_paypal = $pm->getGatewayData("paypal");
$data_paysafecard = $pm->getGatewayData("paysafecard");
$data_paymentwall = $pm->getGatewayData("paymentwall");
?>
<div class="row">
    <div class="col-md-4">
        <a data-toggle="collapse" href="#cpg1" aria-expanded="false" aria-controls="cpg1E">
            <div class="box">
                <center><img height="50px" class="logo" src="<?=Url::templatePath()?>images/gateways/paypal.png" alt="PayPal"></center>
                <?php if($data_paypal["enabled"] == 1) { ?>
                    <h2 style="text-align: center; color: green; font-size: 16px;">Enabled</h2>
                <?php } else { ?>
                    <h2 style="text-align: center; color: red; font-size: 16px;">Disabled</h2>
                <?php } ?>
            </div>
        </a>
        <div class="collapse" id="cpg1">
            <div class="box">
                <?php if($data_paypal["enabled"] == 1) { ?>
                    <a href="disablegateway/paypal" class="btn btn-danger">Disable Gateway</a>
                <?php } else { ?>
                    <a href="enablegateway/paypal" class="btn btn-success">Enable Gateway</a>
                <?php } ?><br><br>
                <form action="updategateway/paypal" method="post">
                    <label for="email">PayPal E-Mail</label>
                    <input name="email" type="email" class="form-control" value="<?= $data_paypal["mail"] ?>" required>
                    <label for="username">PayPal API Username</label>
                    <input name="username" type="text" class="form-control" value="<?= $data_paypal["username"] ?>" required>
                    <label for="publickey">PayPal API Password</label>
                    <input name="publickey" type="text" class="form-control" value="<?= $data_paypal["publickey"] ?>" required>
                    <label for="privatekey">PayPal API Signature</label>
                    <input name="privatekey" type="text" class="form-control" value="<?= $data_paypal["privatekey"] ?>" required>
                    <label for="currency">Currency</label>
                    <select name="currency" class="form-control" required>
                        <option value="<?= $data_paypal["currency"] ?>">Selected Currency: <?= $data_paypal["currency"] ?></option>
                        <option value="EUR">Euro</option>
                        <option value="USD">US Dollar</option>
                        <option value="GBP">Brit. Pound</option>
                    </select><br>
                    <button type="submit" class="btn btn-success">Change Data</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <a data-toggle="collapse" href="#cpg2" aria-expanded="false" aria-controls="cpg2E">
            <div class="box">
                <center><img height="50px" class="logo" src="<?=Url::templatePath()?>images/gateways/paysafecard.png" alt="paysafecard"></center>
                <?php if($data_paysafecard["enabled"] == 1) { ?>
                    <h2 style="text-align: center; color: green; font-size: 16px;">Enabled</h2>
                <?php } else { ?>
                    <h2 style="text-align: center; color: red; font-size: 16px;">Disabled</h2>
                <?php } ?>
            </div>
        </a>
        <div class="collapse" id="cpg2">
            <div class="box">
                <?php if($data_paysafecard["enabled"] == 1) { ?>
                    <a href="disablegateway/paysafecard" class="btn btn-danger">Disable Gateway</a>
                <?php } else { ?>
                    <a href="enablegateway/paysafecard" class="btn btn-success">Enable Gateway</a>
                <?php } ?><br><br>
                <form action="updategateway/paysafecard" method="post">
                    <label for="email">paysafecard E-Mail</label>
                    <input name="email" type="email" class="form-control" value="<?= $data_paysafecard["mail"] ?>" required>
                    <label for="publickey">paysafecard API Key</label>
                    <input name="publickey" type="text" class="form-control" value="<?= $data_paysafecard["publickey"] ?>" required>
                    <label for="ps_environment">paysafecard Mode</label>
                    <select name="ps_environment" class="form-control" required>
                        <option value="<?= $data_paysafecard["ps_environment"] ?>">Selected Environment: <?= $data_paysafecard["ps_environment"] ?></option>
                        <option value="TEST">Test Environment</option>
                        <option value="PRODUCTION">Live Environment</option>
                    </select>
                    <label for="currency">Currency</label>
                    <select name="currency" class="form-control" required>
                        <option value="<?= $data_paysafecard["currency"] ?>">Selected Currency: <?= $data_paysafecard["currency"] ?></option>
                        <option value="EUR">Euro</option>
                        <option value="USD">US Dollar</option>
                        <option value="GBP">Brit. Pound</option>
                    </select><br>
                    <button type="submit" class="btn btn-success">Change Data</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <a data-toggle="collapse" href="#cpg3" aria-expanded="false" aria-controls="cpg3E">
            <div class="box">
                <center><img height="50px" class="logo" src="<?=Url::templatePath()?>images/gateways/paymentwall.png" alt="Paymentwall"></center>
                <?php if($data_paymentwall["enabled"] == 1) { ?>
                    <h2 style="text-align: center; color: green; font-size: 16px;">Enabled</h2>
                <?php } else { ?>
                    <h2 style="text-align: center; color: red; font-size: 16px;">Disabled</h2>
                <?php } ?>
            </div>
        </a>
        <div class="collapse" id="cpg3">
            <div class="box">
                <?php if($data_paymentwall["enabled"] == 1) { ?>
                    <a href="disablegateway/paymentwall" class="btn btn-danger">Disable Gateway</a>
                <?php } else { ?>
                    <a href="enablegateway/paymentwall" class="btn btn-success">Enable Gateway</a>
                <?php } ?><br><br>
                <form action="updategateway/paymentwall" method="post">
                    <label for="email">Paymentwall E-Mail</label>
                    <input name="email" type="email" class="form-control" value="<?= $data_paymentwall["mail"] ?>" required>
                    <label for="publickey">Paymentwall Public Key</label>
                    <input name="publickey" type="text" class="form-control" value="<?= $data_paymentwall["publickey"] ?>" required>
                    <label for="privatekey">Paymentwall Private Key</label>
                    <input name="privatekey" type="text" class="form-control" value="<?= $data_paymentwall["privatekey"] ?>" required>
                    <label for="currency">Currency</label>
                    <select name="currency" class="form-control" required>
                        <option value="<?= $data_paymentwall["currency"] ?>">Selected Currency: <?= $data_paymentwall["currency"] ?></option>
                        <option value="EUR">Euro</option>
                        <option value="USD">US Dollar</option>
                        <option value="GBP">Brit. Pound</option>
                    </select><br>
                    <button type="submit" class="btn btn-success">Change Data</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box">
            <center><img height="50px" class="logo" src="<?=Url::templatePath()?>images/gateways/stripe.png" alt="Stripe"></center>
            <h2 style="text-align: center; color: red; font-size: 16px;">Disabled</h2>
        </div>
    </div>
</div>
