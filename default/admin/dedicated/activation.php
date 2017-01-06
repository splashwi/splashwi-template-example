<?php
use Helpers\Url;

$servers = $data['servers'];
?>
<table class="table" id="paginate">
    <thead>
        <tr class="blue">
            <td style="width: 10% !important;">
                ID
            </td>
            <td style="width: 20% !important;">
                Owner
            </td>
            <td>
                Data
            </td>
            <td>
                Activate
            </td>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($servers as $server) { ?>
        <tr>
            <td style="width: 10% !important;">
                <?=$server->id?>
            </td>
            <td style="width: 20% !important;">
                <?=$server->username?>
            </td>
            <td>
                Plattform: <?=$server->plattform?><br>
                RAM: <?=$server->ram?>MB<br>
                <br>
                More information available...
            </td>
            <td>
                <a href="<?=Url::getUri("admin/dedicated/activate/".$server->id)?>" class="btn btn-success">Place Order In DC</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
