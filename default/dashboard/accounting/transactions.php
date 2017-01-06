<table class="table" id="paginate">
    <thead>
        <tr class="blue">
            <td style="width: 30%;">
                Transaction ID
            </td>
            <td style="width: 10%;">
                Ammount
            </td>
            <td style="width: 20%;">
                Status
            </td>
            <td style="width: 20%;">
                Payment Method
            </td>
            <td style="width: 10%;">
                View Invoice
            </td>
        </tr>
    </thead>
    <tbody>
<?php
foreach($data["payments"] as $transaction) {
    if($transaction->paid == 0) {
        $ps = '<span class="danger">Cancelled</span>';
    } elseif($transaction->paid == 1) {
        $ps = '<span class="success">Compleated</span>';
    }
    ?>
    <tr>
        <td style="width: 40%;">
            <?=$transaction->transactionid?>
        </td>
        <td style="width: 10%;">
            <?=$transaction->amount?>€
        </td>
        <td style="width: 20%;">
            <?=$ps?>
        </td>
        <td style="width: 20%;">
            <?=$transaction->paymentmethod?>
        </td>
        <td style="width: 10%;">
            <a href="viewinvoice/<?=$transaction->id?>" class="btn btn-success"><i class="fa fa-eye"></i> View / Download</a>
        </td>
    </tr>
    <?php
}
?>
    </tbody>
</table>
