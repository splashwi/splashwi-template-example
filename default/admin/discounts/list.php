<table class="table" id="paginate">
    <thead>
        <tr class="blue">
            <td>Discount Code</td>
            <td>Active Until</td>
            <td>Discount Type</td>
            <td>Discount</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($data["discounts"] as $discount) {
    ?>
        <tr>
            <td><?=$discount->coupon_code?></td>
            <td><?=$discount->active_until?></td>
            <td><?=$discount->discount_type?></td>
            <td>
                <?php
                if($discount->discount_type == "money") {
                    echo $discount->discount.'€';
                } elseif($discount->discount_type == "percentage") {
                    echo (100 - $discount->discount * 100).'%';
                }
                ?>
            </td>
            <td><a href="discounts/delete/<?=$discount->id?>" class="btn btn-danger">Delete</a></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-3 col-md-offset-9 webicon" style="line-height: 34px; padding-left: 40px;">
        <a data-toggle="modal" data-target="#Modal2" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Coupon</a><br><br>
    </div>
</div>
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add a Coupon</h4>
            </div>
            <form action="discounts/add" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="coupon_code">Coupon Code</label>
                            <input class="form-control" name="coupon_code" required>
                            <label for="discount_type">Discount Type</label>
                            <select name="discount_type" class="form-control">
                                <option value="money">Fixed Money Discount</option>
                                <option value="percentage">Percentage Discount</option>
                            </select>
                            <label for="discount">Discount</label>
                            <input class="form-control" name="discount">
                            <p>Faktor: 0 = 100%, 0.3 = 70% | Fixed Value: 100 = 100€</p>
                            <label for="active_until">Coupon Valid Until</label>
                            <input class="form-control" name="active_until" value="<?=date("Y-m-d")?>">
                            <label for="new_clients_only">Promotion only for new clients</label>
                            <select name="new_clients_only" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add this Coupon</button>
                </div>
            </form>
        </div>
    </div>
</div>