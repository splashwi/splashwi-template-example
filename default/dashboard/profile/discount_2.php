<form action="usediscount" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">
            Required data...
        </div>
        <div class="panel-body">
            <p>
                Please select a product group and a server out of the group which you want to apply the discount to!
            </p>
            <label for="product_type">Choose Product Type</label>
            <select name="product_type" class="form-control" id="protype" required>
                <option value="">Select a Productgroup...</option>
                <option value="teamspeak">Teamspeak Servers</option>
                <option value="gameserver">Gameservers</option>
                <option value="webspace">Webspaces</option>
                <option value="vps">Virtual Servers</option>
                <option value="dedicated">Dedicated Servers</option>
            </select>
            <div id="prosel">
                <label for="product_id">Product</label>
                <select name="product_id" class="form-control" id="proselect" required>
                    <option value="">Select a Product...</option>
                </select>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Use a discount code...
        </div>
        <div class="panel-body">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-ticket"></i></span>
                <input type="text" class="form-control" name="coupon" placeholder="Your Coupon Code" value="<?=$_GET["code"]?>" readonly disabled required>
            </div><br>
            <button type="submit" class="btn btn-success">Use this coupon...</button>
        </div>
    </div>
</form>