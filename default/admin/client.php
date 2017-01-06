<div class="jumbotron" style="padding: 0; margin-bottom: 12px;">
    <div class="row">
        <div class="col-md-12" style="line-height: 34px; padding-left: 40px;">
            <div class="pull-right"><a class="btn btn-primary btn-small" href="../../clients"><i class="fa fa-arrow-circle-left"></i> Back</a></div>
        </div>
    </div>
</div>
<div class="jumbotron" style="padding: 0; margin-bottom: 12px;">
    <div class="row">
        <div class="col-md-12" style="line-height: 34px; padding-left: 40px;">
            Account ID: #<?=$data["user"][0]->id?><br>
            Username: <?=$data["user"][0]->username?><br>
            Active:
            <?php if($data["user"][0]->active == 1) {
                echo "<label class='success'>Active</label>";
            } elseif($data["user"][0]->active == 0) {
                echo "<label class='danger'>Inctive</label>";
            } ?><br>
        </div>
    </div>
</div>
<div class="jumbotron" style="padding: 0; margin-bottom: 12px;">
    <div class="row">
        <div class="col-md-12" style="line-height: 34px;">
            <div style="width: 100%;" class="btn-group" role="group" aria-label="actions">
                <?php if($data["user"][0]->active == 1) { ?>
                    <a style="width: 50%;" class="btn btn-warning" href="../lock/<?=$data["user"][0]->id?>"><i class="fa fa-lock"></i> Lock</a>
                <?php } elseif($data["user"][0]->active == 0) { ?>
                    <a style="width: 50%;" class="btn btn-warning" href="../unlock/<?=$data["user"][0]->id?>"><i class="fa fa-unlock-alt"></i> Unlock</a>
                <?php } ?>
                <a style="width: 50%;" class="btn btn-danger" <?php if($data["user"][0]->role == "admin") {?>href="../delete/<?=$data["user"][0]->id?>"<?php } ?> <?php if($data["user"][0]->role == "admin") { echo "disabled"; } ?>><i class="fa fa-trash-o"></i> Delete</a>
            </div>
        </div>
    </div>
</div>
<h3 class="text-center">Recent Transactions</h3>
<table class="table" id="paginate">
    <thead>
    <tr class="blue">
        <th>#</th>
        <th class="col-md-2 col-xs-2">Username</th>
        <th class="col-md-4 col-xs-4" style="width: 10%">Payment ID</th>
        <th class="col-md-3 col-xs-3">Ammount</th>
        <th class="col-md-3 col-xs-3">Status</th>
        <th class="col-md-3 col-xs-3">Payment Method</th>
        <th class="col-md-3 col-xs-3">View Invoice</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $cnt = 0;
    foreach($data["payments"] as $transaction) {
        if($transaction->paid == 0) {
            $ps = '<span class="danger">Cancelled</span>';
        } elseif($transaction->paid == 1) {
            $ps = '<span class="success">Compleated</span>';
        }
        ?>
        <tr>
            <th scope="row"><?=$transaction->id?></th>
            <td><?=$transaction->username?></td>
            <td><?=$transaction->transactionid?></td>
            <td><?=$transaction->amount?>€</td>
            <td><?=$ps?></td>
            <td><?=$transaction->paymentmethod?></td>
            <td><a href="viewinvoice/<?=$transaction->id?>" class="btn btn-success" download disabled><i class="fa fa-eye"></i> View / Download</a></td>
        </tr>
        <?php
        $cnt = $cnt + 1;
    }
    ?>
    </tbody>
</table>