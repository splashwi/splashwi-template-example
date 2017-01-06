<?php
use Helpers\Session;
use Helpers\Url;
?>
<div class="row">
    <h2 class="text-center orderhead">Order</h2>
</div>
<?php if($data["step"] == 1) {
    if(Session::get('loggin') == false) {?>
<div class="row">
    <form action="../orderlogin" method="post">
        <div class="col-md-6">
            <div class="loginbox boxme">
                <div class="col-md-12">
                    <h3>Login</h3>
                    <label>E-Mail Adress</label>
                    <input type="text" name="username" class="form-control" placeholder="demo@splash-wi.com">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="***********">
                    <br>
                    <button type="submit" class="btn btn-fullwidth btn-lg btn-success">Login</button>
                    <br><br>
                </div>
            </div>
        </div>
    </form>
    <form action="../orderregister" method="post">
        <div class="col-md-6">
            <div class="registerbox boxme">
                <div class="col-md-12">
                    <h3>Register</h3>
                </div>
                <div class="col-md-12">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="demo">
                </div>
                <div class="col-md-12">
                    <label>E-Mail Adress</label>
                    <input type="text" name="email" class="form-control" placeholder="demo@splash-wi.com">
                </div>
                <div class="col-md-12">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="***********">
                </div>
                <div class="col-md-12">
                    <label>Repeat Password</label>
                    <input type="password" name="password_repeat" class="form-control" placeholder="***********">
                </div>
                <div class="col-md-12">
                    <label>Firm</label>
                    <input type="text" name="firm" class="form-control" placeholder="Example LLC">
                </div>
                <div class="col-md-12">
                    <label>Firstname</label>
                    <input type="text" name="firstname" class="form-control" placeholder="John">
                </div>
                <div class="col-md-12">
                    <label>Lastname</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Doe">
                </div>
                <div class="col-md-8">
                    <label>Street</label>
                    <input type="text" name="street" class="form-control" placeholder="Mainstreet">
                </div>
                <div class="col-md-4">
                    <label>Housenumber</label>
                    <input type="text" name="housenumber" class="form-control" placeholder="10">
                </div>
                <div class="col-md-4">
                    <label>Postalcode</label>
                    <input type="text" name="postalcode" class="form-control" placeholder="AX95135">
                </div>
                <div class="col-md-8">
                    <label>City</label>
                    <input type="text" name="city" class="form-control" placeholder="Las Vegas">
                </div>
                <div class="col-md-6">
                    <label>State</label>
                    <input type="text" name="state" class="form-control" placeholder="Texas">
                </div>
                <div class="col-md-6">
                    <label>Country</label>
                    <input type="text" name="country" class="form-control" placeholder="United-States">
                </div>
                <div class="col-md-12">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="+1 443 1845 424 135">
                </div>
                <div class="col-md-12">
                    <br>
                    <button type="submit" class="btn btn-fullwidth btn-lg btn-success">Register</button>
                    <br><br>
                </div>
            </div>
        </div>
    </form>
</div><br><br>
<?php } else { url::redirect('order/2'); }
} elseif($data["step"] == 2) {
    $cart = json_decode(Session::get('cart'));
    if(!empty($cart) && isset($cart)) {
        $cnt = 0;
        foreach ($cart as $cart) {
            $m2 = new \Models\Product_model();
            $product = $m2->getProduct($cart->productid);
            ?>
            <div class="well">
                <div class="row">
                    <div class="col-md-11">
                        <?php echo $product[0]->name ?>
                    </div>
                    <div class="col-md-1">
                        $<?php echo $product[0]->price ?> USD
                    </div>
                </div>
            </div>
            <?php
            $cnt++;
        }
        ?>
        <a href="../confirmorder" class="btn btn-success btn-fullwidth"><i class="fa fa-shopping-cart"></i> Confirm order</a><br><br>
        <?php
    } else {
        ?>
        <div class="alert alert-danger text-center"><i class="fa fa-shopping-cart"></i> Your cart is empty!</div><br>
        <?php
    }
} elseif($data["step"] == 3) {
    ?>
        <p class="text-center sans">Your order has been successfully placed! Please log in to your account to see further information!
        If you just registered you need to activate your account first by following the instructions in the E-Mail we sent you! Please
        make sure your account has enough funds on it to pay the first payment period of your product. If you do not have sufficient funds,
        your product will be held back until you have sufficient funds on your account.</p>
        <div class="col-md-4 col-md-offset-4">
            <a href="../login" class="btn btn-success"><i class="fa fa-arrow-circle-right"></i> Go to login page</a><br><br>
        </div>
    <?php
} ?>
