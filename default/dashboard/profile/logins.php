<table class="table" id="paginate">
    <thead>
        <tr class="blue">
            <td style="width: 10%;">
                Username
            </td>
            <td style="width: 20%;">
                Status
            </td>
            <td style="width: 20%;">
                IP
            </td>
            <td style="width: 10%;">
                Time of login attempt
            </td>
        </tr>
    </thead>
    <tbody>
        <?php
        $datax = array_reverse($data["logins"]);
        foreach($datax as $login) {
            if($login->status == 0) {
                $ps = '<span class="danger">Failed</span>';
            } elseif($login->status == 1) {
                $ps = '<span class="success">Succeeded</span>';
            }
            ?>
            <tr>
                <td style="width: 10%;">
                    <?=$login->username?>
                </td>
                <td style="width: 20%;">
                    <?=$ps?>
                </td>
                <td style="width: 20%;">
                    <?=$login->ip?>
                </td>
                <td style="width: 10%;">
                    <?=$login->time?>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-12">
        <div class="paging-container" id="demo"> </div>
    </div>
</div>
