<?php
    use Helpers\Url;

    $pm = new \Models\Payment_model();
    $gateways = $pm->getGatewayStatus();
?>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="process">
            <div class="row text-center spaced-big">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box">
                        <h2 style="margin: 0;">Choose a payment gateway...</h2>
                    </div>
                </div>
            </div>
            <fieldset>
                <div class="row text-center spaced-big">
                    <?php if($gateways["paypal"] == true) { ?>
                        <div class="col-md-6 col-md-offset-3">
                            <div class="box">
                                <label for="pp"><img height="50px" class="logo" src="<?=Url::templatePath()?>images/gateways/paypal.png" alt="PayPal"></label>
                                <input type="radio" id="pp" name="paymentmethod" value="paypal" checked>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($gateways["paysafecard"] == true) { ?>
                        <div class="col-md-6 col-md-offset-3">
                            <div class="box">
                                <label for="ps"><img height="50px" class="logo" src="<?=Url::templatePath()?>images/gateways/paysafecard.png" alt="paysafecard"></label>
                                <input type="radio" id="ps" name="paymentmethod" value="paysafecard">
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($gateways["paymentwall"] == true) { ?>
                        <div class="col-md-6 col-md-offset-3">
                            <div class="box">
                                <label for="pw"><img height="50px" class="logo" src="<?=Url::templatePath()?>images/gateways/paymentwall.png" alt="Paymentwall"></label>
                                <input type="radio" id="pw" name="paymentmethod" value="paymentwall">
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($gateways["stripe"] == true) { ?>
                        <div class="col-md-6 col-md-offset-3">
                            <div class="box">
                                <label for="s"><img height="50px" class="logo" src="<?=Url::templatePath()?>images/gateways/stripe.png" alt="Stripe"></label>
                                <input type="radio" id="pw" name="paymentmethod" value="stripe">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </fieldset>
            <div class="row text-center">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box">
                        <label for="ammount">Ammount:</label>
                        <div class="input-group">
                            <span class="input-group-addon">€</span>
                            <input class="form-control" type="text" name="ammount" value="10.00" placeholder="10.00" style="text-align: center">
                            <span class="input-group-addon">EUR (Euro) [For European Payments]</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add Funds</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>